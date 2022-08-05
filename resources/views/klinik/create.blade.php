@extends('main')

@section('title', 'Data Klinik')

@section('breadcrumbs')
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Klinik</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('home')}}">Dashboard</a></li>
                            <li class="active">Data Klinik</i> </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content')
    <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title pull-left">Tambah Data Poli / Klinik</strong>
                            <div class="pull-right">
                            <a href="{{url('klinik')}}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-undo"></i> Kembali
                            </a>
                        </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                    <form action="{{url('klinik')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama Poli / Klinik</label>
                                            <input type="text" name="nama_poli" class="form-control @error ('nama_poli') is-invalid @enderror" value="{{old('nama_poli')}}" autofocus>
                                        @error('nama_poli')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Poli / Klinik</label>
                                            <input type="text" name="alamat" class="form-control @error ('alamat') is-invalid @enderror" value="{{old('alamat')}}" >
                                        @error('alamat')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Jadwal</label>
                                            <input type="text" name="jadwal" class="form-control @error ('jadwal') is-invalid @enderror" value="{{old('jadwal')}}">
                                        @error('jadwal')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Izin Praktek</label>
                                            <input type="number" name="no_izin" class="form-control @error ('no_izin') is-invalid @enderror" value="{{old('no_izin')}}">
                                        @error('no_izin')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection