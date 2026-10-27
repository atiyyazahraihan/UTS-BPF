<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Keahlian;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    private function config(string $type): array
    {
        return match ($type) {
            'pengalaman' => [Pengalaman::class, [
                'posisi'     => 'required|string|max:255',
                'perusahaan' => 'required|string|max:255',
                'periode'    => 'required|string|max:100',
                'deskripsi'  => 'nullable|string',
            ]],
            'pendidikan' => [Pendidikan::class, [
                'institusi' => 'required|string|max:255',
                'jurusan'   => 'required|string|max:255',
                'periode'   => 'required|string|max:100',
            ]],
            'keahlian' => [Keahlian::class, [
                'nama' => 'required|string|max:255',
            ]],
            default => abort(404),
        };
    }

    public function store(Request $request, Biodata $biodata, string $type)
    {
        [, $rules] = $this->config($type);
        $data = $request->validate($rules);

        $biodata->{$type}()->create($data);

        return back()->with('success', ucfirst($type) . ' berhasil ditambahkan.');
    }

    public function destroy(string $type, int $id)
    {
        [$model] = $this->config($type);
        $model::findOrFail($id)->delete();

        return back()->with('success', ucfirst($type) . ' berhasil dihapus.');
    }
}
