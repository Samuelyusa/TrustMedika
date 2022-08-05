@extends('main')

@section('title', 'Jadwal Dokter')

@section('breadcrumbs')
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Jadwal Dokter</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('home')}}">Dashboard</a></li>
                            <li class="active">Jadwal Dokter</i> </li>
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
                            <strong class="card-title pull-left">Tambah Jadwal Dokter</strong>
                            <div class="pull-right">
                            <a href="{{url('jadwal')}}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-undo"></i> Kembali
                            </a>
                        </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                    <form action="{{url('jadwal')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tempat Praktek</label>
                                            <select name="klinik_id" class="form-control @error ('klinik_id') is-invalid @enderror" autofocus>
                                                <option value="">Pilih tempat praktek</option>
                                                @foreach ($kliniks as $item)
                                                <option value="{{$item->id}}" class="required" {{ old('klinik_id') == $item->id ? 'selected' : null}}>
                                                    {{$item->nama_poli}}
                                                </option>
                                                @endforeach
                                            </select>
                                        @error('klinik_id')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Pegawai</label>
                                            <select name="pegawai_id" class="form-control @error ('pegawai_id') is-invalid @enderror">
                                                <option value="">Pilih nama pegawai</option>
                                                @foreach ($pegawai as $item)
                                                <option value="{{$item->id}}" class="required" {{ old('pegawai_id') == $item->id ? 'selected' : null}}>
                                                    {{$item->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        @error('pegawai_id')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <label>Masukkan Waktu Praktek Sesuai dengan hari</label>
                                        <div class="form-group col-auto">
                                            <label>Senin</label>
                                            <input type="text" name="senin" class="form-control @error ('senin') is-invalid @enderror" value="{{old('senin')}}">
                                        @error('senin')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group col-auto">
                                            <label>Selasa</label>
                                            <input type="text" name="selasa" class="form-control @error ('selasa') is-invalid @enderror" value="{{old('selasa')}}">
                                        @error('selasa')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group col-auto">
                                            <label>Rabu</label>
                                            <input type="text" name="rabu" class="form-control @error ('rabu') is-invalid @enderror" value="{{old('rabu')}}">
                                        @error('rabu')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group col-auto">
                                            <label>Kamis</label>
                                            <input type="text" name="kamis" class="form-control @error ('kamis') is-invalid @enderror" value="{{old('kamis')}}">
                                        @error('kamis')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group col-auto">
                                            <label>Jumat</label>
                                            <input type="text" name="jumat" class="form-control @error ('jumat') is-invalid @enderror" value="{{old('jumat')}}">
                                        @error('jumat')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group col-auto">
                                            <label>Sabtu</label>
                                            <input type="text" name="sabtu" class="form-control @error ('sabtu') is-invalid @enderror" value="{{old('sabtu')}}">
                                        @error('sabtu')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group col-sm">
                                            <label>Minggu</label>
                                            <input type="text" name="minggu" class="form-control @error ('minggu') is-invalid @enderror" value="{{old('minggu')}}">
                                        @error('minggu')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success ">Simpan</button>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection