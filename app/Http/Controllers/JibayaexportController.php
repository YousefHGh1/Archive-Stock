<?php

namespace App\Http\Controllers;

use App\Models\Export;
use App\Models\Jibayaexport;
use App\Models\Section;
use Illuminate\Http\Request;

class JibayaexportController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:jibaya', ['only' => ['index','show','create', 'store','edit', 'update','destroy']]);
    }
    
    public function index()
    {
        //
        $jibayaexport = Jibayaexport::all();
        $export=Export::all();

        return view('jibayaexport.index',compact('jibayaexport','export'));

    }


    public function create()
    {
        //
        $jibayaexport =Jibayaexport::all();
        $section = Section::all();
        $export=Export::all();

        return view('jibayaexport.create',compact('jibayaexport','section','export'));

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

        $jibayaexport = new Jibayaexport([
            'number' => $request->get('number'),
            'title' => $request->get('title'),
            'export_id' => $request->get('export_id'),
            'date' => $request->get('date'),
            'files' => json_encode($data)
        ]);

        if ($jibayaexport->save()) {
            return redirect('jibayaexport')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('jibayaexport.create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }


    public function show($id)
    {
        //
        $jibayaexport = Jibayaexport::find($id);
        $export=Export::all();

        return view('jibayaexport.show',compact('export'))->with('jibayaexport', $jibayaexport);
    }


    public function edit($id)
    {
        //
        $jibayaexport = Jibayaexport::find($id);
        $section = Section::all();
        $export=Export::all();

        return view('jibayaexport.edit', compact('jibayaexport','section','export'));
    }


    public function update(Request $request, $id)
    {
        //
        
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
            $jibayaexport = Jibayaexport::find($id);
            $jibayaexport->number = $request->get('number');
            $jibayaexport->title = $request->get('title');
            $jibayaexport->export_id = $request->get('export_id');
            $jibayaexport->date = $request->get('date');
    
    
            if ($jibayaexport->save()) {
                return redirect('jibayaexport')->with('info', 'تمت التعديل بنجاح!');
            } else {
                return redirect('jibayaexport')->with('warning', '  تحقق من صحة البيانات!');
            }
        
    }

    public function destroy($id)
    {
        //
        Jibayaexport::destroy($id);
        return redirect('jibayaexport')->with('danger', 'تمت الحذف بنجاح!');
    }

    public function search(Request $request)
    {
        $export=Export::all();
        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $jibayaexport = Jibayaexport::whereBetween('date', [$startDate, $endDate])->get();

        // قم بعرض نتيجة البحث
        return view('jibayaexport.index',compact('jibayaexport', 'export'))->with('success', 'تمت عملية البحث !');
    }
}