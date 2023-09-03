<?php

namespace App\Http\Controllers;

use App\Models\Diesel;
use App\Models\DieselExport;
use App\Models\Section;
use App\Models\subSection;
use App\Models\Supplier;
use App\Models\TypesFuel;
use Illuminate\Http\Request;

class HistoricalController extends Controller
{
    //
    // *************************************************wared***************************************************
    public function waredindex()
    {
        $currentYear = date('Y');

        $diesel = Diesel::with('supplier', 'typesfuel')->whereYear('date', '!=', $currentYear)->paginate(10);

        $supplier = Supplier::get(['id', 'name_supplier']);
        $typesfuel = TypesFuel::get(['id', 'name']);

        return view('historical.waredindex', compact('diesel', 'supplier', 'typesfuel'));
    }

    public function waredreport()
    {
        $currentYear = date('Y');

        $diesel = Diesel::with('supplier', 'typesfuel')->whereYear('date', '!=', $currentYear)->paginate(10);
        $supplier = Supplier::get(['id', 'name_supplier']);
        $typesfuel = TypesFuel::get(['id', 'name']);

        return view('historical.waredreport', compact('diesel', 'supplier', 'typesfuel'));
    }

    public function datewared(Request $request)
    {
        $currentYear = date('Y');

        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $diesel = Diesel::whereBetween('date', [$startDate, $endDate])->whereYear('date', '!=', $currentYear)->get();

        // قم بعرض نتيجة البحث
        return view('historical.waredreport', compact('diesel'));
    }
    // *************************************************export***************************************************
    public function exportindex()
    {
        $currentYear = date('Y');

        $dieselexport = DieselExport::with('section', 'subSection', 'typesfuel')->select("*")->whereYear('date', '!=', $currentYear)->get();
        $section = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);

        return view('historical.exportindex', compact('dieselexport', 'section'));
    }

    public function exportreport()
    {
        $currentYear = date('Y');

        $dieselexport = DieselExport::select("*")->whereYear('date', '!=', $currentYear)->get();
        $section = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);

        return view('historical.exportreport', compact('dieselexport', 'section', 'subSection'));
    }

    public function searchdate(Request $request)
    {

        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $dieselexport = DieselExport::whereBetween('date', [$startDate, $endDate])->whereRaw('YEAR(diesel_exports.date) = 2022')->get();

        // قم بعرض نتيجة البحث
        $section = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);

        return view('historical.exportreport', compact('dieselexport', 'section', 'subSection'));
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
        // قم بعرض نتيجة البحث
        return view('historical.exportreport', compact('dieselexport', 'section', 'subSection'));
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
        return view('historical.exportreport', compact('dieselexport', 'section', 'subSection'))->with('success', 'تمت عملية البحث !');
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
        if ($subSection_id != null) { // إذا تم تحديد قيمة للعنصر البحثي الجديد
            $dieselexport->where('subSection_id', $subSection_id);
        }
        $dieselexport = $dieselexport->get();

        return view('historical.exportreport', compact('dieselexport', 'section', 'subSection'));
    }

    public function totalreport(Request $request)
    {

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $dieselexport = DieselExport::all();
        $diesel = Diesel::all();
        return view('historical.total_report', compact('dieselexport', 'diesel'));
    }

    public function searchtotal(Request $request)
    {
        // تحميل السند الأول والسند الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // الحصول على مجموع الديزل الوارد بين التواريخ المحددة
        $diesel = Diesel::whereBetween('date', [$startDate, $endDate])->get();

        // الحصول على مجموع الديزل الصادر بين التواريخ المحددة
        $dieselexport = DieselExport::whereBetween('date', [$startDate, $endDate])->get();

        // حساب المتبقي من الديزل بين التواريخ المحددة
        // $totalRemaining = $totalImport - $totalExport;

        // عرض نتائج البحث
        return view('historical.total_report', compact('diesel', 'dieselexport'));
    }

}
