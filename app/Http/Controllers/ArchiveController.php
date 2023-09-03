<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Import;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;


class ArchiveController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:archive', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    
    public function index(Request $request)
    {
        // $archive = Archive::all();
        $archive = Archive::cursor();
        // $archive = Archive::orderBy('created_at', 'desc')->get();

        $import = Import::all();

        // Get all the years from the archive items
        $years = $archive->pluck('date')->map(function ($date) {
            return date('Y', strtotime($date));
        })->unique()->toArray();

        // Get the latest year based on created_at field
        $latestYear = date('Y', strtotime($archive->sortByDesc('updated_at')->first()->date));

        // Get the selected year from the request or use the latest year as default
        $selectedYear = $request->input('year', $latestYear);

        // Filter the archive items by the selected year
        $archive = $archive->filter(function ($item) use ($selectedYear) {
            return date('Y', strtotime($item->date)) == $selectedYear;
        });

        return view('archive.index', compact('archive', 'import', 'years', 'selectedYear'));
    }
    
    // public function indexedit(Request $request)
    // {
    //     $archive = Archive::all();
    //     // $archive = Archive::orderBy('created_at', 'desc')->get();

    //     $import = Import::all();

    //     // Get all the years from the archive items
    //     $years = $archive->pluck('date')->map(function ($date) {
    //         return date('Y', strtotime($date));
    //     })->unique()->toArray();

    //     // Get the latest year based on created_at field
    //     $latestYear = date('Y', strtotime($archive->sortByDesc('updated_at')->first()->date));

    //     // Get the selected year from the request or use the latest year as default
    //     $selectedYear = $request->input('year', $latestYear);

    //     // Filter the archive items by the selected year
    //     $archive = $archive->filter(function ($item) use ($selectedYear) {
    //         return date('Y', strtotime($item->date)) == $selectedYear;
    //     });

    //     return view('archive.index', compact('archive', 'import', 'years', 'selectedYear'));
    // }


    // public function index(Request $request)
    // {
    //     $archive = Archive::all();
    //     // $archive = Archive::orderBy('created_at', 'desc')->get();

    //     $import = Import::all();

    //     // Get all the years from the archive items
    //     $years = $archive->pluck('date')->map(function ($date) {
    //         return date('Y', strtotime($date));
    //     })->unique()->toArray();

    //     // Get the selected year from the request or use the current year as default
    //     $selectedYear = $request->input('year', date('Y'));

    //     // Filter the archive items by the selected year
    //     $archive = $archive->filter(function ($item) use ($selectedYear) {
    //         return date('Y', strtotime($item->date)) == $selectedYear;
    //     });

    //     return view('archive.index', compact('archive', 'import', 'years', 'selectedYear'));
    // }

    // public function index(Request $request)
    // {
    //     $archive = Archive::all();
    //     $import = Import::all();
    //     return view('archive.index', compact('archive', 'import'));
    // }

    public function create()
    {
        // ->sortByDesc('created_at')
        $archive = Archive::all();
        $import = Import::all();
        return view('archive.create', compact('archive', 'import'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'number' => 'required',
            'title' => 'required',
            'import_id' => 'required',
            'num_Ministry' => 'required',
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

        $archive = new Archive([
            'number' => $request->get('number'),
            'title' => $request->get('title'),
            'import_id' => $request->get('import_id'),
            'num_Ministry' => $request->get('num_Ministry'),
            'date' => $request->get('date'),
            'files' => json_encode($data)
        ]);

        if ($archive->save()) {
            return redirect('archive/create')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('archive/create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }


    public function show($id)
    {
        $archive = Archive::find($id);
        return view('archive.show', compact('archive'));
    }


    public function edit($id)
    {
        //
        $archive = Archive::find($id);
        $import = Import::all();
        return view('archive.edit', compact('archive', 'import'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'number' => 'required',
            'title' => 'required',
            'import_id' => 'required',
            'num_Ministry' => 'required',
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

        $archive = Archive::find($id);
        $archive->number = $request->get('number');
        $archive->title = $request->get('title');
        $archive->import_id = $request->get('import_id');
        $archive->num_Ministry = $request->get('num_Ministry');
        $archive->date = $request->get('date');

        if (isset($data)) {
            $archive->files = json_encode($data);
        }


        if ($archive->save()) {
            return redirect('archive')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('archive')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function destroy($id)
    {
        //
        Archive::destroy($id);
        return redirect('archive')->with('danger', 'تمت الحذف بنجاح!');
    }


    public function searchdate(Request $request)
    {
        $import = Import::all();
        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $archive = Archive::whereBetween('date', [$startDate, $endDate])->get();

        // قم بعرض نتيجة البحث
        return view('archive.report', compact('archive', 'import'))

            ->with('success', 'تمت عملية البحث !');
    }

    public function searchnumber(Request $request)
    {
        $import = Import::all();

        $number = $request->input('number');
        $archive = Archive::where('number', $number)->get();
        // قم بعرض نتيجة البحث
        return view('archive.report', compact('archive', 'import'))

            ->with('success', 'تمت عملية البحث !');
    }
}
