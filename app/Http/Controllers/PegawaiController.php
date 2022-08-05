<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Klinik;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai/index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kliniks = Klinik::all();
        return view('pegawai/create', compact('kliniks'));
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
                'name' => 'required|min:2',
                'gender' => 'required',
                'nip' => '|max:12',
                'jabatan' => 'required|min:2',
                'klinik_id' => 'required',
                'status' => 'required|min:2',
            ],
            [
                'name.required' => 'Nama harus diisi, minimal 2 huruf.',
                'gender.required' => 'Jenis kelamin harus dipilih.',
                'nip.required' => 'Jumlah minimal NIP adalah 9 dan maksimal adalah 12.',
                'jabatan.required' => 'Jabatan harus diisi, minimal 2 huruf.',
                'klinik_id.required' => 'Tempat praktek harus dipilih',
                'status.required' => 'Status harus diisi, minimal 2 huruf.'
            ]
        );

        // return $request;
        $pegawai = new Pegawai;

        $pegawai->name = $request->name;
        $pegawai->gender = $request->gender;
        $pegawai->nip = $request->nip;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->klinik_id = $request->klinik_id;
        $pegawai->status = $request->status;

        $pegawai->save();

        return redirect('pegawai')->with('status', 'Data Pegawai ' . $request->name . ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        $kliniks = Klinik::all();
        return view('pegawai/edit', compact('pegawai', 'kliniks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate(
            [
                'name' => 'required|min:2',
                'gender' => 'required',
                'nip' => '|max:12',
                'jabatan' => 'required|min:2',
                'klinik_id' => 'required',
                'status' => 'required|min:2',
            ],
            [
                'name.required' => 'Nama harus diisi, minimal 2 huruf.',
                'gender.required' => 'Jenis kelamin harus dipilih.',
                'nip.required' => 'Jumlah minimal NIP adalah 9 dan maksimal adalah 12.',
                'jabatan.required' => 'Jabatan harus diisi, minimal 2 huruf.',
                'klinik_id.required' => 'Tempat praktek harus dipilih',
                'status.required' => 'Status harus diisi, minimal 2 huruf.'
            ]
        );

        // $pegawai = new Pegawai;

        $pegawai->name = $request->name;
        $pegawai->gender = $request->gender;
        $pegawai->nip = $request->nip;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->klinik_id = $request->klinik_id;
        $pegawai->status = $request->status;

        $pegawai->save();

        return redirect('pegawai')->with('status', 'Data Pegawai ' . $request->name . ' berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect('pegawai')->with('status', 'Data Pegawai ' . $pegawai->name . ' berhasil dihapus!');
    }
}
