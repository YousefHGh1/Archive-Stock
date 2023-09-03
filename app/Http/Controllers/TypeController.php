<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:types', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        //

        $type = Type::all();
        return view('type.index', compact('type'));
    }

    public function create()
    {
        //
        $type = Type::all();
        return view('type.create');
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'number' => 'required',

        ]);
        $type = new type();
        $type->name = $request->name;
        $type->number = $request->number;

        if ($type->save()) {
            return redirect('type')->with('success', 'تمت الاضافة بنجاح!');
        }
    }


    public function show(type $type)
    {
        //

    }


    public function edit($id)
    {
        //
        $type = Type::find($id);
        return view('type.edit', compact('type'))->with('type', $type);
    }


    public function update(Request $request, $id)
    {
        //
        $type = Type::find($id);
        $type->name = $request->name;
        $type->number = $request->number;

        $type->save();
        return redirect('type')->with('info', 'تمت التعديل بنجاح!');
    }


    public function destroy($id)
    {
        //
        // Type::destroy($id);
        // return redirect('type');

        $type = Type::find($id);

        if ($type->ArchiveNots()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط بأرشيف .');
            return redirect()->route('type.index');
        }

        if ($type->legalNots()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط  بشؤون قانونية .');
            return redirect()->route('type.index');
        }
        if ($type->ComputerNots()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط بحاسوب .');
            return redirect()->route('type.index');
        }

        if ($type->CensorshipNots()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط  برقابة .');
            return redirect()->route('type.index');
        }
        if ($type->JibayaNots()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط بجباية .');
            return redirect()->route('type.index');
        }

        $type->delete();
        session()->flash('success', 'تم الحذف بنجاح.');
        return redirect()->route('type.index');
    }
}
