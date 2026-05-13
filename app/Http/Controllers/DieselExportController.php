<?php
namespace App\Http\Controllers;

use App\Models\Diesel;
use App\Models\DieselExport;
use App\Models\Section;
use App\Models\subSection;
use App\Models\TypesFuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $section    = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);
        $typesfuel  = TypesFuel::get(['id', 'name']);

        return view('dieselexport.create', compact('section', 'subSection', 'typesfuel'));

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'section_id'     => 'required',
            'sub_section_id' => 'required',
            'typesfuel_id'   => 'required',
            'voucher'        => 'required|numeric',
            'num_section'    => 'required|numeric|unique:diesel_exports',
            'num_note'       => 'required|numeric',
            'quantity'       => 'required|numeric',
            'date'           => 'required|date',
        ]);

        $totalDieselQuantity       = Diesel::sum("quantity");
        $totalDieselExportQuantity = DieselExport::sum("quantity");

        if (($totalDieselQuantity - $totalDieselExportQuantity) < $validatedData['quantity']) {
            return back()->with('warning', 'تحقق من كمية المحروقات المتبقي');
        }

        DieselExport::create($validatedData);

        return redirect()->route('dieselexport.index')
            ->with('success', 'تمت اضافة بيانات صادر المحروقات بنجاح.');
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
        $section      = Section::get(['id', 'name_section']);
        $subSection   = subSection::get(['id', 'name']);
        $typesfuel    = TypesFuel::get(['id', 'name']);

        return view('dieselexport.edit', compact('dieselexport', 'typesfuel', 'section', 'subSection'))->with('dieselexport', $dieselexport);
    }

    public function update(Request $request, $id)
    {
        //
        $dieselexport              = DieselExport::find($id);
        $dieselexport->num_section = $request->num_section;
        $dieselexport->num_note    = $request->num_note;
        $dieselexport->section_id  = $request->section_id;
        $dieselexport->voucher     = $request->voucher;

        // لادخال كمية الصادر بناء على كمية الوارد
        if ((Diesel::sum("quantity") > $request->quantity)) {

            $dieselexport->quantity = $request->quantity;
        } else {
            return back()->with('warning', 'تحقق من كمية المحروقات المتبقي');
        }
        //انتها شرط الكمية
        $dieselexport->date         = $request->date;
        $dieselexport->typesfuel_id = $request->typesfuel_id;

        $dieselexport->save();
        return redirect('dieselexport')->with('info', 'تمت تعديل بيانات صادر المحروقات بنجاح!');
    }

    public function destroy($id)
    {
        DieselExport::destroy($id);
        return redirect()->route('diesel.index')
            ->with('success', 'تمت حذف بيانات صادر المحروقات بنجاح.');

    }

    public function report(Request $request)
    {
        $currentYear  = date('Y');
        $previousYear = $currentYear - 1;

        $allPreviousYears = range(1900, $previousYear);

        // Start the query
        $query = DieselExport::with(['section', 'subSection', 'typesfuel'])->whereYear('date', $currentYear);

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
            ->whereYear('date', $currentYear)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Ensure months are populated even with no data
        // $dieselData = array_merge(array_fill(1, 12, 0), $dieselData);

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
        $remainingDiesel = Diesel::where('typesfuel_id', 1)->sum('quantity') -
        DieselExport::where('typesfuel_id', 1)->sum('quantity');

        $remainingGasoline = Diesel::where('typesfuel_id', 2)->sum('quantity') -
        DieselExport::where('typesfuel_id', 2)->sum('quantity');

        // Return the view with the filtered data
        return view('dieselexport.report', compact(
            'dieselData', 'previousYearsData', 'section', 'subSection',
            'previousBalance', 'totalExported', 'totalEntries',
            'remainingDiesel', 'remainingGasoline', 'dieselExports'
        ));
    }

    // public function searchvou(Request $request)
    // {
    //     $section    = Section::get(['id', 'name_section']);
    //     $subSection = subSection::get(['id', 'name']);
    //     // قم بتحميل السند الأول السند الثاني من النموذج
    //     $startVoucher = $request->input('start_voucher');
    //     $endVoucher   = $request->input('end_voucher');

    //     // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
    //     $dieselexport = DieselExport::whereBetween('voucher', [$startVoucher, $endVoucher])->get();
    //     // $dieselexport=DieselExport::select('quantity')->whereBetween('voucher', [$startVoucher, $endVoucher])->sum('quantity')->get();

    //     // قم بعرض نتيجة البحث
    //     return view('dieselexport.report', compact('dieselexport', 'section', 'subSection'));
    // }

    // public function searchdate(Request $request)
    // {
    //     $section    = Section::get(['id', 'name_section']);
    //     $subSection = subSection::get(['id', 'name']);

    //     // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
    //     $startDate = $request->input('start_date');
    //     $endDate   = $request->input('end_date');

    //     // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
    //     $dieselexport = DieselExport::whereBetween('date', [$startDate, $endDate])->get();

    //     // قم بعرض نتيجة البحث
    //     return view('dieselexport.report', compact('dieselexport', 'section', 'subSection'));
    // }

    // public function searchname(Request $request)
    // {
    //     $section    = Section::get(['id', 'name_section']);
    //     $subSection = subSection::get(['id', 'name']);

    //     $startDate     = $request->input('start_date');
    //     $endDate       = $request->input('end_date');
    //     $section_id    = $request->input('section_id');
    //     $subSection_id = $request->input('subSection_id'); // تحميل القيمة الجديدة (إذا تم تحديدها)
    //     $dieselexport  = DieselExport::whereBetween('date', [$startDate, $endDate])
    //         ->where('section_id', 'like', '%' . $section_id . '%');
    //     if ($subSection_id) { // إذا تم تحديد قيمة للعنصر البحثي الجديد
    //         $dieselexport->where('subSection_id', 'like', '%' . $subSection_id . '%');
    //     }
    //     $dieselexport = $dieselexport->get();

    //     return view('dieselexport.report', compact('dieselexport', 'section', 'subSection'));
    // }

    public function totalreport(Request $request)
    {
        $currentYear = date('Y');

        $dieselexport = DieselExport::select("*")
            ->whereRaw('YEAR(diesel_exports.date) = ?', [$currentYear])
            ->get();

        $section    = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);

        return view('dieselexport.total_report', compact('dieselexport', 'section', 'subSection'));
    }

    public function searchtotal(Request $request)
    {
        $section    = Section::get(['id', 'name_section']);
        $subSection = subSection::get(['id', 'name']);

        // قم بتحميل السند الأول السند الثاني من النموذج
        $startVoucher = $request->input('start_voucher');
        $endVoucher   = $request->input('end_voucher');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $dieselexport = DieselExport::whereBetween('voucher', [$startVoucher, $endVoucher])->get();
        // قم بعرض نتيجة البحث
        return view('dieselexport.total_report', compact('dieselexport', 'section', 'subSection'));
    }
}
