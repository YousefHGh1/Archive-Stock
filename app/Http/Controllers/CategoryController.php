<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:categories', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        // $units= Unit::simplepaginate(5);
        $category = Category::all();
        return view('inventory.category.index', compact('category'));
    }

    public function create()
    {
        $next_num = Category::max('category_num') + 1;
        if (!$next_num) {
            $next_num = 1;
        }
        return view('inventory.category.create', compact('next_num'));
    }

    public function store(request $request)
    {
        // الحصول على أعلى قيمة مخزنة في عمود category_num
        $next_num = Category::max('category_num') + 1;

        // إذا لم يتم العثور على أي سجلات، يتم تعيين القيمة 1 إلى $next_num
        if (!$next_num) {
            $next_num = 1;
        }

        $request->validate([
            // 'category_num' => 'required',
            'category_name' => 'required|string|min:2',
        ]);

        // Save In Database
        $category = new Category();
        $category->category_num = $next_num;
        $category->category_name = $request->input('category_name');
        $request = $category->save();

        if ($request === TRUE) {
            return redirect('inventory/category')->with('success', 'تم حفظ العائلة بنجاح *');
        } else {
            return redirect()->back()->with('warning', 'تحقق من الأخطاء الموجودة هنالك خلل ما !!');
        }
    }

    public function show($id)
    {
        $category = Category::find($id);
        // $category = Category::all();
        return view('inventory.category.show', compact('category'))->with('category', $category);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('inventory.category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'category_num' => 'required',
            'category_name' => 'required|string|min:2',
        ]);

        $category = Category::find($id);
        $category->category_num = $request->category_num;
        $category->category_name = $request->category_name;
        $category->save();

        if ($category->save()) {
            return redirect('inventory/category')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('inventory/category')->with('warning', 'تحقق من الأخطاء الموجودة هنالك خلل ما !!');
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            session()->flash('error', 'العائلة غير موجود');
            return redirect()->route('category.index');
        }

        if ($category->Items()->count() > 0) {
            session()->flash('warning', 'لا يمكن حذف العائلة لأنه مرتبط بصنف.');
            return redirect()->route('category.index');
        }


        $category->delete();
        session()->flash('success', 'تم الحذف بنجاح.');
        return redirect()->route('category.index');
    }
}
