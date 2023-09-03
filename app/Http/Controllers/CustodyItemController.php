<?php

namespace App\Http\Controllers;

use App\Models\Custody_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustodyItemController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:stock', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
    public function index(Request $request)
    {
        // $custody_Item= custody_Item::simplepaginate(5);
        $custody_Item = Custody_Item::all();
        return view('inventory.custody_Item.index', compact('custody_Item'));
    }

    public function create()
    {


        return view('inventory.custody_Item.create');
    }

    public function store(Request $request)
    {

        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'name' => 'required|string|min:2',
        ]);

        // حفظ الوحدة في قاعدة البيانات
        $custody_Item = new Custody_Item();
        $custody_Item->name = $request->input('name');
        $custody_Item->save();



        if ($custody_Item->save()) {
            return redirect('inventory/custody_Item/create')->with('success', '!تم حفظ الوحدة بنجاح');
        } else {
            return redirect('inventory/custody_Item/create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }



    public function edit($id)
    {
        $custody_Item = custody_Item::find($id);
        return view('inventory.custody_Item.edit', compact('custody_Item'));
    }


    public function update(Request $request, $id)
    {
        $custody_Item = custody_Item::find($id);
        $custody_Item->name = $request->name;
        $custody_Item->save();
        return redirect('inventory/custody_Item')->with('success', 'تمت التعديل بنجاح!');
    }

    public function destroy($id)
    {
        $custody_Item = custody_Item::find($id);
        $custody_Item->delete();
        session()->flash('success', 'تم الحذف بنجاح.');
        return redirect()->route('custody_Item.index');
    }


    
}
