<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::all();

        return view('client.events')
       ->with('events', $events);
    }

    public function indexAdmin()
    {
        $events = Events::all();    

        return view('admin.events.index')
       ->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('create events');
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validate the input
        $validatedData = $request->validate([
            'nama_event' => 'required|string|max:255',
            'tanggal_event' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);
        if ($request->hasFile('file_foto')) {
                $validatedData['file_foto'] = $request->file('file_foto')->store('file_foto', 'public');
            }
        // Save the data to the database or perform any action needed
        Events::create($validatedData);

        return redirect('/dashboard/events')->with('success', 'Event created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $events = Events::find($id);

        return $events;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Events::find($id);    

        return view('admin.events.edit')
       ->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            // dd($request);
            $formFields = $request->validate([
                'tanggal_event' => 'required',
                'jam_mulai' => 'required',
                'jam_selesai' => 'required',
                'nama_event' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'nullable',
                'lokasi' => 'required',
            ]);

            $event = Events::find($request->id);

            if ($request->hasFile('file_foto')) {
                $formFields['file_foto'] = $request->file('file_foto')->store('file_foto', 'public');
            } else {
                $formFields['file_foto'] = $event->file_foto;
            }


            $event->update($formFields);

            return redirect('/dashboard/events')
            ->with('success', 'Event berhasil diubah!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect('/dashboard/events')
            ->with('error', 'Event gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $event = Events::find($request->id);

            $event->delete();

            return redirect('/dashboard/events')
            ->with('success', 'Event berhasil dihapus!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect('/dashboard/events')
            ->with('error', 'Event gagal dihapus!');
        }
    }
}
