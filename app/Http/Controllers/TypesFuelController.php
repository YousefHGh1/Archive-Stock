<?php

namespace App\Http\Controllers;

use App\Models\TypesFuel;
use Illuminate\Http\Request;

class TypesFuelController extends Controller
{

    public function index()
    {
        $TypesFuels = TypesFuel::paginate(10);
        return view('TypesFuel.index', compact('TypesFuels'));

    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string||regex:/^[\p{L}\s]+$/u|max:255',
        ]);

        TypesFuel::create($validatedData);

        return redirect()->route('TypesFuel.index')
            ->with('success', 'saved successfully.');

    }

    public function update(Request $request, $id)
    {
        //
        $subSection = TypesFuel::find($id);

        $validatedData = $request->validate([
            'name' => 'required|string||regex:/^[\p{L}\s]+$/u|max:255',
        ]);

        $subSection->update($validatedData);

        return redirect()->route('TypesFuel.index')
            ->with('success', 'updated successfully.');

    }

    public function destroy($id)
    {
        TypesFuel::destroy($id);

        return redirect()->route('TypesFuel.index')
            ->with('success', 'deleted successfully.');

    }

}