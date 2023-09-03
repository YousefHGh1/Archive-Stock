<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Import;
use App\Models\Legal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComputerController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:computer', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    
    public function index(Request $request)
    {
        $computer=Computer::all();
        $import=Import::all();
        return view('computer.index',compact('computer','import'));

    }


    public function create()
    {
        //
        $computer=Computer::all();
        $import=Import::all();
        return view('computer.create',compact('computer','import'));


    }


    public function store(Request $request)
    {
        $this->validate($request, [

            'number' => 'required',
            'title' => 'required',
            'import_id' => 'required',
            'date' => 'required',
            'files.*' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx,DWG,DXF,DWF'
        ]);
        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $data[] = $name;
            }
        }

        $computer = new Computer([
            'number' => $request->get('number'),
            'title' => $request->get('title'),
            'import_id' => $request->get('import_id'),
            'date' => $request->get('date'),
            'files' => json_encode($data)
        ]);

        if ($computer->save()) {
            return redirect('computer/create')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('computer/create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function show($id)
    {
        $computer = Computer::find($id);
        $import=Import::all();
        return view('computer.show',compact('computer','import'));

    }


    public function edit($id)
    {
        $computer = Computer::find($id);
        $import=Import::all();
        return view('computer.edit',compact('computer','import'));

    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'number' => 'required',
            'title' => 'required',
            'import_id' => 'required',
            'date' => 'required',
            'files.*' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:2048'
        ]);

        if ($request->hasfile('files')) {
            $data = [];
            foreach ($request->file('files') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $data[] = $name;
            }
        }

        $computer = Legal::find($id);
        $computer->number = $request->get('number');
        $computer->title = $request->get('title');
        $computer->import_id = $request->get('import_id');
        $computer->date = $request->get('date');

        if (isset($data)) {
            $computer->files = json_encode($data);
        }


        if ($computer->save()) {
            return redirect('computer')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('computer')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function destroy($id)
    {
        Computer::destroy($id);
        return redirect('computer')->with('danger', 'تمت الحذف بنجاح!');
  }

  public function search(Request $request)
  {
      $import = Import::all();
      // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
      $startDate = $request->input('start_date');
      $endDate = $request->input('end_date');

      // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
      $computer = Computer::whereBetween('date', [$startDate, $endDate])->get();

      // قم بعرض نتيجة البحث
      return view('computer.index', compact('computer', 'import'))->with('success', 'تمت عملية البحث !');
  }
}