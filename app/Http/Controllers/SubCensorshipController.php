<?php

namespace App\Http\Controllers;

use App\Models\SubCensorship;
use Illuminate\Http\Request;

class SubCensorshipController extends Controller
{

    
    function __construct()
    {
        $this->middleware('permission:censorship', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        //

        $subCensorship = SubCensorship::all();
        return view('subcensorship.index',compact('subCensorship'));
    }

    public function create()
    {
        //
        return view('subcensorship.create');

    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'number' => 'required',

        ]);
        $subCensorship= new SubCensorship();
        $subCensorship->name=$request->name;
        $subCensorship->number=$request->number;

        if ($subCensorship->save()) {
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح!');
        }
    }


    public function show( SubCensorship $supplier)
    {
        //
            // $supplier = Supplier::find($id);
            // return view('supplier.show')->with('supplier', $supplier);

            // $num_supplier = $supplier->num_supplier;
            // return response()->json(['message'=>'Success', 'data'=>$num_supplier]);
    }


    public function edit( $id)
    {
        //
        $subCensorship = SubCensorship::find($id);
        return view('subcensorship.edit', compact('subcensorship'))->with('subcensorship', $subCensorship);
    }


    public function update(Request $request, $id)
    {
        //
        $subCensorship = SubCensorship::find($id);
        $subCensorship->name=$request->name;
        $subCensorship->number=$request->number;

        $subCensorship->save();
        return redirect('subcensorship')->with('info', 'تمت التعديل بنجاح!');
    }


    public function destroy($id)
    {
        //
        SubCensorship::destroy($id);
        return redirect('subcensorship');
}
}