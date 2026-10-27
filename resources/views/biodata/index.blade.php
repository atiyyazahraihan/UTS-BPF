@extends('layouts.app')
@section('title', 'Daftar Biodata')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Daftar Biodata</h4>
    <a href="{{ route('biodata.create') }}" class="btn btn-primary">+ Tambah Biodata</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($biodata as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($b->foto)
                                <img src="{{ asset('storage/' . $b->foto) }}" class="thumb" alt="foto">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $b->nama }}</td>
                        <td>{{ $b->jabatan }}</td>
                        <td>{{ $b->email }}</td>
                        <td>{{ $b->telepon }}</td>
                        <td class="text-end">
                            <a href="{{ route('biodata.show', $b) }}" class="btn btn-sm btn-info text-white">Lihat CV</a>
                            <a href="{{ route('biodata.edit', $b) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('biodata.destroy', $b) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus biodata ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
