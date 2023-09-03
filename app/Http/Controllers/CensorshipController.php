<?php

namespace App\Http\Controllers;

use App\Models\Censorship;
use App\Models\Import;
use App\Models\SubCensorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CensorshipController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:censorship', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    
    public function index(Request $request)
    {
        $censorship = Censorship::all();
        // $subCensorship = SubCensorship::all();
        $import = Import::all();
        return view('censorship.index', compact('censorship', 'import'));
    }


    public function create()
    {
        $censorship = Censorship::all();
        // $subCensorship = SubCensorship::all();
        $import = Import::all();

        return view('censorship.create', compact('censorship', 'import'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [

            // 'sub_censorship_id' => 'required',
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

        $censorship = new Censorship([
            // 'sub_censorship_id' => $request->get('sub_censorship_id'),
            'number' => $request->get('number'),
            'title' => $request->get('title'),
            'import_id' => $request->get('import_id'),
            'date' => $request->get('date'),
            'files' => json_encode($data)
        ]);

        if ($censorship->save()) {
            return redirect('censorship/create')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('censorship/create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }


    public function show($id)
    {
        //

        $censorship = Censorship::find($id);
        $subCensorship = SubCensorship::all();
        $import = Import::all();


        return view('censorship.show', compact('import', 'subCensorship'))->with('censorship', $censorship);
    }


    public function edit($id)
    {
        //

        $censorship = Censorship::find($id);
        // $subCensorship = SubCensorship::all();
        $import = Import::all();


        return view('censorship.edit', compact('censorship', 'import'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'sub_censorship_id' => 'required',
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

        $censorship = Censorship::find($id);
        // $censorship->sub_censorship_id = $request->get('sub_censorship_id');
        $censorship->number = $request->get('number');
        $censorship->title = $request->get('title');
        $censorship->import_id = $request->get('import_id');
        $censorship->date = $request->get('date');

        if (isset($data)) {
            $censorship->files = json_encode($data);
        }


        if ($censorship->save()) {
            return redirect('censorship')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('censorship')->with('warning', '  تحقق من صحة البيانات!');
        }
    }


    public function destroy($id)
    {
        //
        Censorship::destroy($id);
        return redirect('censorship')->with('danger', 'تمت الحذف بنجاح!');
    }

    public function search(Request $request)
    {
        $import=Import::all();
        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $censorship = Censorship::whereBetween('date', [$startDate, $endDate])->get();

        // قم بعرض نتيجة البحث
        return view('censorship.index',compact('censorship', 'import'))->with('success', 'تمت عملية البحث !');
    }
}