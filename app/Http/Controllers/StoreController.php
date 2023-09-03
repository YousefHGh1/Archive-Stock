<?php

namespace App\Http\Controllers;

use App\Models\store;
use Illuminate\Http\Request;

class storeController extends Controller
{
    public function index(Request $request)
    {
        $store = store::all();
        return view('inventory.store.index', compact('store'));
    }

    public function create()
    {
        return view('inventory.store.create');
    }

    public function store(request $request)
    {

        $request->validate([
            'store_num' => 'required',
            'store_name' => 'required',
            'address' => 'required',
        ]);

        // Save In Database
        $store = new store();
        $store->store_num = $request->input('store_num');
        $store->store_name = $request->input('store_name');
        $store->address = $request->input('address');
        $request = $store->save();

        if ($request === TRUE) {
            return redirect('inventory/store')->with('success', 'تم حفظ المخزن بنجاح *');
        } else {
            return redirect()->back()->with('warning', 'تحقق من الأخطاء الموجودة هنالك خلل ما !!');
        }
    }

    public function edit($id)
    {
        $store = store::find($id);
        return view('inventory.store.edit', compact('store'));
    }

    public function show($id)
    {
        $store = store::find($id);
        return view('inventory.store.show', compact('store'))->with('store', $store);
    }


    public function update(Request $request, $id)
    {
        $store = store::find($id);
        $store->store_num = $request->store_num;
        $store->store_name = $request->store_name;
        $store->address = $request->address;
        $store->save();
        return redirect('inventory/store')->with('success', 'تمت التعديل بنجاح!');
    }

    public function destroy($id)
    {
        store::destroy($id);
        return redirect('inventory/store')->with('danger', ' تم الحذف بنجاح *');
    }

}