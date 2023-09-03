<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Export_item;
use App\Models\Import_item;
use App\Models\Item;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:items', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        $items = Item::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('inventory.item.index', compact(
            'items',
            'unit',
            'category'
        ));
    }



    public function create()
    {
        //
        $item = item::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('inventory.item.create', compact(
            'item',
            'unit',
            'category'
        ));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'unit_id' => 'required',
            'item_num' => 'required',
            'item_name' => 'required',
            'open_balance' => 'required',
            'low_limit' => 'required',
        ]);
        $item = new item();

        $item->category_id = $request->category_id;
        $item->unit_id = $request->unit_id;
        $item->item_num = $request->item_num;
        $item->item_name = $request->item_name;
        $item->open_balance = $request->open_balance;
        $item->low_limit = $request->low_limit;
        $item->balance = $request->open_balance + $request->balance; // تخزين open_balance داخل balance

        if ($item->save()) {
            return redirect('inventory/item')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('inventory/item/create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function show($id)
    {
        //
        $item = item::find($id);
        $unit = Unit::all();
        $category = Category::all();
        return view('inventory.item.show', compact('item', 'unit', 'category'));
    }


    public function edit($id)
    {
        //
        $item = item::find($id);
        $unit = Unit::all();
        $category = Category::all();
        return view('inventory.item.edit', compact('item', 'unit', 'category'));
    }


    public function update(Request $request, $id)
    {
        //

        $item = item::find($id);
        $item->category_id = $request->category_id;
        $item->unit_id = $request->unit_id;
        $item->item_num = $request->item_num;
        $item->item_name = $request->item_name;
        $item->open_balance = $request->open_balance;
        $item->low_limit = $request->low_limit;

        if ($item->save()) {
            return redirect('inventory/item')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('inventory/item')->with('warning', '  تحقق من صحة البيانات!');
        }
    }
    public function destroy($id)
    {
        $item = Item::find($id);

        if (!$item) {
            session()->flash('error', 'الصنف غير موجود');
            return redirect()->route('item.index');
        }

        if ($item->InvoiceProduct()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الصنف لأنه مرتبط بوارد.');
            return redirect()->route('item.index');
        }

        if ($item->InvoiceExport_product()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف الصنف لأنه مرتبط  بصادر.');
            return redirect()->route('item.index');
        }

        $item->delete();
        session()->flash('success', 'تم الحذف بنجاح.');
        return redirect()->route('item.index');
    }
}
