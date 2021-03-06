<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories   = Category::all();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name'          => 'required',
                'description'   => 'required',
            ],
            [
                'name.unique' => 'Categoria ya registrada',
            ],
        );

        Category::insert(
            [
                'name' => $request->name,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Ctegoria registrada',
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.edit', compact('category'));
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
        $validated = $request->validate(
            [
                'name'          => 'required',
                'description'   => 'required',
            ],
            [
                'name.unique' => 'Categoria ya registrada',
            ],
        );

        Category::find($id)->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Ctegoria registrada',
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('deleted','yes');
    }
}
