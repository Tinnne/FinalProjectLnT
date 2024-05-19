<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class ItemController extends Controller
{
    public function index(){
        $items = Item::paginate(10);
        return view("dashboard", compact("items"));
    }
    public function create(){
        $categories = Category::all();
        return view("item.create", compact("categories"));
    }
    public function store(Request $request){
        $request->validate([
            "name"=> "required",
            "category"=> "required",
            "price"=> "required|numeric",
            "amount"=> "required|integer"
        ]);
        $slug=Str::slug($request->name);
        $item = Item::create([
            "name"=> $request->name,
            "category"=> $request->category,
            "price"=> $request->price,
            "amount"=> $request->amount,
            "slug"=> $slug
        ]);
        return redirect("dashboard")->with("success","Item created successfully");
    }
    public function view($slug){
        $item = Item::where("slug", $slug)->first();
        return view("item.show", compact('item'));
    }
    public function edit($slug){
        $item = Item::where("slug", $slug)->first();
        $categories = Category::all();
        return view("item.edit", compact('item', 'categories'));
    }

    public function update(Request $request, $slug){
        $request->validate([
            'name'=> 'required',
            'category'=> 'required',
            'amount'=> 'required|integer',
            'price'=> 'required|numeric'
        ]);
        $item = Item::where('slug', $slug)->first();
        $slug=Str::slug($request->name);
        $item->update([
            'name'=> $request->name,
            'category'=> $request->category,
            'price'=> $request->price,
            'amount'=> $request->amount,
            'slug'=> $slug
        ]);
        return redirect('dashboard')->with('success','');
    }

    public function delete($slug){
        $item = Item::where('slug', $slug)->first();
        $item->delete();
        return redirect('dashboard')->with('success','');
    }
}
