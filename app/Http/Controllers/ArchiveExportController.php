<?php

namespace App\Http\Controllers;

use App\Models\ArchiveExport;
use App\Models\Export;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class ArchiveExportController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:archive', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    //     public function index(Request $request)
    // {
    //     $archiveExport = ArchiveExport::all();
    //     $export = Export::all();

    //     // Get all the years from the archive items
    //     $years = $archiveExport->pluck('date')->map(function ($date) {
    //         return date('Y', strtotime($date));
    //     })->unique()->toArray();

    //     // Get the selected year from the request or use the current year as default
    //     $selectedYear = $request->input('year', date('Y'));

    //     // Filter the archive items by the selected year
    //     $archiveExport = $archiveExport->filter(function ($item) use ($selectedYear) {
    //         return date('Y', strtotime($item->date)) == $selectedYear;
    //     });

    //     return view('archiveExport.index', compact('archiveExport', 'export', 'years', 'selectedYear'));
    // }

    public function index(Request $request)
    {
        $archiveExport = ArchiveExport::all();
        $export = Export::all();
        // Get all the years from the archive items
        $years = $archiveExport->pluck('date')->map(function ($date) {
            return date('Y', strtotime($date));
        })->unique()->toArray();
    
        // Get the latest year based on created_at field
        $latestYear = date('Y', strtotime($archiveExport->sortByDesc('created_at')->first()->date));
    
        // Get the selected year from the request or use the latest year as default
        $selectedYear = $request->input('year', $latestYear);
    
        // Filter the archive items by the selected year
        $archiveExport = $archiveExport->filter(function ($item) use ($selectedYear) {
            return date('Y', strtotime($item->date)) == $selectedYear;
        });
    
        return view('archiveExport.index', compact('archiveExport', 'export', 'years', 'selectedYear'));
    }


    // public function index(Request $request)
    // {
    //     //
    //     $archiveExport = ArchiveExport::all();
    //     $export = Export::all();
    //     return view('archiveExport.index', compact('archiveExport', 'export'));
    // }


    public function create()
    {

        $archiveExport = ArchiveExport::all();
        $section = Section::all();
        $export = Export::all();

        return view('archiveExport.create', compact('archiveExport', 'section', 'export'));
    }


    public function store(Request $request)
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
                // $name = $file->getClientOriginalName();
                $name = uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path() . '/uploads/', $name);
                $data[] = $name;
            }
        }

        $archiveExport = new ArchiveExport([
            'number' => $request->get('number'),
            'title' => $request->get('title'),
            'export_id' => $request->get('export_id'),
            'date' => $request->get('date'),
            'files' => json_encode($data)
        ]);


        if ($archiveExport->save()) {
            return redirect()->back()->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('archiveExport.create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function show($id)
    {
        //
        $archiveExport = ArchiveExport::find($id);
        $export = Export::all();
        return view('archiveExport.show', compact('export'))->with('archiveExport', $archiveExport);
    }


    public function edit($id)
    {
        //
        $archiveExport = ArchiveExport::find($id);
        $section = Section::all();
        $export = Export::all();
        return view('archiveExport.edit', compact('archiveExport', 'section', 'export'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'number' => 'required',
            'title' => 'required',
            'export_id' => 'required',
            'date' => 'required',
            'files.*' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:2048'
        ]);

        if ($request->hasfile('files')) {
            $data = [];
            foreach ($request->file('files') as $file) {
                // $name = $file->getClientOriginalName();
                $name = uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path() . '/uploads/', $name);
                $data[] = $name;
            }
        }

        $archiveExport = ArchiveExport::find($id);
        $archiveExport->number = $request->get('number');
        $archiveExport->title = $request->get('title');
        $archiveExport->export_id = $request->get('export_id');
        $archiveExport->date = $request->get('date');

        if (isset($data)) {
            $archiveExport->files = json_encode($data);
        }


        if ($archiveExport->save()) {
            return redirect('archiveExport')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('archiveExport')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function destroy($id)
    {
        //
        ArchiveExport::destroy($id);
        return redirect('archiveExport')->with('danger', 'تمت الحذف بنجاح!');
    }


    public function searchdate(Request $request)
    {
        $export = Export::all();
        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $archiveExport = ArchiveExport::whereBetween('date', [$startDate, $endDate])->get();

        // قم بعرض نتيجة البحث
        return view('archiveExport.report', compact('archiveExport', 'export'))
            ->with('success', 'تمت عملية البحث !');
    }

    public function searchnumber(Request $request)
    {
        $export = Export::all();

        $number = $request->input('number');
        $archiveExport = ArchiveExport::where('number', $number)->get();
        // قم بعرض نتيجة البحث
        return view('archiveExport.report', compact('archiveExport', 'export'))
            ->with('success', 'تمت عملية البحث !');
    }
}
