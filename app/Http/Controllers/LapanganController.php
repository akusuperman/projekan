<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $lapangan_array = Lapangan::all();

       return view('admin.lapangan.index')
       ->with('lapangan_array', $lapangan_array);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.lapangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validate the input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Save the data to the database or perform any action needed
        Lapangan::create($validatedData);

        return redirect()->back()->with('success', 'Lapangan created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lapangan = Lapangan::find($id);

        return $lapangan;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lapangan = Lapangan::find($id);    

        return view('admin.lapangan.edit')
       ->with('lapangan', $lapangan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $formFields = $request->validate([
                'nama' => 'required',
            ]);

            // if ($request->hasFile('gambar')) {
            //     $formFields['gambar'] = $request->file('gambar')->store('gambar_materi', 'public');
            // }

            $lapangan = Lapangan::find($request->id);

            if ($request->hasFile('file_foto')) {
                $formFields['file_foto'] = $request->file('file_foto')->store('file_foto', 'public');
            } else {
                $formFields['file_foto'] = $lapangan->file_foto;
            }

            $lapangan->update($formFields);

            return redirect('/dashboard/lapangan')
            ->with('success', 'Lapangan berhasil diubah!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect('/dashboard/lapangan')
            ->with('error', 'Lapangan gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $lapangan = Lapangan::find($request->id);

            $lapangan->delete();

            return redirect('/dashboard/lapangan')
            ->with('success', 'Lapangan berhasil dihapus!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect('/dashboard/lapangan')
            ->with('error', 'Lapangan gagal dihapus!');
        }
    }
}
