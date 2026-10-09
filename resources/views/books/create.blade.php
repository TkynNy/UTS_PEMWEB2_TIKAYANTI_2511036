@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <h1>Tambah Buku</h1>

    {{-- Menampilkan ringkasan error jika ada validasi yang gagal --}}
    @if ($errors->any())
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">
            <strong>Gagal menyimpan data:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('books.store') }}">
        @csrf

        {{-- Memanggil seluruh input dari partial form --}}
        @include('books._form')
    </form>
@endsection

