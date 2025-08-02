<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DivisiMember;
use App\Models\Divisi;

class DivisiMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $divisi_id = $request->get('divisi_id');
        return view('admin.divisi-members.create', compact('divisi_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'divisi_id' => 'required|exists:divisis,id',
            'name' => 'required',
            'position' => 'required',
            'batch' => 'nullable|string|max:50',
            'photo' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('divisi-members', 'public');
        }
        DivisiMember::create($validated);
        return redirect()->route('divisis.edit', $validated['divisi_id'])->with('success', 'Anggota divisi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DivisiMember $divisiMember)
    {
        return view('admin.divisi-members.edit', compact('divisiMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DivisiMember $divisiMember)
    {
        $validated = $request->validate([
            'divisi_id' => 'required|exists:divisis,id',
            'name' => 'required',
            'position' => 'required',
            'batch' => 'nullable|string|max:50',
            'photo' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('divisi-members', 'public');
        }
        $divisiMember->update($validated);
        return redirect()->route('divisis.edit', $validated['divisi_id'])->with('success', 'Anggota divisi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DivisiMember $divisiMember)
    {
        $divisi_id = $divisiMember->divisi_id;
        $divisiMember->delete();
        return redirect()->route('divisis.edit', $divisi_id)->with('success', 'Anggota divisi berhasil dihapus!');
    }
}
