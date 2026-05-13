<?php
namespace App\Http\Controllers;

use App\Models\Diesel;
use App\Models\DieselExport;
use App\Models\Section;
use App\Models\subSection;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoricalController extends Controller
{
    //
    // *************************************************wared***************************************************
    public function waredindex(Request $request)
    {
        $currentYear  = date('Y');
        $previousYear = $currentYear - 1;

        $allPreviousYears = range(1900, $previousYear);

        // Query for diesel entries
        $query = Diesel::with(['typesfuel', 'supplier'])->whereYear('date', '!=', $currentYear);

        // Apply filters if the request is POST
        if ($request->isMethod('post')) {
            if ($request->filled('start_date') && $request->filled('end_date')) {
                $query->whereBetween('date', [$request->start_date, $request->end_date]);
            }

            if ($request->filled('start_voucher') && $request->filled('end_voucher')) {
                $query->whereBetween('voucher', [$request->start_voucher, $request->end_voucher]);
            }
        }

        $dieselEntries = $query->get();

        // Fetch previous years' data dynamically
        $previousYearsData = Diesel::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(quantity) as total')
            ->whereYear('date', '<', $currentYear)
            ->groupBy('year', 'month')
            ->get()
            ->groupBy('year');

        // Fetch diesel data for the current year (grouped by month)
        $dieselData = Diesel::selectRaw('MONTH(date) as month, SUM(quantity) as total')
            ->whereYear('date', '!=', $currentYear)
            ->groupBy('month')
            ->pluck('total', 'month');

        // Fetch all suppliers
        $suppliers = Supplier::all();

        // Calculate previous year balance

        $previousBalance = Diesel::whereIn(DB::raw('YEAR(date)'), $allPreviousYears)->sum('quantity') -
        DieselExport::whereIn(DB::raw('YEAR(date)'), $allPreviousYears)->sum('quantity');

        // Get yearly totals
        $totalReceived = $dieselEntries->sum('quantity');
        $totalEntries  = $dieselEntries->count();

        // Calculate remaining fuel separately for Diesel (سولار) and Gasoline (بنزين)
        $remainingDiesel = Diesel::where('typesfuel_id', 3)->sum('quantity') -
        DieselExport::where('typesfuel_id', 3)->sum('quantity');

        $remainingGasoline = Diesel::where('typesfuel_id', 2)->sum('quantity') -
        DieselExport::where('typesfuel_id', 2)->sum('quantity');

        return view('historical.waredindex', compact(
            'dieselData', 'previousYearsData', 'suppliers', 'previousBalance',
            'totalReceived', 'totalEntries', 'remainingDiesel', 'remainingGasoline', 'dieselEntries'
        ));
    }
    // *************************************************export***************************************************

    public function exportindex(Request $request)
    {
        $currentYear  = date('Y');
        $previousYear = $currentYear - 1;

        $allPreviousYears = range(1900, $previousYear);

        // Start the query
        $query = DieselExport::with(['section', 'subSection', 'typesfuel'])->whereYear('date', '!=', $currentYear);

        // Apply date filter if provided
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        // Apply section filter if provided
        if ($request->filled('section_id')) {
            $query->where('section_id', $request->section_id);
        }

        // Apply sub-section filter if provided
        if ($request->filled('sub_section_id')) {
            $query->where('sub_section_id', $request->sub_section_id);
        }

        // Apply voucher filter if provided
        if ($request->filled('start_voucher') && $request->filled('end_voucher')) {
            $query->whereBetween('voucher', [$request->start_voucher, $request->end_voucher]);
        }

        // Apply voucher number filter if provided
        if ($request->filled('startNum') && $request->filled('endNum')) {
            $query->whereBetween('num_section', [$request->startNum, $request->endNum]);
        }

        // Get the filtered diesel export entries
        $dieselExports = $query->get();

        // Fetch previous years' data
        $previousYearsData = DieselExport::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(quantity) as total')
            ->whereYear('date', '<', $currentYear)
            ->groupBy('year', 'month')
            ->get()
            ->groupBy('year');

        // Get monthly diesel export data
        $dieselData = DieselExport::selectRaw('MONTH(date) as month, SUM(quantity) as total')
            ->whereYear('date', '!=', $currentYear)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Fetch sections and sub-sections
        $section    = Section::all();
        $subSection = SubSection::all();

        // Calculate previous year balance for Diesel
        $previousBalance = Diesel::whereIn(DB::raw('YEAR(date)'), $allPreviousYears)->sum('quantity') -
        DieselExport::whereIn(DB::raw('YEAR(date)'), $allPreviousYears)->sum('quantity');

        // Get yearly totals
        $totalExported = $dieselExports->sum('quantity');
        $totalEntries  = $dieselExports->count();

        // Remaining quantities for Diesel and Gasoline
        $remainingDiesel = Diesel::where('typesfuel_id', 3)->sum('quantity') -
        DieselExport::where('typesfuel_id', 3)->sum('quantity');

        $remainingGasoline = Diesel::where('typesfuel_id', 2)->sum('quantity') -
        DieselExport::where('typesfuel_id', 2)->sum('quantity');

        // Return the view with the filtered data
        return view('historical.exportindex', compact(
            'dieselData', 'previousYearsData', 'section', 'subSection',
            'previousBalance', 'totalExported', 'totalEntries',
            'remainingDiesel', 'remainingGasoline', 'dieselExports'
        ));
    }

    public function totalreport(Request $request)
    {

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $dieselexport = DieselExport::all();
        $diesel       = Diesel::all();
        return view('historical.total_report', compact('dieselexport', 'diesel'));
    }

    public function searchtotal(Request $request)
    {
        // تحميل السند الأول والسند الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');

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
