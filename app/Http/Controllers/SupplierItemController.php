<?php

namespace App\Http\Controllers;

use App\Models\Supplier_item;
use Illuminate\Http\Request;

class SupplierItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:stock', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        // $supplier_item= supplier_item::simplepaginate(5);
        $supplier_item = Supplier_item::all();
        return view('inventory.supplier_item.index', compact('supplier_item'));
    }

    public function create()
    {
        return view('inventory.supplier_item.create');
    }

    public function store(request $request)
    {

        $validatedData = $request->validate([
            'supplier_item_num' => 'required|unique:supplier_items',
            'supplier_item_name' => 'required|string||regex:/^[\p{L}\s]+$/u|max:255',
            'address' => 'required|string||regex:/^[\p{L}\s]+$/u|max:255',
            'phone' => 'required|numeric',
        ]);

        // Save In Database
        Supplier_item::create($validatedData);

        return redirect()->route('supplier_item.index')
            ->with('success', 'تم حفظ المورد بنجاح.');

    }

    public function edit($id)
    {
        $supplier_item = Supplier_item::find($id);
        return view('inventory.supplier_item.edit', compact('supplier_item'));
    }

    public function show($id)
    {
        $supplier_item = Supplier_item::find($id);
        // $supplier_item = supplier_item::all();
        return view('inventory.supplier_item.show', compact('supplier_item'))->with('supplier_item', $supplier_item);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_item_num' => 'required',
            'supplier_item_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $supplier_item = Supplier_item::find($id);
        $supplier_item->supplier_item_num = $request->supplier_item_num;
        $supplier_item->supplier_item_name = $request->supplier_item_name;
        $supplier_item->address = $request->address;
        $supplier_item->phone = $request->phone;
        $supplier_item->save();
        return redirect('inventory/supplier_item')->with('success', 'تمت التعديل بنجاح!');
    }

    public function destroy($id)
    {
        Supplier_item::destroy($id);
        return redirect('inventory/supplier_item')->with('danger', ' تم الحذف بنجاح *');
    }

    public function report()
    {
        $supplier_item = Supplier_item::simplepaginate(5);
        return view('inventory.supplier_item.report', compact('supplier_item'));
    }

    public function search(Request $request)
    {
        $supplier_item_name = $request->input('supplier_item_name');
        $supplier_item = Supplier_item::Where('name', 'like', '%' . $supplier_item_name . '%')->get();
        return view('inventory.supplier_item.report', compact('supplier_item'));
    }
}