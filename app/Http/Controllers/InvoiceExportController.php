<?php

namespace App\Http\Controllers;

use App\Models\InvoiceExport;
use App\Models\InvoiceExport_product;
use App\Models\Item;
use App\Models\subSection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InvoiceExportController extends Controller
{

    public function index()
    {
        $invoice_exports = DB::table('invoice_exports')
            ->join('sub_sections', 'invoice_exports.subSection_id', '=', 'sub_sections.id')
            ->join('invoice_export_products', 'invoice_exports.id', '=', 'invoice_export_products.invoice_export_id')
            ->join('items', 'invoice_export_products.item_id', '=', 'items.id')
            ->select('invoice_exports.id', 'invoice_exports.voucher_no', 'invoice_exports.voucher_date', 'invoice_exports.invoice_no', 'invoice_exports.user_id', 'sub_sections.name', DB::raw('GROUP_CONCAT(items.item_name," (", invoice_export_products.quantity, ") &nbsp;") AS products'))
            ->groupBy('invoice_exports.id', 'invoice_exports.voucher_no', 'invoice_exports.voucher_date', 'invoice_exports.invoice_no', 'invoice_exports.user_id', 'sub_sections.name')
            ->get();
        // $invoice_exports= InvoiceExport::all();
        // $subSection = subSection::all();
        // $user = User::all();
        return view('inventory.invoice_export.index', compact('invoice_exports'));
    }


    public function create()
    {
        $products = Item::all();
        $subSection = subSection::all();
        $user = User::all();
        return view('inventory.invoice_export.create', compact('products', 'subSection', 'user'));
    }


    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'voucher_no' => 'required|unique:invoice_exports,voucher_no',
            'voucher_date' => 'required|date',
            'invoice_no' => 'required',
            'subSection_id' => 'required',
            'user_id' => 'required',
            'product.*' => 'required|exists:items,id',
            'quantity.*' => 'required|numeric|min:0.5',
        ]);

        // إنشاء فاتورة جديدة
        $invoiceExport = new InvoiceExport();
        $invoiceExport->voucher_no = $validatedData['voucher_no'];
        $invoiceExport->voucher_date = $validatedData['voucher_date'];
        $invoiceExport->invoice_no = $validatedData['invoice_no'];
        $invoiceExport->subSection_id = $validatedData['subSection_id'];
        $invoiceExport->user_id = $validatedData['user_id'];

        $invoiceExport->save();

        // حفظ الأصناف المضافة إلى الفاتورة
        for ($i = 0; $i < count($validatedData['product']); $i++) {
            $product = Item::findOrFail($validatedData['product'][$i]);
            $quantity = $validatedData['quantity'][$i];

            $invoiceExport_product = new InvoiceExport_product();
            $invoiceExport_product->invoice_export_id = $invoiceExport->id;
            $invoiceExport_product->item_id = $product->id;

            if ($invoiceExport_product->quantity = $quantity) {
                // Find the item
                $item = Item::findOrFail($invoiceExport_product->item_id);

                // Update the item's balance
                if ($invoiceExport_product->quantity > $item->balance) {
                    return redirect('inventory/invoice_export/create')->with('warning', 'الكمية المطلوبة غير متوفرة ' . ' للصنف  :' . $item->item_name . ' : الرصيد الحالي هو ' . $item->balance);
                }
                $item->balance -= $invoiceExport_product->quantity;

                // Save the item
                $item->update();
            }

            $invoiceExport_product->save();
        }

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم حفظ الفاتورة بنجاح.');
    }

    public function show($id)
    {
        // البحث عن الفاتورة باستخدام الرقم المعرف
        $invoiceExport = InvoiceExport::findOrFail($id);

        // الحصول على الأصناف الموجودة داخل الفاتورة
        $invoiceExport_products = invoiceExport_product::where('invoice_export_id', $id)->get();

        return view('inventory.invoice_export.show', compact('invoiceExport', 'invoiceExport_products'));
    }


    public function edit($id)
    {
        //
        $invoiceExport = InvoiceExport::findOrFail($id);
        $products = Item::all();
        $subSection = SubSection::all();
        return view('inventory.invoice_export.edit', compact('products', 'subSection', 'invoiceExport'));
    }

    public function update(Request $request, $id)
    {
        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'voucher_no' => 'required|unique:invoice_exports,voucher_no,' . $id,
            'voucher_date' => 'required|date',
            'invoice_no' => 'required',
            'subSection_id' => 'required',
            'product.*' => 'required|exists:items,id',
            'quantity.*' => 'required|numeric|min:0.5',
            // 'price.*' => 'required|numeric|min:0',
        ]);

        // تحديث بيانات الفاتورة
        $invoiceExport = InvoiceExport::findOrFail($id);
        $invoiceExport->voucher_no = $validatedData['voucher_no'];
        $invoiceExport->voucher_date = $validatedData['voucher_date'];
        $invoiceExport->invoice_no = $validatedData['invoice_no'];
        $invoiceExport->subSection_id = $validatedData['subSection_id'];
        $invoiceExport->save();

        // حذف الأصناف المرتبطة بالفاتورة
        foreach ($invoiceExport->InvoiceExport_product as $product) {
            // العثور على الصنف المرتبط بالفاتورة
            $item = Item::findOrFail($product->item_id);

            // تحديث الرصيد
            $item->balance += $product->quantity;
            $item->update();

            // حذف الصنف من الفاتورة
            $product->delete();
        }

        // // حذف كل الأصناف السابقة التي تم إضافتها إلى الفاتورة
        // $invoiceExport->InvoiceExport_product()->delete();

        // إضافة الأصناف المحدثة إلى الفاتورة
        for ($i = 0; $i < count($validatedData['product']); $i++) {
            $product = Item::findOrFail($validatedData['product'][$i]);
            $quantity = $validatedData['quantity'][$i];
            // $price = $validatedData['price'][$i];

            $invoiceExport_product = new InvoiceExport_product();
            $invoiceExport_product->invoice_export_id = $invoiceExport->id;
            $invoiceExport_product->item_id = $product->id;
            $invoiceExport_product->quantity = $quantity;

            if ($invoiceExport_product->quantity = $quantity) {
                // Find the item
                $item = Item::findOrFail($invoiceExport_product->item_id);

                // Update the item's balance
                $item->balance -= $invoiceExport_product->quantity;

                // Save the item
                $item->update();
            }

            $invoiceExport_product->save();
        }

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم تحديث الفاتورة بنجاح.');
    }

    public function destroy($id)
    {
        // العثور على الفاتورة المطلوبة
        $invoiceExport = InvoiceExport::findOrFail($id);

        // حذف الأصناف المرتبطة بالفاتورة
        foreach ($invoiceExport->InvoiceExport_product as $product) {
            // العثور على الصنف المرتبط بالفاتورة
            $item = Item::findOrFail($product->item_id);

            // تحديث الرصيد
            $item->balance += $product->quantity;
            $item->update();

            // حذف الصنف من الفاتورة
            $product->delete();
        }

        // حذف الفاتورة
        $invoiceExport->delete();

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم حذف الفاتورة بنجاح.');
    }




    public function searchdate(Request $request)
    {
        // استخراج تاريخ البدء وتاريخ الانتهاء من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $invoice_exports = DB::table('invoice_exports')
            ->join('sub_sections', 'invoice_exports.subSection_id', '=', 'sub_sections.id')
            ->join('invoice_export_products', 'invoice_exports.id', '=', 'invoice_export_products.invoice_export_id')
            ->join('items', 'invoice_export_products.item_id', '=', 'items.id')
            ->select('invoice_exports.id', 'invoice_exports.voucher_no', 'invoice_exports.voucher_date', 'invoice_exports.invoice_no', 'sub_sections.name', DB::raw('GROUP_CONCAT(items.item_name," (", invoice_export_products.quantity, ") &nbsp;") AS products'))
            ->whereBetween('invoice_exports.voucher_date', [$startDate, $endDate])
            ->groupBy('invoice_exports.id', 'invoice_exports.voucher_no', 'invoice_exports.voucher_date', 'invoice_exports.invoice_no', 'sub_sections.name')
            ->get();
        // عرض نتائج البحث
        return view('inventory.invoice_export.index', compact('invoice_exports'))->with('success', 'تمت عملية البحث !');
    }
}
