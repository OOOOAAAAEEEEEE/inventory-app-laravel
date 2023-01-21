@extends('layouts.master.master')

@section('container')

{{-- Button Group --}}
<div class="row my-3">
    <div class="col-10">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p> <i class="bi bi-check-all"></i> <strong> {{ session('success') }} </strong> </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="col-2">
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <a href="/storeproduct" class="btn btn-outline-primary"> <i class="bi bi-arrow-clockwise"></i> </i> Refresh </a>
            <a href="/storeproduct/create" class="btn btn-outline-primary"> <i class="bi bi-box-seam"></i></i> Store </a>
            <a href="/storeproduct/export" class="btn btn-outline-success"> <i class="bi bi-file-earmark-excel"></i> Export </a>
            {{-- <button type="button" class="btn btn-outline-primary">Right</button> --}}
        </div>
    </div>
</div>

{{-- End Button Group --}}

{{-- Table --}}
<table class="table table-sm table-striped table-hover">
    <thead>
        <th> # </th>
        <th> Nama </th>
        <th> Kategori </th>
        <th> Stok </th>
        <th> Tanggal Masuk </th>
        <th> Tanggal Diubah </th>
        <th> Action </th>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->barang }}</td>
            <td>{{ $product->kategori }}</td>
            <td>{{ $product->stok }}</td>
            <td>{{ $product->created_at }} | {{ $product->created_at->diffForHumans() }}</td>
            <td>{{ $product->updated_at }} | {{ $product->updated_at->diffForHumans() }} </td>
            <td>
                {{-- Going Into Edit Page --}}
                <a href="/storeproduct/{{ $product->id }}/edit" class="badge bg-warning"> <i data-feather="edit"></i> </a>
                {{-- End Going Into Edit Page --}}

                {{-- Delete Method --}}
                <form class="d-inline" action="/storeproduct/{{ $product->id }}" method="POST">
                @csrf
                @method('delete')
                    <button type="submit" onclick="return confirm('Are you sure want to delete this data')" class="badge bg-danger border-0"><i data-feather="file-minus"></i></button>
                </form>
                {{-- End Delete Method --}}

                {{-- Special Method --}}
                <form class="d-inline" action="/storeproduct_into_outproduct/{{ $product->id }}" method="POST">
                @csrf
                    <button type="submit" onclick="return confirm('Are you sure want to move this item into out product?')" class="badge bg-secondary border-0"><i data-feather="arrow-right-circle"></i></button>    
                </form>
                {{-- End Special Method --}}
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
{{-- End Table --}}

{{-- Pagination Bootstrap --}}
{{ $products->links() }}
{{-- End Pagination Bootstrap --}}

@endsection