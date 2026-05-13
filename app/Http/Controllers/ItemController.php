<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Unit;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:items', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }
public function index(Request $request)
{
    $query = Item::with('category', 'unit');

    // البحث باسم التصنيف
    if ($request->filled('category_name')) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('category_name', 'LIKE', '%' . $request->category_name . '%');
        });
    }

    // البحث برقم التصنيف
    if ($request->filled('category_num')) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('category_num', 'LIKE', '%' . $request->category_num . '%');
        });
    }

    // البحث باسم الصنف
    if ($request->filled('item_name')) {
        $query->where('item_name', 'LIKE', '%' . $request->item_name . '%');
    }

    // البحث برقم الصنف
    if ($request->filled('item_num')) {
        $query->where('item_num', 'LIKE', '%' . $request->item_num . '%');
    }

    // 🔽 الترتيب حسب رقم الصنف تصاعدياً (ترتيب رقمي صحيح)
    $query->orderByRaw('CAST(item_num AS UNSIGNED) ASC');

    // Pagination
    $item = $query->paginate(10);

    // جلب التصنيفات
    $category = Category::get(['id', 'category_name', 'category_num']);

    return view('inventory.item.index', compact('item', 'category'));
}

    // public function index(Request $request)
    // {
    //     $query = Item::with('category', 'unit');

    //     // Check if a category search query exists
    //     if ($request->has('category_name') && $request->input('category_name') != '') {
    //         $category = $request->input('category_name');
    //         $query->whereHas('category', function ($q) use ($category) {
    //             $q->where('category_name', 'LIKE', "%{$category}%");
    //         });
    //     }

    //     // Check if a category search query exists
    //     if ($request->has('category_num') && $request->input('category_num') != '') {
    //         $category = $request->input('category_num');
    //         $query->whereHas('category', function ($q) use ($category) {
    //             $q->where('category_num', 'LIKE', "%{$category}%");
    //         });
    //     }

    //     // Check if an item name search query exists
    //     if ($request->has('item_name') && $request->input('item_name') != '') {
    //         $itemName = $request->input('item_name');
    //         $query->where('item_name', 'LIKE', "%{$itemName}%");
    //     }

    //     // Check if an item number search query exists
    //     if ($request->has('item_num') && $request->input('item_num') != '') {
    //         $itemNum = $request->input('item_num');
    //         $query->where('item_num', 'LIKE', "%{$itemNum}%");
    //     }

    //     // Paginate the results
    //     $item = $query->paginate(10);
    //     $category = Category::get(['id', 'category_name', 'category_num']);

    //     return view('inventory.item.index', compact('item', 'category'));
    // }

    public function create()
    {
        $items = Item::all();
        $units = Unit::all();
        $categories = Category::all();

        return view('inventory.item.create', compact('items', 'units', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'item_num' => 'required|integer',
            'item_name' => 'required|string|max:255',
            'open_balance' => 'required|numeric|min:0',
            'low_limit' => 'required|numeric|min:0',
        ]);

        $item = new Item;
        $item->fill($validated);
        $item->balance = $validated['open_balance'];

        if ($item->save()) {
            return redirect()->route('item.index')->with('success', 'تمت الإضافة بنجاح!');
        }

        return redirect()->back()->with('warning', 'تحقق من صحة البيانات!');
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
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'item_num' => 'required|integer',
            'item_name' => 'required|string|max:255',
            'open_balance' => 'required|numeric|min:0',
            'low_limit' => 'required|numeric|min:0',
        ]);

        $item = Item::find($id);
        $old_open_balance = $item->open_balance;
        $item->fill($validated);
        $item->balance += ($validated['open_balance'] - $old_open_balance);

        if ($item->save()) {
            return redirect()->route('item.index')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect()->back()->with('warning', 'تحقق من صحة البيانات!');
        }
    }

    public function destroy($id)
    {
        $item = Item::find($id);

        if (! $item) {
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

    public function getLastItem($id)
    {
        // البحث عن آخر صنف مرتبط بالعائلة وترتيبهم تنازليًا حسب رقم الصنف
        $lastItem = Item::where('category_id', $id)
            ->where('item_num', 'like', $id.'%') // نبحث عن كل الأصناف التي تبدأ برقم العائلة
            ->orderByDesc('item_num') // ترتيبهم تنازليًا حسب item_num
            ->first();

            // dd($lastItem);

        // إذا كان هناك صنف سابق
        if ($lastItem) {
            // إرجاع الرقم الأخير
            return response()->json(['last_item_num' => $lastItem->item_num]);
        }

        // إذا لم يكن هناك صنف سابق، نعيد الرقم الأول بناءً على رقم العائلة
        return response()->json(['last_item_num' => $id.'0']); // في البداية سيكون 1010 ثم يتم زيادته إلى 1011، 1012، إلخ
    }
}
