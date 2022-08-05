<?php

namespace App\Http\Controllers;

use App\Models\Klinik;
use Illuminate\Http\Request;

class KlinikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klinik = Klinik::all();
        return view('klinik/index', compact('klinik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klinik/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_poli' => 'required|min:2|max:100',
                'alamat' => 'required|min:5|max:200',
                'jadwal' => 'max:255',
                'no_izin' => 'max:20',
            ],
            [
                'nama_poli.required' => 'Nama Poli/Klinik harus diisi, minimal 2 kata.',
                'alamat.required' => 'Alamat harus diisi, minimal 5 kata.',
                'jadwal' => 'Maksimal 255 karakter',
                'no_izin' => 'Maksimal 20 angka',
            ]
        );

        $klinik = new Klinik;
        $klinik->nama_poli = $request->nama_poli;
        $klinik->alamat = $request->alamat;
        $klinik->jadwal = $request->jadwal;
        $klinik->no_izin = $request->no_izin;

        $klinik->save();
        return redirect('klinik')->with('status', 'Data Poli / Klinik ' . $request->nama_poli . ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klinik  $klinik
     * @return \Illuminate\Http\Response
     */
    public function show(Klinik $klinik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klinik  $klinik
     * @return \Illuminate\Http\Response
     */
    public function edit(Klinik $klinik)
    {
        return view('Klinik/edit', compact('klinik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Klinik  $klinik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Klinik $klinik)
    {
        $request->validate(
            [
                'nama_poli' => 'required|min:2|max:100',
                'alamat' => 'required|min:5|max:200',
                'jadwal' => 'max:255',
                'no_izin' => 'max:20',
            ],
            [
                'nama_poli.required' => 'Nama Poli/Klinik harus diisi, minimal 2 kata.',
                'alamat.required' => 'Alamat harus diisi, minimal 5 kata.',
                'jadwal' => 'Maksimal 255 karakter',
                'no_izin' => 'Maksimal 20 angka',
            ]
        );

        $klinik->nama_poli = $request->nama_poli;
        $klinik->alamat = $request->alamat;
        $klinik->jadwal = $request->jadwal;
        $klinik->no_izin = $request->no_izin;

        $klinik->save();
        return redirect('klinik')->with('status', 'Data Poli / Klinik ' . $request->nama_poli . ' berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klinik  $klinik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klinik $klinik)
    {
        $klinik->delete();

        return redirect('klinik')->with('status', 'Data Poli / Klinik ' . $klinik->nama_poli . ' berhasil dihapus!');
    }
}
