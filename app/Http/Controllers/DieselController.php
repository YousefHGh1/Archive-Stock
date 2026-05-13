<?php
namespace App\Http\Controllers;

use App\Models\Diesel;
use App\Models\DieselExport;
use App\Models\Supplier;
use App\Models\TypesFuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DieselController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:diesels', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $currentYear = date('Y');

        $diesel = Diesel::with('supplier', 'typesfuel')->whereYear('date', $currentYear)->paginate(10);
        return view('diesel.index', compact('diesel'));
    }

    public function create()
    {
        $supplier  = Supplier::get(['id', 'name_supplier']);
        $typesfuel = TypesFuel::get(['id', 'name']);
        return view('diesel.create', compact('supplier', 'typesfuel'));
    }

    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'supplier_id'  => 'required',
            'typesfuel_id' => 'required',
            'voucher'      => 'required|numeric|unique:diesels',
            'type'         => 'required',
            'invoice_num'  => 'required|numeric',
            'quantity'     => 'required|numeric',
            'date'         => 'required|date',
        ]);

        Diesel::create($validatedData);

        return redirect()->route('diesel.index')
            ->with('success', 'تمت اضافة بيانات وارد المحروقات بنجاح.');

    }

    public function show($id)
    {
        //
        $diesel   = Diesel::with(['typesfuel', 'supplier'])->find($id);
        $supplier = Supplier::get(['id', 'name_supplier']);

        return view('diesel.show', compact('diesel', 'supplier'))->with('diesel', $diesel);
    }

    public function edit($id)
    {
        //
        $diesel    = Diesel::find($id);
        $supplier  = Supplier::get(['id', 'name_supplier']);
        $typesfuel = TypesFuel::get(['id', 'name']);
        return view('diesel.edit', compact('diesel', 'supplier', 'typesfuel'));
    }

    public function update(Request $request, $id)
    {
        //
        $diesel = Diesel::find($id);

        $validatedData = $request->validate([
            'supplier_id'  => 'required',
            'typesfuel_id' => 'required',
            'voucher'      => 'required|numeric',
            'type'         => 'required',
            'invoice_num'  => 'required|numeric',
            'quantity'     => 'required|numeric',
            'date'         => 'required|date']);

        $diesel->update($validatedData);

        return redirect()->route('diesel.index')
            ->with('success', 'تمت تعديل بيانات وارد المحروقات بنجاح.');

    }

    public function destroy($id)
    {
        Diesel::destroy($id);
        return redirect()->route('diesel.index')
            ->with('success', 'تمت حذف بيانات وارد المحروقات بنجاح.');

    }

    public function report(Request $request)
    {
        $currentYear  = date('Y');
        $previousYear = $currentYear - 1;

        $allPreviousYears = range(1900, $previousYear);

        // Query for diesel entries
        $query = Diesel::with(['typesfuel', 'supplier'])->whereYear('date', $currentYear);

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
            ->whereYear('date', $currentYear)
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
        $remainingDiesel = Diesel::where('typesfuel_id',1)->sum('quantity') -
        DieselExport::where('typesfuel_id', 1)->sum('quantity');

        $remainingGasoline = Diesel::where('typesfuel_id', 2)->sum('quantity') -
        DieselExport::where('typesfuel_id', 2)->sum('quantity');

        return view('diesel.report', compact(
            'dieselData', 'previousYearsData', 'suppliers', 'previousBalance',
            'totalReceived', 'totalEntries', 'remainingDiesel', 'remainingGasoline', 'dieselEntries'
        ));
    }

    // public function searchdate(Request $request)
    // {
    //     $supplier = Supplier::all();

    //     // Validate the input dates to ensure they are not empty and are valid date format
    //     $validated = $request->validate([
    //         'start_date' => 'required|date',
    //         'end_date'   => 'required|date|after_or_equal:start_date',
    //     ]);

    //     // Fetch the dates
    //     $startDate = $request->input('start_date');
    //     $endDate   = $request->input('end_date');

    //     // Perform the search
    //     $dieselEntries = Diesel::with(['typesfuel', 'supplier'])->whereBetween('date', [$startDate, $endDate])->get();

    //     // Get additional required data for the report
    //     $currentYear  = date('Y');
    //     $previousYear = $currentYear - 1;

    //     $dieselData = Diesel::selectRaw('MONTH(date) as month, SUM(quantity) as total')
    //         ->whereYear('date', $currentYear)
    //         ->groupBy('month')
    //         ->pluck('total', 'month');

    //     $totalReceived = Diesel::whereYear('date', $currentYear)->sum('quantity');
    //     $totalEntries  = Diesel::whereYear('date', $currentYear)->count();

    //     $previousBalance = Diesel::whereYear('date', $previousYear)->sum('quantity') -
    //     DieselExport::whereYear('date', $previousYear)->sum('quantity');

    //     $remainingDiesel = Diesel::where('typesfuel_id', 3)->sum('quantity') -
    //     DieselExport::where('typesfuel_id', 3)->sum('quantity');

    //     $remainingGasoline = Diesel::where('typesfuel_id', 2)->sum('quantity') -
    //     DieselExport::where('typesfuel_id', 2)->sum('quantity');

    //     // Check if any entries were found
    //     if ($dieselEntries->isEmpty()) {
    //         return back()->with('error', 'لم يتم العثور على نتائج للفترة المحددة.');
    //     }

    //     // Pass all required data to the view
    //     return view('diesel.report', compact(
    //         'dieselEntries', 'dieselData', 'totalReceived', 'totalEntries', 'previousBalance',
    //         'remainingDiesel', 'remainingGasoline', 'supplier'
    //     ));
    // }

    // public function searchvou(Request $request)
    // {
    //     $supplier = Supplier::all();

    //     // Validate the input voucher range
    //     $validated = $request->validate([
    //         'start_voucher' => 'required|string',
    //         'end_voucher'   => 'required|string',
    //     ]);

    //     // Fetch the voucher range inputs
    //     $startVoucher = $request->input('start_voucher');
    //     $endVoucher   = $request->input('end_voucher');

    //     // Perform the search for diesel entries based on the voucher range
    //     $dieselEntries = Diesel::with(['typesfuel', 'supplier'])->whereBetween('voucher', [$startVoucher, $endVoucher])->get();

    //     // If no diesel entries are found, return an error message
    //     if ($dieselEntries->isEmpty()) {
    //         return back()->with('error', 'لم يتم العثور على نتائج للسندات المحددة.');
    //     }

    //     // Additional data for the report (optional, adjust as needed)
    //     $currentYear  = date('Y');
    //     $previousYear = $currentYear - 1;

    //     $dieselData = Diesel::selectRaw('MONTH(date) as month, SUM(quantity) as total')
    //         ->whereYear('date', $currentYear)
    //         ->groupBy('month')
    //         ->pluck('total', 'month');

    //     $totalReceived = Diesel::whereYear('date', $currentYear)->sum('quantity');
    //     $totalEntries  = Diesel::whereYear('date', $currentYear)->count();

    //     $previousBalance = Diesel::whereYear('date', $previousYear)->sum('quantity') -
    //     DieselExport::whereYear('date', $previousYear)->sum('quantity');

    //     $remainingDiesel = Diesel::where('typesfuel_id', 3)->sum('quantity') -
    //     DieselExport::where('typesfuel_id', 3)->sum('quantity');

    //     $remainingGasoline = Diesel::where('typesfuel_id', 2)->sum('quantity') -
    //     DieselExport::where('typesfuel_id', 2)->sum('quantity');

    //     // Check if any entries were found
    //     if ($dieselEntries->isEmpty()) {
    //         return back()->with('error', 'لم يتم العثور على نتائج للسندين المحددين.');
    //     }

    //     // Return the view with all relevant data
    //     return view('diesel.report', compact(
    //         'dieselEntries', 'supplier', 'dieselData', 'totalReceived', 'totalEntries',
    //         'previousBalance', 'remainingDiesel', 'remainingGasoline'
    //     ));
    // }

}