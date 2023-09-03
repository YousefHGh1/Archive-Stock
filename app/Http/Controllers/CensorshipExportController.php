<?php

namespace App\Http\Controllers;

use App\Models\CensorshipExport;
use App\Models\Export;
use App\Models\Section;
use App\Models\SubCensorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CensorshipExportController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:censorship', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    
    public function index(Request $request)
    {
        $censorshipExport = CensorshipExport::all();
        // $subCensorship = SubCensorship::all();
        $export = Export::all();

        return view('censorshipExport.index', compact('censorshipExport',  'export'));
    }


    public function create()
    {
        $censorshipExport = CensorshipExport::all();
        // $subCensorship = SubCensorship::all();
        $section = Section::all();
        $export = Export::all();


        return view('censorshipExport.create', compact('censorshipExport',  'section', 'export'));
    }


    public function store(Request $request)
    {
        $request->validate([
            // 'sub_censorship_id' => 'required',
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

        $censorshipExport = new CensorshipExport([
            // 'sub_censorship_id' => $request->get('sub_censorship_id'),
            'number' => $request->get('number'),
            'title' => $request->get('title'),
            'export_id' => $request->get('export_id'),
            'date' => $request->get('date'),
            'files' => json_encode($data)
        ]);

        if ($censorshipExport->save()) {
            return redirect('censorshipExport')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('censorshipExport.create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function show($id)
    {
        $censorshipExport = CensorshipExport::find($id);
        // $subCensorship = SubCensorship::all();
        $export = Export::all();
        return view('censorshipExport.show', compact('export'))->with('censorshipExport', $censorshipExport);
    }


    public function edit($id)
    {
        $censorshipExport = CensorshipExport::find($id);
        // $subCensorship = SubCensorship::all();
        $section = Section::all();
        $export = Export::all();
        return view('censorshipExport.edit', compact('censorshipExport', 'section', 'export'));
    }


    public function update(Request $request, $id)
    {
            $this->validate($request, [
                // 'sub_censorship_id' => 'required',
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
            $censorshipExport = CensorshipExport::find($id);
            // $censorshipExport->sub_censorship_id = $request->get('sub_censorship_id');
            $censorshipExport->number = $request->get('number');
            $censorshipExport->title = $request->get('title');
            $censorshipExport->export_id = $request->get('export_id');
            $censorshipExport->date = $request->get('date');


            if ($censorshipExport->save()) {
                return redirect('censorshipExport')->with('info', 'تمت التعديل بنجاح!');
            } else {
                return redirect('censorshipExport')->with('warning', '  تحقق من صحة البيانات!');
            }

    }

    public function destroy($id)
    {
        CensorshipExport::destroy($id);
        return redirect('censorshipExport')->with('danger', 'تمت الحذف بنجاح!');
    }

    public function search(Request $request)
    {
        $export=Export::all();
        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $censorshipExport = CensorshipExport::whereBetween('date', [$startDate, $endDate])->get();

        // قم بعرض نتيجة البحث
        return view('censorshipExport.index',compact('censorshipExport', 'export'))->with('success', 'تمت عملية البحث !');
    }
}