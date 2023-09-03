<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:stock', ['only' => ['index',  'create', 'store', 'edit', 'update']]);
    }
    public function index(Request $request)
    {
        // $currency= currency::simplepaginate(5);
        $currency = Currency::all();
        return view('inventory.currency.index', compact('currency'));
    }

    public function create()
    {

        return view('inventory.currency.create');
    }

    public function store(Request $request)
    {

        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'name' => 'required',
            'value' => 'required',
        ]);

        // حفظ الوحدة في قاعدة البيانات
        $currency = new Currency();
        $currency->name = $request->input('name');
        $currency->value = $request->input('value');
        $currency->save();

        if ($currency->save()) {
            return redirect('inventory/currency/create')->with('success', '!تم حفظ الوحدة بنجاح');
        } else {
            return redirect('inventory/currency/create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }



    public function edit($id)
    {
        $currency = Currency::find($id);
        return view('inventory.currency.edit', compact('currency'));
    }


    public function update(Request $request, $id)
    {
        $currency = Currency::find($id);
        $currency->name = $request->name;
        $currency->value = $request->value;
        $currency->save();
        return redirect('inventory/currency')->with('success', 'تمت التعديل بنجاح!');
    }
}
