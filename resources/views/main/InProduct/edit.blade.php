@extends('layouts.master.master')

@section('container')

<div class="row">
    <div class="col">

    </div>
    <div class="col">
        <div class="card shadow my-3" style="width: 30rem">
            <div class="card-header">
                <div class="card-title text-center">
                    <i class="bi bi-box2-fill"></i> Edit Your Product 
                </div>
            </div>
            <div class="card-body shadow">
                <form action="/storeproduct/{{ $products->id }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="barang" class="form-label"> Name Of Your Product</label>
                        <input type="text" name="barang" class="form-control @error('barang')
                            is-invalid
                        @enderror" id="barang" placeholder="Product" value="{{ $products->barang }}" autofocus>
                        @error('barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label"> What kind of thing your product is </label>
                        <input type="text" name="kategori" class="form-control @error('kategori')
                            is-invalid
                        @enderror" id="kategori" placeholder="Category" value="{{ $products->kategori }}">
                        @error('kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label"> How much you have a product in your warehouse </label>
                        <input type="number" name="stok" class="form-control @error('stok')
                            is-invalid
                        @enderror" id="stok" placeholder="Product Stock Available" value="{{ $products->stok }}">
                    </div>
                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <div class="d-grid gap-2">
                        <button type="submit" name="submit" class="btn btn-primary d-block"> <i class="bi bi-database-add"></i> Update your product  </button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
    <div class="col">
        
    </div>
</div>
    
@endsection
