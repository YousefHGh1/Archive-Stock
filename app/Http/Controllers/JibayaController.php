<?php

namespace App\Http\Controllers;

use App\Models\Import;
use App\Models\Jibaya;
use App\Models\Legal;
use Illuminate\Http\Request;

class JibayaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:jibaya', ['only' => ['index','show','create', 'store','edit', 'update','destroy']]);
    }
    
    public function index()
    {
        //
        $jibaya = Jibaya::all();
        $import=Import::all();
        return view('jibaya.index',compact('jibaya','import'));

    }


    public function create()
    {
        //
        $jibaya =Jibaya::all();
        $import=Import::all();
        return view('jibaya.create',compact('jibaya','import'));

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

        $jibaya = new Jibaya([
            'number' => $request->get('number'),
            'title' => $request->get('title'),
            'import_id' => $request->get('import_id'),
            'date' => $request->get('date'),
            'files' => json_encode($data)
        ]);

        if ($jibaya->save()) {
            return redirect('jibaya/create')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('jibaya/create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }


    public function show($id)
    {
        //
        $jibaya = Jibaya::find($id);
        $import=Import::all();
        return view('jibaya.show',compact('import'))->with('jibaya', $jibaya);
    }


    public function edit($id)
    {
        //
        $jibaya = Jibaya::find($id);
        $import=Import::all();
        return view('jibaya.edit', compact('jibaya','import'));
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

        $jibaya = Jibaya::find($id);
        $jibaya->number = $request->get('number');
        $jibaya->title = $request->get('title');
        $jibaya->import_id = $request->get('import_id');
        $jibaya->date = $request->get('date');

        if (isset($data)) {
            $jibaya->files = json_encode($data);
        }


        if ($jibaya->save()) {
            return redirect('jibaya')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('jibaya')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function destroy($id)
    {
        //
        Jibaya::destroy($id);
        return redirect('jibaya')->with('danger', 'تمت الحذف بنجاح!');
    }

    public function search(Request $request)
    {
        $import=Import::all();
        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $jibaya = Jibaya::whereBetween('date', [$startDate, $endDate])->get();

        // قم بعرض نتيجة البحث
        return view('jibaya.index',compact('jibaya', 'import'))->with('success', 'تمت عملية البحث !');
    }
}