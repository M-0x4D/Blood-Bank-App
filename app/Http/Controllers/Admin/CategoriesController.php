<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;

class CategoriesController extends Controller
{
    

    function create_category_view()
    {
        return view('dashboard-front.create_category');
    }

    function create(Request $request)
    {
        Category::create([
            'name' => $request->name , 

        ]);
        $categories = Category::all();
        return redirect('categories')->with('categories' , $categories);

    }


    function show(Request $request)
    {

    }


    function edit_category_view(Request $request)
    {
        $category_id = $request->id;
        return view('dashboard-front.edit_category')->with('category_id' , $category_id);

    }



    function edit(Request $request)
    {
        Category::where('id' , $request->category_id)->update([
            'name' => $request->name
        ]);
        $categories = Category::all();
        return redirect('categories')->with('categories' , $categories);
    }

    function delete(Request $request)
    {

        $category=Category::find($request->id);
        $category->delete();
        $categories = Category::all();
        return redirect('categories')->with('categories' , $categories);
    }
}
