<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\Item;
use App\Models\Product;
use App\Models\Supplier_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:invoices', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        $invoices = DB::table('invoices')
            ->join('supplier_items', 'invoices.supplier_item_id', '=', 'supplier_items.id')
            ->join('currencies', 'invoices.currency_id', '=', 'currencies.id')
            ->join('invoice_products', 'invoices.id', '=', 'invoice_products.invoice_id')
            ->join('items', 'invoice_products.item_id', '=', 'items.id')
            ->select('invoices.id', 'invoices.voucher_no', 'invoices.voucher_date', 'invoices.invoice_no', 'supplier_items.supplier_item_name','currencies.name', DB::raw('GROUP_CONCAT(items.item_name," (", invoice_products.quantity, ") &nbsp;") AS products'))
            ->groupBy('invoices.id', 'invoices.voucher_no', 'invoices.voucher_date', 'invoices.invoice_no', 'supplier_items.supplier_item_name','currencies.name')
            ->get();
        return view('inventory.invoice.index', compact('invoices'));
    }


    public function create()
    {
        //
        $products = Item::all();
        $supplier_item =  Supplier_item::all();
        $currency = Currency::all();
        return view('inventory.invoice.create', compact('products', 'supplier_item', 'currency'));
    }


    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate(
            [
                'voucher_no' => 'required|unique:invoices,voucher_no',
                'voucher_date' => 'required|date',
                'invoice_no' => 'required',
                'supplier_item_id' => 'required',
                'currency_id' => 'required',
   

                'product.*' => 'required|exists:items,id',
                'quantity.*' => 'required|numeric|min:0.5',
                'price.*' => 'required|numeric|min:0',
            ],
            [
                'voucher_no.unique' => 'رقم السند مسجل مسبقا',
            ]
        );

        // إنشاء فاتورة جديدة
        $invoice = new Invoice();
        $invoice->voucher_no = $validatedData['voucher_no'];
        $invoice->voucher_date = $validatedData['voucher_date'];
        $invoice->invoice_no = $validatedData['invoice_no'];
        $invoice->supplier_item_id = $validatedData['supplier_item_id'];
        $invoice->currency_id = $validatedData['currency_id'];
 
        // if ($request->hasFile('amen_sign')) {
        //     $image = $request->file('amen_sign');
        //     $name = time() . '.' . $image->getClientOriginalExtension();
        //     $path = 'imageinvoice/' . $name;
        //     $image->move(public_path('imageinvoice'), $name);
        //     $invoice->amen_sign = $path;
        //  }



        // if ($request->hasFile('manager_sign')) {
        //     $image = $request->file('manager_sign');
        //     $name = time() . '.' . $image->getClientOriginalExtension();
        //     $path = 'imageinvoice/' . $name;
        //     if ($image->move(public_path('imageinvoice'), $name)) {
        //         $invoice->manager_sign = $path;
        //     } else {
        //         // handle error
        //     }
        //  }



        $invoice->save();

        // حفظ الأصناف المضافة إلى الفاتورة
        for ($i = 0; $i < count($validatedData['product']); $i++) {
            $product = Item::findOrFail($validatedData['product'][$i]);
            $quantity = $validatedData['quantity'][$i];
            $price = $validatedData['price'][$i];

            $invoiceProduct = new InvoiceProduct();
            $invoiceProduct->invoice_id = $invoice->id;
            $invoiceProduct->item_id = $product->id;
            // $invoiceProduct->quantity = $quantity;

            if ($invoiceProduct->quantity = $quantity) {
                // Find the item
                $item = Item::findOrFail($invoiceProduct->item_id);

                // Update the item's balance
                $item->balance += $invoiceProduct->quantity;

                // Save the item
                $item->update();
            }

            $invoiceProduct->price = $price;
            $invoiceProduct->save();
        }

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم حفظ الفاتورة بنجاح.');
    }

    public function show($id)
    {
        // البحث عن الفاتورة باستخدام الرقم المعرف
        $invoice = Invoice::findOrFail($id);

        // الحصول على الأصناف الموجودة داخل الفاتورة
        $invoiceProducts = InvoiceProduct::where('invoice_id', $id)->get();

        return view('inventory.invoice.show', compact('invoice', 'invoiceProducts'));
    }



    public function edit($id)
    {
        //
        $invoice = Invoice::findOrFail($id);
        $products = Item::all();
        $supplier_item =  Supplier_item::all();
        return view('inventory.invoice.edit', compact('products', 'supplier_item', 'invoice'));
    }

    public function update(Request $request, $id)
    {
        // العثور على الفاتورة المطلوبة
        $invoice = Invoice::findOrFail($id);

        // التحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'voucher_no' => 'required',
            'voucher_date' => 'required|date',
            'invoice_no' => 'required',
            'supplier_item_id' => 'required',
            'product.*' => 'required|exists:items,id',
            'quantity.*' => 'required|numeric|min:0.5',
            'price.*' => 'required|numeric|min:0',
        ]);

        // تحديث الحقول الجديدة
        $invoice->voucher_no = $validatedData['voucher_no'];
        $invoice->voucher_date = $validatedData['voucher_date'];
        $invoice->invoice_no = $validatedData['invoice_no'];
        $invoice->supplier_item_id = $validatedData['supplier_item_id'];
        $invoice->save();

        // حذف الأصناف المرتبطة بالفاتورة
        foreach ($invoice->invoiceproduct as $product) {
            // العثور على الصنف المرتبط بالفاتورة
            $item = Item::findOrFail($product->item_id);

            // تحديث الرصيد
            $item->balance -= $product->quantity;
            $item->update();

            // حذف الصنف من الفاتورة
            $product->delete();
        }

        // إضافة الأصناف الجديدة إلى الفاتورة
        for ($i = 0; $i < count($validatedData['product']); $i++) {
            $product = Item::findOrFail($validatedData['product'][$i]);
            $quantity = $validatedData['quantity'][$i];
            $price = $validatedData['price'][$i];

            $invoiceProduct = new invoiceproduct();
            $invoiceProduct->invoice_id = $invoice->id;
            $invoiceProduct->item_id = $product->id;

            // تحديث الرصيد الجديد
            $item = Item::findOrFail($invoiceProduct->item_id);
            $item->balance += $quantity;
            $item->update();

            $invoiceProduct->quantity = $quantity;
            $invoiceProduct->price = $price;
            $invoiceProduct->save();
        }

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم تحديث الفاتورة بنجاح.');
    }

    public function destroy($id)
    {
        // العثور على الفاتورة المطلوبة
        $invoice = Invoice::findOrFail($id);

        // حذف الأصناف المرتبطة بالفاتورة
        foreach ($invoice->invoiceproduct as $product) {
            // العثور على الصنف المرتبط بالفاتورة
            $item = Item::findOrFail($product->item_id);

            // تحديث الرصيد
            $item->balance -= $product->quantity;
            $item->update();

            // حذف الصنف من الفاتورة
            $product->delete();
        }

        // حذف الفاتورة
        $invoice->delete();

        // رسالة نجاح العملية
        return redirect()->back()->with('success', 'تم حذف الفاتورة بنجاح.');
    }

    public function searchdate(Request $request)
    {
        // استخراج تاريخ البدء وتاريخ الانتهاء من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // تنفيذ البحث عن الفواتير بين التاريخين
        $invoices = DB::table('invoices')
            ->join('supplier_items', 'invoices.supplier_item_id', '=', 'supplier_items.id')
            ->join('invoice_products', 'invoices.id', '=', 'invoice_products.invoice_id')
            ->join('items', 'invoice_products.item_id', '=', 'items.id')
            ->select('invoices.id', 'invoices.voucher_no', 'invoices.voucher_date', 'invoices.invoice_no', 'supplier_items.supplier_item_name', DB::raw('GROUP_CONCAT(items.item_name," (", invoice_products.quantity, ") &nbsp;") AS products'))
            ->whereBetween('invoices.voucher_date', [$startDate, $endDate])
            ->groupBy('invoices.id', 'invoices.voucher_no', 'invoices.voucher_date', 'invoices.invoice_no', 'supplier_items.supplier_item_name')
            ->get();

        // عرض نتائج البحث
        return view('inventory.invoice.index', compact('invoices'))->with('success', 'تمت عملية البحث !');
    }
}