@extends('layouts.app')

@section('title', 'Data Buku')

@section('content')
    <h1>Data Buku</h1>

    <!-- Flash Message Notifikasi Success -->
    @if (session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- 1. Tombol Tambah Buku -->
    <div style="margin-bottom: 15px;">
        <a href="{{ route('books.create') }}">+ Tambah Buku</a>
    </div>

    <!-- 2. Form Pencarian (Penempatan di Sini) -->
   <form method="GET" action="{{ route('books.index') }}" style="margin-bottom: 15px;">
    <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari judul, penulis, atau ISBN">
    <button type="submit">Cari</button>
    
    @if (request('q'))
        <a href="{{ route('books.index') }}">Reset</a>
    @endif
</form>

    <!-- 3. Tabel Data Buku -->
    <table style="text-align:center;" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $books->firstItem() + $loop->index }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <!-- Link Detail -->
                        <a href="{{ route('books.show', $book) }}">Detail</a> | 

                        <!-- Link Edit -->
                        <a href="{{ route('books.edit', $book) }}">Edit</a> | 

                        <!-- Form Hapus -->
                        <form method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Hapus data buku ini?')" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Data belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- 4. Pagination Links -->
    @if ($books->hasPages())
        <br>
        <nav>
            @if ($books->onFirstPage())
                <span>Sebelumnya</span>
            @else
                <a href="{{ $books->appends(['q' => request('q')])->previousPageUrl() }}">Sebelumnya</a>
            @endif

            <span>
                Halaman {{ $books->currentPage() }} dari {{ $books->lastPage() }}
            </span>

            @if ($books->hasMorePages())
                <a href="{{ $books->appends(['q' => request('q')])->nextPageUrl() }}">Berikutnya</a>
            @endif
        </nav>
    @endif
@endsection