<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = 20;
        if(request()->has('count')){
            $count = request()->count;
        }

        if(request()->has('count') && request()->count == 'all'){
            $count = Category::count();
        }

        if (request()->has('search')) {
            $categories = Category::Where('title', 'like', '%' . request()->search . '%')
            ->orWhere('body', 'like', '%' . request()->search . '%')
            ->orderByDesc('id')->paginate($count);
        }else{
            $categories = Category::orderByDesc('id')->paginate($count);
        }
        return view('categories.index', compact('categories'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:50',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('msg', 'Category created successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
                'name' => 'required|min:5|max:50',
            ]);

        Category::find($id)->update([
            'name' => $request->name,
        ]);;


        return redirect()->route('categories.index')->with('msg', 'Category updated successfully')->with('type', 'warning');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category= Category::destroy($id);
        $categories = Category::orderByDesc('id')->paginate(20);

        return view('categories.table', compact('categories'))->render();
    }
}
