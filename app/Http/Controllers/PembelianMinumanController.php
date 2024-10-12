<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianMinuman;

class PembelianMinumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian_minuman = PembelianMinuman::all();

        return view('admin.PembelianMinuman.index')
       ->with('pembelian_minuman', $pembelian_minuman);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_orang' => 'required|bigint|integer',
            'id_minuman' => 'required|bigint|20',
            'metode_pembayaran' => 'required|varchar(255)',
            'discount' => 'required|int|integer',
        ]);

        // Save the data to the database or perform any action needed
        PembelianMinuman::create($validatedData);

        return redirect()->back()->with('success', 'PembelianMinuman created successfully!');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pembelian_minuman = PembelianMinuman::find($id);

        return $pembelian_minuman;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pembelian_minuman = PembelianMinuman::find($id);    

        return view('admin.PembelianMinuman.edit')
       ->with('PembelianMinuman', $pembelian_minuman);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $formFields = $request->validate([
                'id_orang' => 'required',
                'id_minuman' => 'required',
                'metode_pembayaran' => 'required',
                'discount' => 'required',
            ]);

            // if ($request->hasFile('gambar')) {
            //     $formFields['gambar'] = $request->file('gambar')->store('gambar_materi', 'public');
            // }

            $pembelian_minuman = PembelianMinuman::find($request->id);

            $pembelian_minuman->update($formFields);

            return redirect('/dashboard/pelatih')
            ->with('success', 'PembelianMinuman berhasil diubah!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect('/dashboard/pembelian-minuman')
            ->with('error', 'PembelianMinuman gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
