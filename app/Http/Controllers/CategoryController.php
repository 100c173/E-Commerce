<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_user');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request )
    {
        Category::create($request->all());    
        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show',compact('category')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category )
    {
        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }

    public function trashe(){
        $categories = Category::onlyTrashed()->get();
        return view('trashed.category',compact('categories'));
    }

    public function forceDelete(string $id){
        $category =Category::withTrashed()->find($id);
        $category->forceDelete();
        return redirect()->route('categories.index');
    }

    public function restore(string $id){
        $category =Category::withTrashed()->find($id);
        $category->restore();
        return redirect()->route('categories.index');
    }

    public function search (Request $request){
        $category = Category::all()->where('name',$request->name)->first();
        
        return view('category.search',compact('category'));
    }
}
