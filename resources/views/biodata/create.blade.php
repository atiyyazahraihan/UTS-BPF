@extends('layouts.app')
@section('title', 'Tambah Biodata')

@section('content')
<div class="card shadow-sm">
    <div class="card-header fw-bold">Tambah Biodata</div>
    <div class="card-body">
        <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('biodata._form')
            <div class="mt-4">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('biodata.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
