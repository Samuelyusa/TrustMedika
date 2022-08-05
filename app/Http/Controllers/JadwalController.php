<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pegawai;
use App\Models\Klinik;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal/index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kliniks = Klinik::all();
        $pegawai = Pegawai::all();
        return view('jadwal/create', compact('kliniks', 'pegawai'));
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
                'klinik_id' => 'required',
                'pegawai_id' => 'required',
                'senin' => '|max:12',
                'selasa' => '|max:12',
                'rabu' => '|max:12',
                'kamis' => '|max:12',
                'jumat' => '|max:12',
                'sabtu' => '|max:12',
                'minggu' => '|max:12'
            ],
            [
                'klinik_id.required' => 'Nama Klinik harus dipilih.',
                'pegawai_id.required' => 'Nama Pegawai harus dipilih.',
                'senin' => 'isi seperti (08.00-10.00)',
                'selasa' => 'isi seperti (08.00-10.00)',
                'rabu' => 'isi seperti (08.00-10.00)',
                'kamis' => 'isi seperti (08.00-10.00)',
                'jumat' => 'isi seperti (08.00-10.00)',
                'sabtu' => 'isi seperti (08.00-10.00)',
                'minggu' => 'isi seperti (08.00-10.00)'
            ]
        );

        // return $request;
        $jadwal = new Jadwal;

        $jadwal->klinik_id = $request->klinik_id;
        $jadwal->pegawai_id = $request->pegawai_id;
        $jadwal->senin = $request->senin;
        $jadwal->selasa = $request->selasa;
        $jadwal->rabu = $request->rabu;
        $jadwal->kamis = $request->kamis;
        $jadwal->jumat = $request->jumat;
        $jadwal->sabtu = $request->sabtu;
        $jadwal->minggu = $request->minggu;

        $jadwal->save();

        return redirect('jadwal')->with('status', 'Jadwal Dokter berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        $kliniks = Klinik::all();
        $pegawai = Pegawai::all();
        return view('jadwal/edit', compact('jadwal', 'kliniks', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate(
            [
                'klinik_id' => 'required',
                'pegawai_id' => 'required',
                'senin' => '|max:12',
                'selasa' => '|max:12',
                'rabu' => '|max:12',
                'kamis' => '|max:12',
                'jumat' => '|max:12',
                'sabtu' => '|max:12',
                'minggu' => '|max:12'
            ],
            [
                'klinik_id.required' => 'Nama Klinik harus dipilih.',
                'pegawai_id.required' => 'Nama Pegawai harus dipilih.',
                'senin' => 'isi seperti (08.00-10.00)',
                'selasa' => 'isi seperti (08.00-10.00)',
                'rabu' => 'isi seperti (08.00-10.00)',
                'kamis' => 'isi seperti (08.00-10.00)',
                'jumat' => 'isi seperti (08.00-10.00)',
                'sabtu' => 'isi seperti (08.00-10.00)',
                'minggu' => 'isi seperti (08.00-10.00)'
            ]
        );

        $jadwal->klinik_id = $request->klinik_id;
        $jadwal->pegawai_id = $request->pegawai_id;
        $jadwal->senin = $request->senin;
        $jadwal->selasa = $request->selasa;
        $jadwal->rabu = $request->rabu;
        $jadwal->kamis = $request->kamis;
        $jadwal->jumat = $request->jumat;
        $jadwal->sabtu = $request->sabtu;
        $jadwal->minggu = $request->minggu;

        $jadwal->save();

        return redirect('jadwal')->with('status', 'Jadwal Dokter berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect('jadwal')->with('status', 'Jadwal Dokter berhasil dihapus!');
    }
}
