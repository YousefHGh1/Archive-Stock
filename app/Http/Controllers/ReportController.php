<?php

namespace App\Http\Controllers;

use App\Models\Export_item;
use App\Models\Import_item;
use App\Models\InvoiceExport_product;
use App\Models\InvoiceProduct;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:report', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function totalreport()
    {

        $totalReport = Item::select(
            'items.id',
            'items.item_num',
            'items.item_name',
            'items.open_balance',
            'items.balance',
            DB::raw('SUM(ip.quantity) as total_incoming'),
            DB::raw('SUM(iep.quantity) as total_outgoing')
        )
            ->leftJoin('invoice_products as ip', 'ip.item_id', '=', 'items.id')
            ->leftJoin('invoice_export_products as iep', 'iep.item_id', '=', 'items.id')
            ->groupBy('items.id', 'items.item_num', 'items.item_name', 'items.open_balance', 'items.balance')
            ->having('items.balance', '>', 0)
            ->get();
        
        return view('inventory.report.totalreport', [
            'totalreport' => $totalReport
        ]);
    }

    public function searchbalance(Request $request)
    {
        $InvoiceProduct = InvoiceProduct::all();
        $InvoiceExport_product = InvoiceExport_product::all();
        $balance = $request->input('balance');
        $totalreport = Item::where('balance', $balance)->get();
        return view('inventory.report.totalreport', compact('totalreport', 'InvoiceExport_product', 'InvoiceProduct'))->with('success', 'تمت عملية البحث !');
    }


    public function transactions($itemId)
    {
        $item = DB::table('items')
            ->select('items.open_balance')
            ->where('items.id', '=', $itemId)
            ->get();

        // احضار حركات شراء الصنف
        $purchases = DB::table('invoices')

            ->join('invoice_products', 'invoices.id', '=', 'invoice_products.invoice_id')
            ->join('items', 'invoice_products.item_id', '=', 'items.id')
            ->join('supplier_items', 'invoices.supplier_item_id', '=', 'supplier_items.id')
            ->select('invoices.voucher_no', 'invoices.invoice_no', 'supplier_items.supplier_item_name', 'invoices.voucher_date', 'invoice_products.quantity', 'items.item_name', 'items.item_num', 'items.open_balance', 'items.balance', DB::raw("'شراء' as type"))
            ->where('invoice_products.item_id', '=', $itemId)
            ->get();

        // احضار حركات صرف الصنف
        $exports = DB::table('invoice_exports')
            ->join('invoice_export_products', 'invoice_exports.id', '=', 'invoice_export_products.invoice_export_id')
            ->join('items', 'invoice_export_products.item_id', '=', 'items.id')
            ->join('sub_sections', 'invoice_exports.subSection_id', '=', 'sub_sections.id')
            ->select('invoice_exports.voucher_no', 'invoice_exports.invoice_no', 'sub_sections.name', 'invoice_exports.voucher_date', 'invoice_export_products.quantity', 'items.item_name', 'items.item_num', 'items.open_balance', 'items.balance', DB::raw("'صرف' as type"))
            ->where('invoice_export_products.item_id', '=', $itemId)
            ->get();

        // دمج حركات الشراء والصرف في مصفوفة واحدة
        $transactions = $purchases->merge($exports);

        // ترتيب الحركات بتاريخ الفاتورة بشكل تصاعدي
        // $transactions = $transactions->sortBy('item');

        $balance = $item->first()->open_balance; // الرصيد الافتتاحي

        foreach ($transactions as $key => $transaction) {
            if ($transaction->type == 'شراء') {
                $balance += $transaction->quantity; // إضافة عملية الشراء إلى الرصيد

            } elseif ($transaction->type == 'صرف') {
                $balance -= $transaction->quantity; // طرح عملية الصرف من الرصيد
            }

            $transactions[$key]->balance = $balance; // تحديث قيمة الرصيد في المصفوفة
        }


        return view('inventory.report.transactions', compact('transactions', 'item'));
    }

    public function searchdate(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $item = DB::table('items')
            ->select('items.open_balance')->get();

        // احضار حركات شراء الصنف بين التاريخين
        $purchases = DB::table('invoices')
            ->join('invoice_products', 'invoices.id', '=', 'invoice_products.invoice_id')
            ->join('items', 'invoice_products.item_id', '=', 'items.id')
            ->select('invoices.voucher_no', 'invoices.voucher_date', 'invoice_products.quantity', 'items.item_name', 'items.item_num', 'items.open_balance', 'items.balance', DB::raw("'شراء' as type"))
            ->whereBetween('invoices.voucher_date', [$start_date, $end_date])
            ->get();

        // احضار حركات صرف الصنف بين التاريخين
        $exports = DB::table('invoice_exports')
            ->join('invoice_export_products', 'invoice_exports.id', '=', 'invoice_export_products.invoice_export_id')
            ->join('items', 'invoice_export_products.item_id', '=', 'items.id')
            ->select('invoice_exports.voucher_no', 'invoice_exports.voucher_date', 'invoice_export_products.quantity', 'items.item_name', 'items.item_num', 'items.open_balance', 'items.balance', DB::raw("'صرف' as type"))
            ->whereBetween('invoice_exports.voucher_date', [$start_date, $end_date])
            ->get();

        $transactions = $purchases->merge($exports);
        $transactions = $transactions->sortBy('voucher_date');

        $balance = $item->first()->open_balance;

        foreach ($transactions as $key => $transaction) {
            if ($transaction->type == 'شراء') {
                $balance += $transaction->quantity;
            } elseif ($transaction->type == 'صرف') {
                $balance -= $transaction->quantity;
            }

            $transactions[$key]->balance = $balance;
        }

        return view('inventory.report.transactions', compact('transactions', 'item'));
    }


    public function transactions_report()
    {
        $items = Item::all();

        return view('inventory.report.index', compact('items'));
    }
}
