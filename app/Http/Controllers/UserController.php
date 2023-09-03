<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\subSection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\Rules;

class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:users', ['only' => ['index','show','create', 'store','edit', 'update','destroy']]);
        // $this->middleware('permission:user_create', ['only' => ['index','create', 'store','edit', 'update']]);

    }

    public function index()
    {
        //
        $section = Section::all();
        $subSection = subSection::all();
        $user = User::all();
        return view('user.index', compact('user', 'section', 'subSection'));
    }


    public function create()
    {
        //
        $user = User::all();
        $section = Section::all();
        $subSection = subSection::all();
        return view('user.create', compact('user', 'section', 'subSection'));
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'section_id' => 'required',
            'sub_section_id' => 'required',
            'employee_name' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'section_id' => $request->section_id,
            'sub_section_id' => $request->sub_section_id,
            'employee_name' => $request->employee_name,

        ]);

        if ($user->save()) {
            return redirect('user/create')->with('success', 'تمت الاضافة بنجاح!');
        } else {
            return redirect('user/create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }


    public function show(User $user)
    {
        //
    }

    public function edit($id)
    {
        //
        $user = User::find($id);
        $section = Section::all();
        $subSection = subSection::all();
        return view('user.edit', compact('user','subSection','section'));
    }


    public function update(Request $request, $id)
    {
        //


        $user = User::find($id);
        $user->name = $request->get('name');
        $user->employee_name = $request->get('employee_name');
        $user->section_id = $request->get('section_id');
        $user->sub_section_id = $request->get('sub_section_id');


        if ($user->save()) {
            return redirect('user')->with('info', 'تمت التعديل بنجاح!');
        } else {
            return redirect('user')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function destroy(User $user)
    {
        //
    }

    public function getsub_section($id)
    {
        $subSection = DB::table("sub_sections")->where("section_id", $id)->pluck("name", "id");
        return json_encode($subSection);
    }
}