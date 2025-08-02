@extends('layout')
@section('title', 'Kelola Kontak | Admin')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Kelola Kontak</h2>
        <a href="{{ route('kontaks.create') }}" class="btn btn-primary">Tambah Kontak</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin-dashboard') }}" class="btn btn-outline-dark mb-3">Kembali ke Dashboard</a>
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Instagram</th>
                        <th>Facebook</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kontaks as $kontak)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kontak->email }}</td>
                        <td>{{ $kontak->phone }}</td>
                        <td>{{ $kontak->address }}</td>
                        <td>{{ $kontak->instagram }}</td>
                        <td>{{ $kontak->facebook }}</td>
                        <td>
                            <a href="{{ route('kontaks.edit', $kontak) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('kontaks.destroy', $kontak) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
