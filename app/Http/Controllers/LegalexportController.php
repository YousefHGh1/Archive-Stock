<?php

namespace App\Http\Controllers;

use App\Models\Export;
use App\Models\Legalexport;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LegalexportController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:legal', ['only' => ['index','show','create', 'store','edit', 'update','destroy']]);
    }

    public function index()
    {
        //
        $legalexport = Legalexport::all();
        $export=Export::all();


        return view('legalexport.index',compact('legalexport','export'));
    }


    public function create()
    {
        //


        $legalexport = Legalexport::all();
        $section = Section::all();
        $export=Export::all();

        return view('legalexport.create',compact('legalexport','section','export'));
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

        $legalexport = new Legalexport([
            'number' => $request->get('number'),
            'title' => $request->get('title'),
            'export_id' => $request->get('export_id'),
            'date' => $request->get('date'),
            'files' => json_encode($data)
        ]);

        if ($legalexport->save()) {
            return redirect('legalexport')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('legalexport.create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }


    public function show($id)
    {
        //


        $legalexport = Legalexport::find($id);
        $export=Export::all();

        return view('legalexport.show',compact('export'))->with('legalexport', $legalexport);
    }


    public function edit($id)
    {
        //


        $legalexport = Legalexport::find($id);
        $section = Section::all();
        $export=Export::all();

        return view('legalexport.edit', compact('legalexport','section','export'));
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
            $legalexport = Legalexport::find($id);
            $legalexport->number = $request->get('number');
            $legalexport->title = $request->get('title');
            $legalexport->export_id = $request->get('export_id');
            $legalexport->date = $request->get('date');
    
    
            if ($legalexport->save()) {
                return redirect('legalexport')->with('info', 'تمت التعديل بنجاح!');
            } else {
                return redirect('legalexport')->with('warning', '  تحقق من صحة البيانات!');
            }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Legalexport  $legalexport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Legalexport::destroy($id);
        return redirect('legalexport')->with('danger', 'تمت الحذف بنجاح!');
    }

    public function search(Request $request)
    {
        $export=Export::all();
        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $legalexport = Legalexport::whereBetween('date', [$startDate, $endDate])->get();

        // قم بعرض نتيجة البحث
        return view('legalexport.index',compact('legalexport', 'export'))->with('success', 'تمت عملية البحث !');
    }
}