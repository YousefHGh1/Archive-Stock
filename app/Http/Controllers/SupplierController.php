<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:suppliers', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        //
        $supplier = Supplier::get();
        return view('supplier.index',compact('supplier'));
    }

    public function create()
    {
        //
        return view('supplier.create');

    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'num_supplier' => 'required|numeric',
            'name_supplier' => 'required|string|regex:/^[\p{L}\s]+$/u|max:255',

        ]);
        $supplier= new Supplier();
        $supplier->num_supplier=$request->num_supplier;
        $supplier->name_supplier=$request->name_supplier;

        if ($supplier->save()) {
        return redirect('supplier')->with('success', 'تمت الاضافة بنجاح!');
        }
    }


    public function show( Supplier $supplier)
    {
        //
            // $supplier = Supplier::find($id);
            // return view('supplier.show')->with('supplier', $supplier);

            $num_supplier = $supplier->num_supplier;
            return response()->json(['message'=>'Success', 'data'=>$num_supplier]);
    }


    public function edit( $id)
    {
        //
        $supplier = Supplier::find($id);
        return view('supplier.edit', compact('supplier'))->with('supplier', $supplier);
    }


    public function update(Request $request, $id)
    {
        //
        $supplier = Supplier::find($id);
        $supplier->num_supplier=$request->num_supplier;
        $supplier->name_supplier=$request->name_supplier;

        $supplier->save();
        return redirect('supplier')->with('info', 'تمت التعديل بنجاح!');
    }


    public function destroy($id)
    {
        //
        Supplier::destroy($id);
        return redirect('supplier');
}
}