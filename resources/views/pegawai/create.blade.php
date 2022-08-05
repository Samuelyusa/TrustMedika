@extends('main')

@section('title', 'Data Pegawai')

@section('breadcrumbs')
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Pegawai</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('home')}}">Dashboard</a></li>
                            <li class="active">Data Pegawai</i> </li>
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
                            <strong class="card-title pull-left">Tambah Data Pegawai</strong>
                            <div class="pull-right">
                            <a href="{{url('pegawai')}}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-undo"></i> Kembali
                            </a>
                        </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                    <form action="{{url('pegawai')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="name" class="form-control @error ('name') is-invalid @enderror" value="{{old('name')}}" autofocus>
                                        @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="gender" class="form-control @error ('gender') is-invalid @enderror">
                                                <option value="">Pilih jenis kelamin</option>
                                                <option value="L" class="required">Laki-Laki</option>
                                                <option value="P" class="required">Wanita</option>
                                            </select>
                                        @error('gender')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input type="number" name="nip" class="form-control @error ('nip') is-invalid @enderror" value="{{old('nip')}}">
                                        @error('nip')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control @error ('jabatan') is-invalid @enderror" value="{{old('jabatan')}}">
                                        @error('jabatan')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Praktek</label>
                                            <select name="klinik_id" class="form-control @error ('klinik_id') is-invalid @enderror">
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
                                            <label>Status</label>
                                            <input type="text" name="status" class="form-control @error ('status') is-invalid @enderror" value="{{old('status')}}">
                                        @error('status')
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