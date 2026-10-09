{{-- Judul Buku --}}
<div style="margin-bottom: 15px;">
    <label for="title">Judul Buku <span style="color: red;">*</span></label><br>
    <input
        type="text"
        id="title"
        name="title"
        value="{{ old('title', $book->title ?? '') }}"
    >
    @error('title')
        <br><small style="color: red;">{{ $message }}</small>
    @enderror
</div>

{{-- Penulis --}}
<div style="margin-bottom: 15px;">
    <label for="author">Penulis <span style="color: red;">*</span></label><br>
    <input
        type="text"
        id="author"
        name="author"
        value="{{ old('author', $book->author ?? '') }}"
    >
    @error('author')
        <br><small style="color: red;">{{ $message }}</small>
    @enderror
</div>

{{-- ISBN --}}
<div style="margin-bottom: 15px;">
    <label for="isbn">ISBN</label><br>
    <input
        type="text"
        id="isbn"
        name="isbn"
        value="{{ old('isbn', $book->isbn ?? '') }}"
    >
    @error('isbn')
        <br><small style="color: red;">{{ $message }}</small>
    @enderror
</div>

{{-- Penerbit --}}
<div style="margin-bottom: 15px;">
    <label for="publisher">Penerbit</label><br>
    <input
        type="text"
        id="publisher"
        name="publisher"
        value="{{ old('publisher', $book->publisher ?? '') }}"
    >
    @error('publisher')
        <br><small style="color: red;">{{ $message }}</small>
    @enderror
</div>

{{-- Tahun Terbit --}}
<div style="margin-bottom: 15px;">
    <label for="published_year">Tahun Terbit</label><br>
    <input
        type="number"
        id="published_year"
        name="published_year"
        value="{{ old('published_year', $book->published_year ?? '') }}"
    >
    @error('published_year')
        <br><small style="color: red;">{{ $message }}</small>
    @enderror
</div>

{{-- Harga --}}
<div style="margin-bottom: 15px;">
    <label for="price">Harga (Rp) <span style="color: red;">*</span></label><br>
    <input
        type="number"
        id="price"
        name="price"
        step="0.01"
        value="{{ old('price', $book->price ?? 0) }}"
    >
    @error('price')
        <br><small style="color: red;">{{ $message }}</small>
    @enderror
</div>

{{-- Stok --}}
<div style="margin-bottom: 15px;">
    <label for="stock">Stok <span style="color: red;">*</span></label><br>
    <input
        type="number"
        id="stock"
        name="stock"
        value="{{ old('stock', $book->stock ?? 0) }}"
    >
    @error('stock')
        <br><small style="color: red;">{{ $message }}</small>
    @enderror
</div>

{{-- Deskripsi --}}
<div style="margin-bottom: 15px;">
    <label for="description">Deskripsi</label><br>
    <textarea
        id="description"
        name="description"
        rows="4"
    >{{ old('description', $book->description ?? '') }}</textarea>
    @error('description')
        <br><small style="color: red;">{{ $message }}</small>
    @enderror
</div>

<br>
<button type="submit">Simpan</button>
<a href="{{ route('books.index') }}">Batal</a>