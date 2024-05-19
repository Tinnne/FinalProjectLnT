<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderByRaw('LOWER(category)')->paginate(10);;
        return view("category.index",compact("categories"));
    }
    public function store(Request $request){
        $request->validate([
            "category"=> "required|string",
            "description"=> "required",
        ]);
        $slug=Str::slug($request->category);
        $category = Category::create([
            "category"=> $request->category,
            "description"=> $request->description,
            'slug'=>$slug
        ]);
        return redirect("category")->with("success","Category created successfully");
    }
    public function edit($slug){
        $categoryedit = Category::where("slug", $slug)->first();
        $categories = Category::orderByRaw('LOWER(category)')->paginate(10);;
        return view("category.index", compact('categoryedit', 'categories'));
    }

    public function update(Request $request, $slug){
        $request->validate([
            "category"=> "required|string",
            "description"=> "required",
        ]);
        $category = Category::where('slug', $slug)->first();
        $slug=Str::slug($request->category);
        $category->update([
            "category"=> $request->category,
            "description"=> $request->description,
            "slug"=>$slug
        ]);
        $page = $request->input('page', 1);
        return redirect()->route('category', ['page' => $page]);
    }

    public function delete($slug){
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('category')->with('success','');
    }
}
