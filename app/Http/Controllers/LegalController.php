<?php

namespace App\Http\Controllers;

use App\Models\Import;
use App\Models\Legal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LegalController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:legal', ['only' => ['index','show','create', 'store','edit', 'update','destroy']]);
    }
    
    public function index()
    {
        //
        $legal = Legal::all();
        $import=Import::all();
        return view('legal.index',compact('legal','import'));

    }


    public function create()
    {
        //

        $legal = Legal::all();
        $import=Import::all();

        return view('legal.create',compact('legal','import'));

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

        $legal = new Legal([
            'number' => $request->get('number'),
            'title' => $request->get('title'),
            'import_id' => $request->get('import_id'),
            'date' => $request->get('date'),
            'files' => json_encode($data)
        ]);

        if ($legal->save()) {
            return redirect('legal/create')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('legal/create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function show($id)
    {
        //


        $legal = Legal::find($id);
        $import=Import::all();

        return view('legal.show',compact('import'))->with('legal', $legal);
    }


    public function edit($id)
    {
        //


        $legal = Legal::find($id);
        $import=Import::all();
        return view('legal.edit', compact('legal','import'));
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

        $legal = Legal::find($id);
        $legal->number = $request->get('number');
        $legal->title = $request->get('title');
        $legal->import_id = $request->get('import_id');
        $legal->date = $request->get('date');

        if (isset($data)) {
            $legal->files = json_encode($data);
        }


        if ($legal->save()) {
            return redirect('legal')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('legal')->with('warning', '  تحقق من صحة البيانات!');
        }
    }


    public function destroy($id)
    {
        //
        Legal::destroy($id);
        return redirect('legal')->with('danger', 'تمت الحذف بنجاح!');
    }


    public function search(Request $request)
    {
        $import=Import::all();
        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $legal = Legal::whereBetween('date', [$startDate, $endDate])->get();

        // قم بعرض نتيجة البحث
        return view('legal.index',compact('legal', 'import'))->with('success', 'تمت عملية البحث !');
    }
}