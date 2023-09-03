<?php

namespace App\Http\Controllers;

use App\Models\ComputerExport;
use App\Models\Export;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComputerExportController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:computer', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    
    public function index(Request $request)
    {
        $computerExport=ComputerExport::all();
        $export=Export::all();
        return view('computerExport.index',compact('computerExport','export'));
    }


    public function create()
    {
        $computerExport=ComputerExport::all();
        $section = Section::all();
        $export=Export::all();

        return view('computerExport.create',compact('computerExport','section','export'));

    }


    public function store(Request $request)
    {
        //
        $request->validate([

            'number' => 'required',
            'title' => 'required',
            'export_id' => 'required',
            'files.*' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx,DWG,DXF,DWF',
            'date' => 'required',

        ]);

        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $data[] = $name;
            }
        }

        $computerExport = new ComputerExport([
            'number' => $request->get('number'),
            'title' => $request->get('title'),
            'export_id' => $request->get('export_id'),
            'date' => $request->get('date'),
            'files' => json_encode($data)
        ]);

        if ($computerExport->save()) {
            return redirect('computerExport')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('computerExport.create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function show($id)
    {
        //
        $computerExport = ComputerExport::find($id);
        $section = Section::all();

        $export=Export::all();
        return view('computerExport.show',compact('export'))->with('computerExport', $computerExport);
    }


    public function edit($id)
    {
        //
        $computerExport = ComputerExport::find($id);
        $section = Section::all();
        $export=Export::all();


        return view('computerExport.edit', compact('computerExport','section','export'));
    }


    public function update(Request $request, $id)
    {
        //
            $this->validate($request, [
                'number' => 'required',
                'title' => 'required',
                'export_id' => 'required',
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
            $computerExport = ComputerExport::find($id);
            $computerExport->number = $request->get('number');
            $computerExport->title = $request->get('title');
            $computerExport->export_id = $request->get('export_id');
            $computerExport->date = $request->get('date');


            if ($computerExport->save()) {
                return redirect('computerExport')->with('info', 'تمت التعديل بنجاح!');
            } else {
                return redirect('computerExport')->with('warning', '  تحقق من صحة البيانات!');
            }

    }

    public function destroy($id)
    {
        //
        ComputerExport::destroy($id);
        return redirect('computerExport')->with('danger', 'تمت الحذف بنجاح!');
    }

    public function search(Request $request)
    {
        $export=Export::all();
        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $computerExport = ComputerExport::whereBetween('date', [$startDate, $endDate])->get();

        // قم بعرض نتيجة البحث
        return view('computerExport.index',compact('computerExport', 'export'))->with('success', 'تمت عملية البحث !');
    }
}