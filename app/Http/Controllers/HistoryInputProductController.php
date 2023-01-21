<?php

namespace App\Http\Controllers;

use App\Models\HistoryInputProduct;
use App\Http\Requests\StoreHistoryInputProductRequest;
use App\Http\Requests\UpdateHistoryInputProductRequest;

class HistoryInputProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HistoryInputProduct $historyInputProduct)
    {
        return view('main.HistoryProduct.index', [
            'title' => 'History',
            'products' => $historyInputProduct->latest()->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHistoryInputProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHistoryInputProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryInputProduct  $historyInputProduct
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryInputProduct $historyInputProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryInputProduct  $historyInputProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryInputProduct $historyInputProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHistoryInputProductRequest  $request
     * @param  \App\Models\HistoryInputProduct  $historyInputProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHistoryInputProductRequest $request, HistoryInputProduct $historyInputProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryInputProduct  $historyInputProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryInputProduct $historyInputProduct, $id)
    {
        $historyInputProduct->where('id', $id)->delete();

        return redirect()->intended('/historyproduct')->with('success', 'Your history has been deleted succesfully!');
    }
}
