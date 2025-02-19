@extends('layouts.master')

@section('content')
<section class="container mt-4">
    <div class="card shadow-sm p-4">
        <h4 class="mb-4">Tambah Produk</h4>
        <form action="{{ route('product.save') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Masukkan nama produk" value="{{ old('name') }}">
                <small class="form-text text-muted">Masukkan nama produk yang dijual</small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Produk</label>
                <textarea name="description" class="form-control" id="description" placeholder="Masukkan deskripsi produk">{{ old('description') }}</textarea>
                <small class="form-text text-muted">Masukkan keterangan produk yang dijual</small>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">URL Gambar Produk</label>
                <input type="url" class="form-control" id="image" name="image" placeholder="Masukkan URL gambar produk" value="{{ old('image') }}">
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
