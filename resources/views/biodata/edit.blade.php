@extends('layouts.app')
@section('title', 'Edit Biodata')

@section('content')
<div class="card shadow-sm">
    <div class="card-header fw-bold">Edit Biodata</div>
    <div class="card-body">
        <form action="{{ route('biodata.update', $biodata) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('biodata._form')
            <div class="mt-4">
                <button class="btn btn-primary">Perbarui</button>
                <a href="{{ route('biodata.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
