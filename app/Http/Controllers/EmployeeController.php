<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Section;
use App\Models\subSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:employee', ['only' => ['index','show','create', 'store','edit', 'update','destroy']]);

    }

    public function index()
    {
        //
        $section = Section::all();
        $subSection = subSection::all();
        $employee = Employee::all();
        return view('employee.index', compact('employee', 'section', 'subSection'));
    }


    public function create()
    {
        //
        $employee = Employee::all();
        $section = Section::all();
        $subSection = subSection::all();
        return view('employee.create', compact('employee', 'section', 'subSection'));
    }


    public function store(Request $request)
    {
        //
        
        $request->validate([
            'employee_name' => 'required',
            'section_id' => 'required',
            'sub_section_id' => 'required',
        ]);

        $employee = Employee::create([

            'employee_name' => $request->employee_name,
            'section_id' => $request->section_id,
            'sub_section_id' => $request->sub_section_id,

        ]);

   
        if ($employee->save()) {
            return redirect('employee/create')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('employee/create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }


    public function show(employee $employee)
    {
        //
    }

    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        $section = Section::all();
        $subSection = subSection::all();
        return view('employee.edit', compact('employee','subSection','section'));
    }


    public function update(Request $request, $id)
    {
        //


        $employee = Employee::find($id);
        $employee->employee_name = $request->get('employee_name');
        $employee->section_id = $request->get('section_id');
        $employee->sub_section_id = $request->get('sub_section_id');


        if ($employee->save()) {
            return redirect('employee')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('employee')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            session()->flash('error', 'الصنف غير موجود');
            return redirect()->route('item.index');
        }

        // if ($employee->InvoiceExport_product()->count() > 0) {
        //     session()->flash('warning', 'لا يمكن حذف الصنف لأنه مرتبط  بصادر.');
        //     return redirect()->route('item.index');
        // }

        $employee->delete();
        session()->flash('success', 'تم الحذف بنجاح.');
        return redirect()->route('employee.index');
    }

    public function getsub_section($id)
    {
        $subSection = DB::table("sub_sections")->where("section_id", $id)->pluck("name", "id");
        return json_encode($subSection);
    }
}
