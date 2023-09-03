<?php

namespace App\Http\Controllers;

use App\Models\Custody;
use App\Models\Custody_Item;
use App\Models\CustodyProduct;
use App\Models\Item;
use App\Models\Section;
use App\Models\subSection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustodyController extends Controller
{

    public function index()
    {
        //
        $custody = DB::table('custodies')
            ->join('sections', 'custodies.section_id', '=', 'sections.id')
            ->join('sub_sections', 'custodies.sub_section_id', '=', 'sub_sections.id')
            ->join('users', 'custodies.user_id', '=', 'users.id')
            ->join('custody_products', 'custodies.id', '=', 'custody_products.custody_id')
            ->join('custody__items', 'custody_products.item_id', '=', 'custody__items.id')
            ->select('custodies.id', 'sections.name_section', 'sub_sections.name', 'users.employee_name', 'custodies.date', 'custodies.custody_num', DB::raw('GROUP_CONCAT(custody__items.name," (", custody_products.quantity, ") &nbsp;") AS products'))
            ->groupBy('custodies.id', 'sections.name_section', 'sub_sections.name', 'users.employee_name', 'custodies.date', 'custodies.custody_num')
            ->get();
        return view('inventory.custody.index', compact('custody'));
    }


    public function create()
    {
        //
        $section = Section::all();
        $subSection = subSection::all();
        $user = User::all();
        $products = Custody_Item::all();

        return view('inventory.custody.create', compact('section', 'subSection', 'user', 'products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'section_id' => 'required',
            'sub_section_id' => 'required',
            'user_id' => 'required',
            'custody_num' => 'required',
            'date' => 'required',
            'product.*' => 'required|exists:custody__items,id',
            'quantity.*' => 'required|numeric|min:1',
        ]);
        $custody = new Custody();

        $custody->section_id = $request->section_id;
        $custody->sub_section_id = $request->sub_section_id;
        $custody->user_id = $request->user_id;
        $custody->custody_num = $request->custody_num;
        $custody->date = $request->date;


        $custody->save();

        // حفظ الأصناف المضافة إلى الفاتورة
        for ($i = 0; $i < count($request['product']); $i++) {
            $product = Custody_Item::findOrFail($request['product'][$i]);
            $quantity = $request['quantity'][$i];

            $custodyProduct = new CustodyProduct();
            $custodyProduct->custody_id = $custody->id;
            $custodyProduct->item_id = $product->id;
            $custodyProduct->quantity = $quantity;

            // if ($custodyProduct->quantity = $quantity) {
            //     // Find the item
            //     $item = Custody_Item::findOrFail($custodyProduct->item_id);

            //     // Update the item's balance
            //     if ($custodyProduct->quantity > $item->balance) {
            //         return redirect('inventory/custody/create')->with('warning', 'الكمية المطلوبة غير متوفرة ' . ' للصنف  :' . $item->item_name . ' : الرصيد الحالي هو ' . $item->balance);
            //     }
            //     $item->balance -= $custodyProduct->quantity;

            //     // Save the item
            //     $item->update();
            // }

            $custodyProduct->save();
        }

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم حفظ الفاتورة بنجاح.');
    }


    public function show($id)
    {
        // البحث عن الفاتورة باستخدام الرقم المعرف
        $custody = Custody::findOrFail($id);

        // الحصول على الأصناف الموجودة داخل الفاتورة
        $custodyProducts = CustodyProduct::where('custody_id', $id)->get();

        return view('inventory.custody.show', compact('custody', 'custodyProducts'));
    }

    public function edit($id)
    {
        $section = section::all();
        $sub_section = Subsection::all();
        $products = Custody_Item::all();
        $custody = Custody::find($id);
        $user =  User::all();
        return view('inventory.custody.edit', compact('products', 'user', 'custody', 'section', 'sub_section'));
    }



    public function update(Request $request, $id)
    {
        // العثور على الفاتورة المطلوبة
        $custody = Custody::findOrFail($id);

        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'section_id' => 'required',
            'sub_section_id' => 'required',
            'user_id' => 'required',
            'custody_num' => 'required',
            'date' => 'required',
            'product.*' => 'required|exists:custody__items,id',
            'quantity.*' => 'required|numeric|min:1',
        ]);

        // تحديث الحقول الجديدة
        $custody->section_id = $validatedData['section_id'];
        $custody->sub_section_id = $validatedData['sub_section_id'];
        $custody->user_id = $validatedData['user_id'];
        $custody->custody_num = $validatedData['custody_num'];
        $custody->date = $validatedData['date'];
        $custody->save();

        // حذف الأصناف المرتبطة بالفاتورة
        foreach ($custody->custodyproduct as $product) {
            // العثور على الصنف المرتبط بالفاتورة
            $item = Custody_Item::findOrFail($product->item_id);

            // حذف الصنف من الفاتورة
            $product->delete();
        }

        // إضافة الأصناف الجديدة إلى الفاتورة
        for ($i = 0; $i < count($validatedData['product']); $i++) {
            $product = Custody_Item::findOrFail($validatedData['product'][$i]);
            $quantity = $validatedData['quantity'][$i];

            $custodyProduct = new custodyproduct();
            $custodyProduct->custody_id = $custody->id;
            $custodyProduct->item_id = $product->id;

            $custodyProduct->save();
        }

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم تحديث الفاتورة بنجاح.');
    }



    public function destroy($id)
    {
        // العثور على الفاتورة المطلوبة
        $custody = Custody::findOrFail($id);

        // حذف الأصناف المرتبطة بالفاتورة
        foreach ($custody->custodyproduct as $product) {
            // العثور على الصنف المرتبط بالفاتورة
            $item = Custody_Item::findOrFail($product->item_id);
            // حذف الصنف من الفاتورة
            $product->delete();
        }

        // حذف الفاتورة
        $custody->delete();

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم حذف الفاتورة بنجاح.');
    }

    public function searchdate(Request $request)
    {
        // استخراج تاريخ البدء وتاريخ الانتهاء من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $custody = DB::table('custodies')
            ->join('sections', 'custodies.section_id', '=', 'sections.id')
            ->join('sub_sections', 'custodies.sub_section_id', '=', 'sub_sections.id')
            ->join('users', 'custodies.user_id', '=', 'users.id')
            ->join('custody_products', 'custodies.id', '=', 'custody_products.custody_id')
            ->join('custody__items', 'custody_products.item_id', '=', 'custody__items.id')
            ->select('custodies.id', 'sections.name_section', 'sub_sections.name', 'users.employee_name', 'custodies.date', 'custodies.custody_num', DB::raw('GROUP_CONCAT(custody__items.name," (", custody_products.quantity, ") &nbsp;") AS products'))
            ->whereBetween('custodies.date', [$startDate, $endDate])
            ->groupBy('custodies.id', 'sections.name_section', 'sub_sections.name', 'users.employee_name', 'custodies.date', 'custodies.custody_num')
            ->get();
        // عرض نتائج البحث
        return view('inventory.custody.index', compact('custody'))->with('success', 'تمت عملية البحث !');
    }


    public function getUsers($id)
    {
        $users = DB::table("users")->where("sub_section_id", $id)->pluck("employee_name", "id");
        return json_encode($users);
    }


}
