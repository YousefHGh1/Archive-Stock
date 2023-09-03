<?php

namespace App\Http\Controllers;

use App\Models\Diesel;
use App\Models\Supplier;
use App\Models\TypesFuel;
use Illuminate\Http\Request;

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
        $supplier = Supplier::get(['id', 'name_supplier']);
        $typesfuel = TypesFuel::get(['id', 'name']);
        return view('diesel.create', compact('supplier', 'typesfuel'));
    }

    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'supplier_id' => 'required',
            'typesfuel_id' => 'required',
            'voucher' => 'required|numeric|unique:diesels',
            'type' => 'required',
            'invoice_num' => 'required|numeric',
            'quantity' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Diesel::create($validatedData);

        return redirect()->route('diesel.index')
            ->with('success', 'تمت الاضافة بنجاح.');

    }

    public function show($id)
    {
        //
        $diesel = Diesel::find($id);
        $supplier = Supplier::get(['id', 'name_supplier']);

        return view('diesel.show', compact('diesel', 'supplier'))->with('diesel', $diesel);
    }

    public function edit($id)
    {
        //
        $diesel = Diesel::find($id);
        $supplier = Supplier::get(['id', 'name_supplier']);
        $typesfuel = TypesFuel::get(['id', 'name']);
        return view('diesel.edit', compact('diesel', 'supplier', 'typesfuel'));
    }

    public function update(Request $request, $id)
    {
        //
        $diesel = Diesel::find($id);

        $validatedData = $request->validate([
            'supplier_id' => 'required',
            'typesfuel_id' => 'required',
            'voucher' => 'required|numeric',
            'type' => 'required',
            'invoice_num' => 'required|numeric',
            'quantity' => 'required|numeric',
            'date' => 'required|date']);

        $diesel->update($validatedData);

        return redirect()->route('diesel.index')
            ->with('success', 'تمت التعديل بنجاح.');

    }

    public function destroy($id)
    {
        Diesel::destroy($id);
    }

    public function report(Request $request)
    {
        //
        $diesel = Diesel::select('*')->whereRaw('YEAR(diesels.date) = 2023')->get();
        $supplier = Supplier::all();
        return view('diesel.report', compact('diesel', 'supplier'));
    }

    public function searchdate(Request $request)
    {
        $supplier = Supplier::all();
        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $diesel = Diesel::whereBetween('date', [$startDate, $endDate])->get();

        // قم بعرض نتيجة البحث
        return view('diesel.report', compact('diesel', 'supplier'))->with('success', 'تمت عملية البحث !');
    }

    public function searchvou(Request $request)
    {
        $supplier = Supplier::all();

        // قم بتحميل السند الأول السند الثاني من النموذج
        $startVoucher = $request->input('start_voucher');
        $endVoucher = $request->input('end_voucher');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $diesel = Diesel::whereBetween('voucher', [$startVoucher, $endVoucher])->get();

        // قم بعرض نتيجة البحث
        return view('diesel.report', compact('diesel', 'supplier'));
    }
}