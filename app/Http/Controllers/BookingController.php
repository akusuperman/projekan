<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Lapangan;
use App\Models\User;
use DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
    //     $bookings = DB::table('users')
    // ->join('booking', 'booking.id_orang', '=', 'users.id')
    // ->join('lapangan', 'lapangan.id', '=', 'booking.id_lapangan')
    // ->select('booking.*', 'users.name as user_nama', 'lapangan.nama as lapangan_nama')
    // ->get();    

        return view('client.booking');
        // ->with('bookings', $bookings);
    }

    public function indexAdmin()
    {
        $bookings = DB::table('users')
        ->join('booking', 'booking.id_orang', '=', 'users.id')
        ->join('lapangan', 'lapangan.id', '=', 'booking.id_lapangan')
        ->select('booking.*', 'users.name as user_nama', 'lapangan.nama as lapangan_nama')
        ->get();
    
            return view('admin.booking.index')
           ->with('bookings', $bookings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lapangan_array = Lapangan::all();
        $users = User::all();
        return view('admin.booking.create')->with([
            'lapangan_array' => $lapangan_array,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_booking' => 'required',
    'jam_masuk' => 'required', // HH:mm format
    'jam_keluar' => 'required',
    'id_orang' => 'required',
    'id_lapangan' => 'required',
        ]);

        Booking::create($validatedData);

        return redirect('/dashboard/booking')->with('success', 'Boooking created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::find($id);

        return $booking;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking = Booking::find($id);    

        return view('admin.booking.edit')
       ->with('booking', $booking);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $formFields = $request->validate([
                'id' => 'required',
                'tanggal_booking' => 'required',
                'jam_masuk' => 'required',
                'jam_keluar' => 'present|nullable',
                'id_orang' => 'required',
                'id_lapangan' => 'required',
            ]);

            // if ($request->hasFile('gambar')) {
            //     $formFields['gambar'] = $request->file('gambar')->store('gambar_materi', 'public');
            // }

            $booking = Booking::find($request->id);

            $booking->update($formFields);

            return redirect('/dashboard/booking')
            ->with('success', 'Booking berhasil diubah!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect('/dashboard/booking')
            ->with('error', 'booking gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $booking = Booking::find($request->id);

            $booking->delete();

            return redirect('/dashboard/booking')
            ->with('success', 'Booking berhasil dihapus!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect('/dashboard/booking')
            ->with('error', 'Booking gagal dihapus!');
        }
    }
}

