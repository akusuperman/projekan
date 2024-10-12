<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minuman;

class MinumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $minumans = Minuman::all();

        return view('client.minuman')
       ->with('minumans', $minumans);
    }

    public function indexAdmin()
    {
        $minumans = Minuman::all();

        return view('admin.minuman.index')
       ->with('minumans', $minumans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.minuman.create');
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
            'merk' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
        ]);

        // Save the data to the database or perform any action needed
        Minuman::create($validatedData);

        return redirect('/dashboard/minuman')->with('success', 'Event created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $minuman = Minuman::find($id);

        return $minuman;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $minuman = Minuman::find($id);    

        return view('admin.minuman.edit')
       ->with('minuman', $minuman);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $formFields = $request->validate([
                // 'id' => 'nullable',
                'nama' => 'required',
                'merk' => 'required',
                'harga' => 'required',
            ]);

            // if ($request->hasFile('gambar')) {
            //     $formFields['gambar'] = $request->file('gambar')->store('gambar_materi', 'public');
            // }

            $minuman = Minuman::find($request->id);

            $minuman->update($formFields);

            return redirect('/dashboard/minuman')
            ->with('success', 'Minuman berhasil diubah!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect('/dashboard/minuman')
            ->with('error', 'Minuman gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $minuman = Minuman::find($request->id);

            $minuman->delete();

            return redirect('/dashboard/minuman')
            ->with('success', 'Minuman berhasil dihapus!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect('/dashboard/minuman')
            ->with('error', 'Minuman gagal dihapus!');
        }
    }
}
