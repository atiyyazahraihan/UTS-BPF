<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    private function rules(): array
    {
        return [
            'nama'    => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'telepon' => 'required|string|max:30',
            'alamat'  => 'required|string|max:255',
            'tentang' => 'nullable|string',
            'foto'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function index()
    {
        $biodata = Biodata::latest()->get();
        return view('biodata.index', compact('biodata'));
    }

    public function create()
    {
        return view('biodata.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $biodata = Biodata::create($data);

        return redirect()->route('biodata.show', $biodata)
            ->with('success', 'Biodata berhasil ditambahkan. Silakan lengkapi pengalaman, pendidikan, dan keahlian.');
    }

    public function show(Biodata $biodata)
    {
        $biodata->load(['pengalaman', 'pendidikan', 'keahlian']);
        return view('biodata.show', compact('biodata'));
    }

    public function edit(Biodata $biodata)
    {
        return view('biodata.edit', compact('biodata'));
    }

    public function update(Request $request, Biodata $biodata)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('foto')) {
            if ($biodata->foto) {
                Storage::disk('public')->delete($biodata->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        } else {
            unset($data['foto']);
        }

        $biodata->update($data);

        return redirect()->route('biodata.show', $biodata)
            ->with('success', 'Biodata berhasil diperbarui.');
    }

    public function destroy(Biodata $biodata)
    {
        if ($biodata->foto) {
            Storage::disk('public')->delete($biodata->foto);
        }
        $biodata->delete();

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata berhasil dihapus.');
    }
}
