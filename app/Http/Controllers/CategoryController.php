<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['index', 'search']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);
        return Category::create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return $category;
    }

    /**
     * Search for a name.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name) {

        return Category::where('name', 'like', '%'.$name.'%')->get();
    }
}















// another update 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category         $category
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Category $category)
    // {
    //     $validator = Validator::make(
    //         $request->all(),
    //         [
    //             'name' => 'required|string',
    //         ]
    //     );

    //     if ($validator->fails()) {
    //         return response()->json(
    //             [
    //                 'status' => false,
    //                 'errors' => $validator->errors(),
    //             ],
    //             400
    //         );
    //     }

    //     $category_name = Category::where('name', '=', $request->name)->get();
    //     if (count($category_name)) {
    //         return response()->json(['error' => 'Category already exists'], 200);
    //     }else {
    //         $category->name = $request->name;
    //         $category->save();
    //         return $category;
    //     }

    // }