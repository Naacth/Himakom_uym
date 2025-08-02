@extends('layout')
@section('title', 'Edit Galeri | Admin')
@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-3">Edit Galeri</h2>
    <a href="{{ route('admin-dashboard') }}" class="btn btn-outline-dark mb-3">Kembali ke Dashboard</a>
    <form action="{{ route('galeris.update', $galeri) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $galeri->title }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="image" class="form-control">
            @if($galeri->image)
                <img src="{{ asset('storage/'.$galeri->image) }}" width="100" class="mt-2 rounded shadow">
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ $galeri->description }}</textarea>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('galeris.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
