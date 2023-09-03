<?php

namespace App\Http\Controllers;

use App\Models\Export;
use Illuminate\Http\Request;

class ExportController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:types', ['only' => ['index','show','create', 'store','edit', 'update','destroy']]);

    }
    
    public function index(Request $request)
    {
        $export = Export::all();
        return view('export.index', compact('export'));
    }


    public function create()
    {
        $export = Export::all();
        return view('export.create', compact('export',));
    }


    public function store(Request $request)
    {
        $request->validate([
            'export_num' => 'required',
            'export_name' => 'required',
        ]);
        $export = new Export();

        $export->export_num = $request->export_num;
        $export->export_name = $request->export_name;


        if ($export->save()) {
            return redirect('export')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('export.create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function show($id)
    {
        $export = Export::find($id);
        return view('export.show', compact('export',));
    }


    public function edit($id)
    {
        $export = Export::find($id);
        return view('export.edit', compact('export'));
    }


    public function update(Request $request, $id)
    {
        $export = Export::find($id);
        $export->export_num = $request->export_num;
        $export->export_name = $request->export_name;

        if ($export->save()) {
            return redirect('export')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('export')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function destroy($id)
    {
        $export = Export::find($id);

        if ($export->ArchiveExports()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط بأرشيف صادر.');
            return redirect()->route('export.index');
        }

        if ($export->legalexports()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط  بشؤون قانونية صادر.');
            return redirect()->route('export.index');
        }
        if ($export->ComputerExports()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط بحاسوب صادر.');
            return redirect()->route('export.index');
        }

        if ($export->CensorshipExports()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط  برقابة صادر.');
            return redirect()->route('export.index');
        }
        if ($export->Jibayaexports()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط بجباية صادر.');
            return redirect()->route('export.index');
        }

        $export->delete();
        session()->flash('success', 'تم الحذف بنجاح.');
        return redirect()->route('export.index');
    
    }

    
}