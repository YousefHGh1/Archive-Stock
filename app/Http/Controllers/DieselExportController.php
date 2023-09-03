<?php

namespace App\Http\Controllers;

use App\Models\Diesel;
use App\Models\DieselExport;
use App\Models\Section;
use App\Models\subSection;
use App\Models\TypesFuel;
use Illuminate\Http\Request;

class DieselExportController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:diesels', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        $currentYear = date('Y');

        $dieselexport = DieselExport::with('section', 'subSection')->whereYear('date', $currentYear)->paginate(10);
        return view('dieselexport.index', compact('dieselexport'));

    }

    public function create()
    {
        //
        $section = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);
        $typesfuel = TypesFuel::get(['id', 'name']);

        return view('dieselexport.create', compact('section', 'subSection', 'typesfuel'));

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'section_id' => 'required',
            'sub_section_id' => 'required',
            'typesfuel_id' => 'required',
            'voucher' => 'required|numeric',
            'num_section' => 'required|numeric|unique:diesel_exports',
            'num_note' => 'required|numeric',
            'quantity' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $totalDieselQuantity = Diesel::sum("quantity");
        $totalDieselExportQuantity = DieselExport::sum("quantity");

        if (($totalDieselQuantity - $totalDieselExportQuantity) < $validatedData['quantity']) {
            return back()->with('warning', 'تحقق من كمية المحروقات المتبقي');
        }

        DieselExport::create($validatedData);

        return redirect()->route('dieselexport.index')
            ->with('success', 'تمت الاضافة بنجاح.');
    }

    public function show($id)
    {
        //
        $dieselexport = DieselExport::find($id);
        return view('dieselexport.show')->with('dieselexport', $dieselexport);
    }

    public function edit($id)
    {
        //
        $dieselexport = DieselExport::find($id);
        $section = Section::all();
        $subSection = subSection::all();
        return view('dieselexport.edit', compact('dieselexport', 'section', 'subSection'))->with('dieselexport', $dieselexport);
    }

    public function update(Request $request, $id)
    {
        //
        $dieselexport = DieselExport::find($id);
        $dieselexport->num_section = $request->num_section;
        $dieselexport->num_note = $request->num_note;
        $dieselexport->section_id = $request->section_id;
        $dieselexport->voucher = $request->voucher;

        // لادخال كمية الصادر بناء على كمية الوارد
        if ((Diesel::sum("quantity") > $request->quantity)) {

            $dieselexport->quantity = $request->quantity;
        } else {
            return back()->with('warning', 'تحقق من كمية المحروقات المتبقي');
        }
        //انتها شرط الكمية
        $dieselexport->date = $request->date;

        $dieselexport->save();
        return redirect('dieselexport')->with('info', 'تمت التعديل بنجاح!');
    }

    public function destroy($id)
    {
        DieselExport::destroy($id);

    }

    public function report(Request $request)
    {
        //
        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $currentYear = date('Y');

        $dieselexport = DieselExport::with('section', 'subSection')->whereYear('date', $currentYear)->paginate(10);

        $section = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);

        return view('dieselexport.report', compact('dieselexport', 'section', 'subSection'));
    }

    public function searchvou(Request $request)
    {
        $section = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);
        // قم بتحميل السند الأول السند الثاني من النموذج
        $startVoucher = $request->input('start_voucher');
        $endVoucher = $request->input('end_voucher');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $dieselexport = DieselExport::whereBetween('voucher', [$startVoucher, $endVoucher])->get();
        // $dieselexport=DieselExport::select('quantity')->whereBetween('voucher', [$startVoucher, $endVoucher])->sum('quantity')->get();

        // قم بعرض نتيجة البحث
        return view('dieselexport.report', compact('dieselexport', 'section', 'subSection'));
    }

    public function searchdate(Request $request)
    {
        $section = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);

        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $dieselexport = DieselExport::whereBetween('date', [$startDate, $endDate])->get();

        // قم بعرض نتيجة البحث
        return view('dieselexport.report', compact('dieselexport', 'section', 'subSection'));
    }

    public function searchsec(Request $request)
    {
        $section = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);

        // قم بتحميل الإيصال الأول الإيصال الثاني من النموذج
        $startNum = $request->input('startNum');
        $endNum = $request->input('endNum');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $dieselexport = DieselExport::whereBetween('num_section', [$startNum, $endNum])->get();

        // قم بعرض نتيجة البحث
        return view('dieselexport.report', compact('dieselexport', 'section', 'subSection'))->with('success', 'تمت عملية البحث !');
    }

    public function searchname(Request $request)
    {
        $section = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $section_id = $request->input('section_id');
        $subSection_id = $request->input('subSection_id'); // تحميل القيمة الجديدة (إذا تم تحديدها)
        $dieselexport = DieselExport::whereBetween('date', [$startDate, $endDate])
            ->where('section_id', 'like', '%' . $section_id . '%');
        if ($subSection_id) { // إذا تم تحديد قيمة للعنصر البحثي الجديد
            $dieselexport->where('subSection_id', 'like', '%' . $subSection_id . '%');
        }
        $dieselexport = $dieselexport->get();

        return view('dieselexport.report', compact('dieselexport', 'section', 'subSection'));
    }

    public function totalreport(Request $request)
    {

        $dieselexport = DieselExport::select("*")->whereRaw('YEAR(diesel_exports.date) = 2023 ')->get();
        $section = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);

        return view('dieselexport.total_report', compact('dieselexport', 'section', 'subSection'));
    }

    public function searchtotal(Request $request)
    {
        $section = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);

        // قم بتحميل السند الأول السند الثاني من النموذج
        $startVoucher = $request->input('start_voucher');
        $endVoucher = $request->input('end_voucher');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $dieselexport = DieselExport::whereBetween('voucher', [$startVoucher, $endVoucher])->get();
        // قم بعرض نتيجة البحث
        return view('dieselexport.total_report', compact('dieselexport', 'section', 'subSection'));
    }
}
