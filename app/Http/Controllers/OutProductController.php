<?php

namespace App\Http\Controllers;

use App\Models\OutProduct;
use App\Http\Requests\StoreOutProductRequest;
use App\Http\Requests\UpdateOutProductRequest;

class OutProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.OutProduct.index', [
            'title' => 'This Is Your Tab Out Product',
            'products' => OutProduct::latest()->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.OutProduct.create', [
            'title' => '',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOutProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOutProductRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OutProduct  $outProduct
     * @return \Illuminate\Http\Response
     */
    public function show(OutProduct $outProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OutProduct  $outProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(OutProduct $outProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOutProductRequest  $request
     * @param  \App\Models\OutProduct  $outProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutProductRequest $request, OutProduct $outProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OutProduct  $outProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(OutProduct $outProduct, $id)
    {
        $outProduct->where('id', $id)->delete();

        return redirect()->intended('/outproduct')->with('success', 'Your item has been deleted successfully!');
    }
}
