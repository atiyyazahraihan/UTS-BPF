@extends('layouts.app')
@section('title', 'CV ' . $biodata->nama)

@section('content')
<div class="no-print mb-3 d-flex gap-2">
    <a href="{{ route('biodata.index') }}" class="btn btn-secondary">&larr; Kembali</a>
    <a href="{{ route('biodata.edit', $biodata) }}" class="btn btn-warning">Edit Biodata</a>
    <button onclick="window.print()" class="btn btn-success">Cetak / Simpan PDF</button>
</div>

{{-- ====== TEMPLATE CV ====== --}}
<div class="cv bg-white shadow-sm">
    <div class="cv-header">
        <h1>{{ strtoupper($biodata->nama) }}</h1>
        <p>{{ $biodata->jabatan }}</p>
    </div>

    <div class="row g-0">
        {{-- Kolom kiri --}}
        <div class="col-md-8 p-4">
            <h6 class="section" style="margin-top:0">Profil Singkat</h6>
            <p class="mb-0">{{ $biodata->tentang ?: '-' }}</p>

            <h6 class="section">Pengalaman Kerja</h6>
            @forelse ($biodata->pengalaman as $p)
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <strong>{{ $p->posisi }}</strong>
                        <form action="{{ route('detail.destroy', ['pengalaman', $p->id]) }}" method="POST" class="no-print"
                              onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger py-0">&times;</button>
                        </form>
                    </div>
                    <div class="text-muted small">{{ $p->perusahaan }} &bull; {{ $p->periode }}</div>
                    @if ($p->deskripsi)
                        <div class="small mt-1">{{ $p->deskripsi }}</div>
                    @endif
                </div>
            @empty
                <p class="text-muted small">Belum ada pengalaman.</p>
            @endforelse
        </div>

        {{-- Kolom kanan --}}
        <div class="col-md-4 p-4 cv-side">
            <div class="text-center mb-3">
                @if ($biodata->foto)
                    <img src="{{ asset('storage/' . $biodata->foto) }}" class="cv-photo" alt="Foto">
                @else
                    <div class="cv-photo d-flex align-items-center justify-content-center bg-secondary text-white mx-auto">No Foto</div>
                @endif
            </div>

            <h6 class="section" style="margin-top:0">Kontak</h6>
            <p class="small mb-1"><strong>Telepon</strong><br>{{ $biodata->telepon }}</p>
            <p class="small mb-1"><strong>Email</strong><br>{{ $biodata->email }}</p>
            <p class="small mb-1"><strong>Alamat</strong><br>{{ $biodata->alamat }}</p>

            <h6 class="section">Pendidikan</h6>
            @forelse ($biodata->pendidikan as $e)
                <div class="mb-2 small">
                    <div class="d-flex justify-content-between">
                        <strong>{{ $e->institusi }}</strong>
                        <form action="{{ route('detail.destroy', ['pendidikan', $e->id]) }}" method="POST" class="no-print"
                              onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger py-0">&times;</button>
                        </form>
                    </div>
                    <div>{{ $e->jurusan }}</div>
                    <div class="text-muted">{{ $e->periode }}</div>
                </div>
            @empty
                <p class="text-muted small">Belum ada pendidikan.</p>
            @endforelse

            <h6 class="section">Keahlian</h6>
            <ul class="small ps-3 mb-0">
                @forelse ($biodata->keahlian as $k)
                    <li>
                        {{ $k->nama }}
                        <form action="{{ route('detail.destroy', ['keahlian', $k->id]) }}" method="POST" class="d-inline no-print">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-link text-danger p-0 ms-1">hapus</button>
                        </form>
                    </li>
                @empty
                    <li class="text-muted list-unstyled">Belum ada keahlian.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>

{{-- ====== FORM TAMBAH DATA (tidak ikut tercetak) ====== --}}
<div class="row g-3 mt-4 no-print" style="max-width:900px;margin:0 auto">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header fw-bold">+ Tambah Pengalaman Kerja</div>
            <div class="card-body">
                <form action="{{ route('detail.store', [$biodata, 'pengalaman']) }}" method="POST" class="row g-2">
                    @csrf
                    <div class="col-md-4"><input name="posisi" class="form-control" placeholder="Posisi" required></div>
                    <div class="col-md-4"><input name="perusahaan" class="form-control" placeholder="Perusahaan" required></div>
                    <div class="col-md-4"><input name="periode" class="form-control" placeholder="2022 - 2024" required></div>
                    <div class="col-12"><textarea name="deskripsi" class="form-control" rows="2" placeholder="Deskripsi pekerjaan"></textarea></div>
                    <div class="col-12"><button class="btn btn-primary btn-sm">Tambah</button></div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header fw-bold">+ Tambah Pendidikan</div>
            <div class="card-body">
                <form action="{{ route('detail.store', [$biodata, 'pendidikan']) }}" method="POST" class="row g-2">
                    @csrf
                    <div class="col-md-4"><input name="institusi" class="form-control" placeholder="Institusi" required></div>
                    <div class="col-md-4"><input name="jurusan" class="form-control" placeholder="Jurusan" required></div>
                    <div class="col-md-4"><input name="periode" class="form-control" placeholder="2020 - 2024" required></div>
                    <div class="col-12"><button class="btn btn-primary btn-sm">Tambah</button></div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header fw-bold">+ Tambah Keahlian</div>
            <div class="card-body">
                <form action="{{ route('detail.store', [$biodata, 'keahlian']) }}" method="POST" class="row g-2">
                    @csrf
                    <div class="col-12"><input name="nama" class="form-control" placeholder="mis. Laravel" required></div>
                    <div class="col-12"><button class="btn btn-primary btn-sm">Tambah</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
