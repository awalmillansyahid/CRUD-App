@extends('layouts.master')

@section('content')
<section class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Produk</h2>
        <a href="{{ route('product.add') }}" class="btn btn-primary">
            + Tambah Produk
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <caption>Daftar Produk</caption>
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi Produk</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $key => $item) {{-- Ganti $product dengan $products --}}
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td> {{-- Sesuaikan dengan kolom database --}}
                        <td>{{ $item->description }}</td> {{-- Sesuaikan dengan kolom database --}}
                        <td>
                            <img src="{{$item->image}}" class="img-responsive" width="100" height="100"/>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('product.delete', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Data kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@stop
