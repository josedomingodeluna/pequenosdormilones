<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
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
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->isEmpty()) {
            $notification = array(
                'message' => 'Aún no registras ninguna Categoria',
                'alert-type' => 'error'
            );

            return redirect()->route('category.create')->with($notification);
        }
        
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,
            [
                'name'          => 'required|unique:products',
                'category'      => 'required',
                'sale_price'    => 'required',
                'minstock'      => 'required',
            ],
            [
                'name.required'         => 'El Nombre es necesario',
                'name.unique'           => 'Este Producto ya existe',
                'sale_price.required'   => 'El Precio de Venta es necesario',
                'category.required'     => 'Selecciona una Categoria',
                'minstock.required'     => 'El Minimo en Stock es necesario',
            ],
        );

    Product::insert(
        [
            'code' => $request->code,
            'name' => $request->name,
            'category' => $request->category,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'minstock' => $request->minstock,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]
    );

    $notification = array(
        'message' => 'Producto Registrado',
        'alert-type' => 'success'
    );

    return redirect()->route('product.index')->with($notification);
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
        $product = Product::find($id);
        $selected = Category::find($product->category);
        $categories = Category::all();
        return view('product.edit', compact('product', 'selected', 'categories'));
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
        $this->validate($request,
        [
            'name'          => 'required|unique:products',
            'category'      => 'required',
            'sale_pirce'    => 'required',
            'minstock'      => 'required',
        ],
        [
            'name.required'         => 'El Nombre es necesario',
            'name.unique'           => 'Este Producto ya existe',
            'sale_price.required'   => 'El Precio de Venta es necesario',
            'category.required'     => 'Selecciona una Categoria',
            'minstock.required'     => 'El Minimo de Stock es necesario',
        ],
    );

    Product::find($id)->update(
        [
            'code' => $request->code,
            'name' => $request->name,
            'category' => $request->category,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'minstock' => $request->minstock,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]
    );

    $notification = array(
        'message' => 'Producto Actualizado',
        'alert-type' => 'success'
    );

    return redirect()->route('product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('deleted','yes');
    }

    public function import(Request $request) {
        $this->validate($request,
            [
                'import_file'   => 'required|mimes:xlsx,cvs',
            ],
            [
                'import_file.required'  => 'Es necesario seleccionar un archivo.',
                'import_file.mimes'     => 'El archivo debe ser de tipo: xlsx o cvs.',
            ],
        );

        Excel::import(new ProductsImport(), $request->file('import_file'));

        $notification = array(
            'message' => 'Productos Importados correctamente',
            'alert-type' => 'success'
        );
    
        return redirect()->route('product.index')->with($notification);
    }
}
