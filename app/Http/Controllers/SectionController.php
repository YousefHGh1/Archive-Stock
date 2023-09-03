<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:sections', ['only' => ['index','show','create', 'store','edit', 'update','destroy']]);
    }

    public function index()
    {
        //

        $section = Section::all();
        return view('section.index', compact('section'));
    }

    public function create()
    {
        //
        return view('section.create');
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'num_section' => 'required',
            'name_section' => 'required',


        ]);
        $section = new Section();
        $section->num_section = $request->num_section;
        $section->name_section = $request->name_section;

        if ($section->save()) {
            return redirect()->back()->with('success', 'تمت الاضافة بنجاح!');
        }
    }


    public function show($id)
    {
        //
        $section = Section::find($id);
        return view('section.show')->with('section', $section);
    }


    public function edit($id)
    {
        //
        $section = Section::find($id);
        return view('section.edit', compact('section'))->with('section', $section);
    }


    public function update(Request $request, $id)
    {
        //
        $section = Section::find($id);
        $section->num_section = $request->num_section;
        $section->name_section = $request->name_section;




        $section->save();
        return redirect('section')->with('info', 'تمت التعديل بنجاح!');
    }


    public function destroy($id)
    {
        //
        Section::destroy($id);
        return redirect('section')->with('danger', 'تمت الحذف بنجاح!');
    }
}