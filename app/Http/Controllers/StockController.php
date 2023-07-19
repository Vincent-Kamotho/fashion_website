<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();

        return view('index')->with('stocks' , $stocks);
    }

    public function view()
    {
        $stocks = Stock::all();

        return view('pages.stock')->with('stocks' , $stocks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.viewstock');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $stock = new Stock;
        $stock->stock_type = $request->input('stock-name');
        $stock->item_name = $request->input('item');
        $stock->initial_price = $request->input('initial_price');
        $stock->current_price = $request->input('current_price');
        $stock->image = 'images/' . $imageName;
        
        $stock->save();

        return redirect()->route('stock')->with('success', "Item Successfully Added");

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
        $stock = Stock::find($id);

        return view('pages.editstock')->with('stock' , $stock);
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
        $stock = Stock::find($id);
        $stock->stock_type = $request->input('stock-name');
        $stock->item_name = $request->input('item');
        $stock->initial_price = $request->input('initial_price');
        $stock->current_price = $request->input('current_price');

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $stock->image = 'images/' . $imageName;

        $stock->save();
        
        return redirect()->route('stock')->with('success', "Item Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);

        $stock->delete();

        return redirect()->route('stock')->with('success', "Item Successfully Deleted");
    }
}
