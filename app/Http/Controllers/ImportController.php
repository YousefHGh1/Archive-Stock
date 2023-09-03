<?php

namespace App\Http\Controllers;

use App\Models\Import;
use Illuminate\Http\Request;

class ImportController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:types', ['only' => ['index','show','create', 'store','edit', 'update','destroy']]);

    }
    
    public function index(Request $request)
    {
        $import = Import::all();
        return view('import.index', compact('import'));
    }


    public function create()
    {
        $import = Import::all();
        return view('import.create', compact('import',));
    }


    public function store(Request $request)
    {
        $request->validate([
            'import_num' => 'required',
            'import_name' => 'required',
        ]);
        $import = new Import();

        $import->import_num = $request->import_num;
        $import->import_name = $request->import_name;


        if ($import->save()) {
            return redirect('import')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('import.create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function show($id)
    {
        $import = Import::find($id);
        return view('import.show', compact('import',));
    }


    public function edit($id)
    {
        $import = Import::find($id);
        
        return view('import.edit', compact('import'));
    }


    public function update(Request $request, $id)
    {
        $import = Import::find($id);
        $import->import_num = $request->import_num;
        $import->import_name = $request->import_name;

        if ($import->save()) {
            return redirect('import')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('import')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    // public function destroy($id)
    // {
    //     Import::destroy($id);
    //     return redirect('import')->with('danger', 'تمت الحذف بنجاح!');
    // }
    public function destroy($id)
    {

        $import = Import::find($id);

        if ($import->Archives()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط بأرشيف وارد.');
            return redirect()->route('import.index');
        }

        if ($import->legals()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط  بشؤون قانونية وارد.');
            return redirect()->route('import.index');
        }
        if ($import->Computers()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط بحاسوب وارد.');
            return redirect()->route('import.index');
        }

        if ($import->Censorships()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط  برقابة وارد.');
            return redirect()->route('import.index');
        }
        if ($import->Jibayas()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الجهة لأنه مرتبط بجباية وارد.');
            return redirect()->route('import.index');
        }

        $import->delete();
        session()->flash('success', 'تم الحذف بنجاح.');
        return redirect()->route('import.index');
    }
}
