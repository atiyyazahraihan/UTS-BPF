<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $biodata->nama ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Jabatan / Profesi</label>
        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $biodata->jabatan ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $biodata->email ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $biodata->telepon ?? '') }}" required>
    </div>
    <div class="col-12">
        <label class="form-label">Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $biodata->alamat ?? '') }}" required>
    </div>
    <div class="col-12">
        <label class="form-label">Profil Singkat</label>
        <textarea name="tentang" rows="4" class="form-control">{{ old('tentang', $biodata->tentang ?? '') }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label">Foto Profil (JPG/PNG, maks 2MB)</label>
        @if (!empty($biodata->foto))
            <div class="mb-2">
                <img src="{{ asset('storage/' . $biodata->foto) }}" style="width:100px;height:125px;object-fit:cover" class="rounded border">
            </div>
        @endif
        <input type="file" name="foto" class="form-control" accept="image/png,image/jpeg">
    </div>
</div>
