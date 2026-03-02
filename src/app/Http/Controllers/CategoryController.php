<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Colocation;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Colocation $colocation)
    {
        $categories = Category::where('colocation_id', $colocation->id)->get();

        return view('user.owner.category', compact("categories", "colocation"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Colocation $colocation)
    {
        $request->validate([
            "name" => "required"
        ]);

        Category::create([
            "name" => $request->name,
            "colocation_id" => $colocation->id
        ]);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Colocation $colocation, Category $category)
    {
        return view('user.owner.edit-category', compact('category', 'colocation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colocation $colocation, Category $category)
    {
        $request->validate([
            "name" => "required"
        ]);

        $category->update([
            "name" => $request->name,
            "colocation_id" => $colocation->id
        ]);

        return redirect()->route('colocation.category.index', $colocation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colocation $colocation, Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
