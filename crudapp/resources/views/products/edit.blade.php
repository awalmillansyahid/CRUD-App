@extends('layouts.master')

@section('content')
<section>
    <div class="container">
        <h4>Edit Produk</h4>
        <form action="{{ route('product.update', $product->id) }}" method="POST" accept-charset="utf-8">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Nama Produk</label>
                <input name="name" type="text" class="form-control" id="title" 
                    aria-describedby="fet1" placeholder="Masukkan nama produk" 
                    value="{{ old('name', $product->name) }}">
                <small id="fet1" class="form-text text-muted">Masukkan nama produk yang dijual</small>
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label">Deskripsi Produk</label>
                <input name="description" type="text" class="form-control" id="desc" 
                    aria-describedby="fet2" placeholder="Masukkan deskripsi produk" 
                    value="{{ old('description', $product->description) }}">
                <small id="fet2" class="form-text text-muted">Masukkan keterangan produk yang dijual</small>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar Produk</label>
                <div class="mb-2">
                    <img src="{{ $product->image }}" alt="Gambar Produk" class="img-fluid" width="150">
                </div>
                <input name="image" type="text" class="form-control" id="image" 
                    placeholder="Masukkan URL gambar produk" 
                    value="{{ old('image', $product->image) }}">
                <small class="form-text text-muted">Masukkan URL gambar produk (contoh: https://example.com/image.jpg)</small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('home') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</section>
@endsection