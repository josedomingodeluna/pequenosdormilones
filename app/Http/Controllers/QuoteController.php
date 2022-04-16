<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Branch;
use App\Models\Folio;
use App\Models\Customer;
use App\Models\DocumentData;
use App\Models\QuoteProduct;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::all();
        return view('quote.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $branches = Branch::all();
        
        if($branches->isEmpty()) {
            $notification = array(
                'message' => 'Aún no registras ninguna Sucursal',
                'alert-type' => 'error'
            );

            return redirect()->route('branch.create')->with($notification);
        }

        $folios = Folio::all();

        if($folios->isEmpty()) {
            $notification = array(
                'message' => 'Aún no registras ninguna Serie',
                'alert-type' => 'error'
            );

            return redirect()->route('folio.create')->with($notification);
        }

        return view('quote.create', compact('branches', 'folios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $amount = \Cart::instance('quote')->total();

        $this->validate($request,
            [
                'branch'        => 'required',
                'folio'         => 'required',
                'customer_name' => 'required'
            ],
            [
                'branch.required'           => 'La Sucursal es necesario',
                'folio.required'            => 'El Folio es necesario',
                'customer_name.required'    => 'El Cliente es necesario'
            ]
        );

        $quote = Quote::create(
            [
                'user_id'       => $user_id,
                'branch_id'     => $request->branch,
                'folio_id'      => $request->folio,
                'customer_name' => $request->customer_name,
                'amount'        => $amount,
                'status'        => '0',
                'created_at'    => Carbon::now(),
            ]
        );
        
        $quote_id = $quote->id;
        
        foreach(\Cart::instance('quote')->content() as $item) {
            QuoteProduct::insert([
                'quote_id'      => $quote_id,
                'product_id'    => $item->id,
                'qty'           => $item->qty,
            ]);
        }

        \Cart::instance('quote')->destroy();

        $notification = array(
            'message' => 'Orden de Compra Generada',
            'alert-type' => 'success'
        );

        return redirect()->route('quote.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function format() {
        return view('quote.format');
    }

    public function preview()
    {
        return view('quote.preview');
    }

    public function delete()
    {
        \Cart::instance('quote')->destroy();
        
        return redirect()->route('product.index')->with('deleted','yes');
    }

    public function addItemQuote($id, $name, $price)
    {
            \Cart::instance('quote')->add($id, $name, 1, $price, 500);

            $notification = array(
                'message' => 'Proucto Agregado a Cotización',
                'alert-type' => 'info'
            );

            return redirect()->route('product.index')->with($notification);        
    }

    public function editItem(Request $request,$id)
    {
        $qty = (int) $request->quantity;

        \Cart::instance('quote')->update($id, $qty);

        return redirect()->route('quote.preview');
    }

    public function removeItem($id)
    {
        \Cart::instance('quote')->remove($id);

        return redirect()->route('quote.preview');
    }

    public function getBranchFolios($branch_id) {
        $folios = Folio::where('branch_id',$branch_id)->get();
        return json_encode($folios);
    }

    public function print($id) {
        $quote = Quote::find($id);
        $customer_name = $quote->customer_name;
        $branch = Branch::find($quote->branch_id);
        $document_data = DocumentData::find(1);
        $items = QuoteProduct::where('quote_id', $id)->get();

        return view('quote.format', compact('quote', 'items', 'customer_name','branch','document_data'));
    }
}
