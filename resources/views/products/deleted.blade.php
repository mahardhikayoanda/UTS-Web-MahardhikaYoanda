@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Produk Dihapus</h1>

    <a href="{{ route('products.index') }}" class="btn btn-primary mb-3">Kembali ke Daftar Produk</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Tanggal Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->nama_produk }}</td>
                    <td>{{ $product->kategori }}</td>
                    <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td>{{ $product->stok }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($product->tanggal_masuk)->format('d-m-Y') }}
                    </td>
                    <td>
                        <form action="{{ route('products.restore', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Pulihkan produk ini?')">
                                Pulihkan
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada produk yang dihapus.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $products->links() }}
    </div>
</div>
@endsection
