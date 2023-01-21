<?php

namespace App\Http\Controllers;

use App\Models\InputProduct;
use App\Http\Requests\StoreInputProductRequest;
use App\Http\Requests\UpdateInputProductRequest;

class InputProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InputProduct $inputProduct)
    {
        return view('main.InProduct.index', [
            'title' => 'In Product',
            'products' => $inputProduct->latest()->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.InProduct.create', [
            'title' => 'Store your product',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInputProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInputProductRequest $request)
    {
        $validatedData = $request->validate([
            'barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required|numeric',
            'tanggal_masuk' => 'required',
        ]);

        InputProduct::create($validatedData);

        return redirect()->intended('/storeproduct')->with('success', "Your Product Has Been Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InputProduct  $inputProduct
     * @return \Illuminate\Http\Response
     */
    public function show(InputProduct $inputProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InputProduct  $inputProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(InputProduct $inputProduct, $id)
    {

        $products = $inputProduct->where('id', $id)->get();

        return view('main.InProduct.edit', [
            'title' => 'Is There Something Wrong In Your Product?',
            'products' => $products[0],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInputProductRequest  $request
     * @param  \App\Models\InputProduct  $inputProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInputProductRequest $request, InputProduct $inputProduct, $id)
    {
        $validatedData = $request->validate([
            'barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required|numeric',
            'tanggal' => 'required',
        ]);

        $inputProduct->where('id', $id)->update($validatedData);

        return redirect()->intended('/storeproduct')->with('success', 'Your Data Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InputProduct  $inputProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(InputProduct $inputProduct, $id)
    {
        $inputProduct->where('id', $id)->delete();
        return redirect()->intended('/storeproduct')->with('success', 'Your Product Has Been Delete Successfully');
    }

    public function moving(InputProduct $inputProduct, $id)
    {
        $inputProduct->query()
            ->where('id', $id)
            ->each(function ($oldPost) {
                $newPost = $oldPost->replicate();
                $newPost->setTable('out_products');
                $newPost->save();
            });

        $inputProduct->query()
            ->where('id', $id)
            ->each(function ($oldPost) {
                $newPost = $oldPost->replicate();
                $newPost->setTable('history_input_products');
                $newPost->save();
            });



        return redirect()->intended('/outproduct')->with('success', 'Your item has been move successfully!');
    }
}
