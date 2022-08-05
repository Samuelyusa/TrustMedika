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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title pull-left">Jadwal Dokter RS Trust Medika</strong>
                            <div class="pull-right">
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="fa fa-print"></i> Cetak PDF
                            </a>
                            <a href="{{url('jadwal/create')}}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Tambah Baru
                            </a>
                        </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Klinik</th>
                                        <th scope="col">Senin</th>
                                        <th scope="col">Selasa</th>
                                        <th scope="col">Rabu</th>
                                        <th scope="col">Kamis</th>
                                        <th scope="col">Jumat</th>
                                        <th scope="col">Sabtu</th>
                                        <th scope="col">Minggu</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            {{$item->klinik->nama_poli}} ,
                                            {{$item->pegawai->name}}
                                        </td>
                                        <td>
                                            {{$item->senin}}
                                        </td>
                                        <td>
                                            {{$item->selasa}}
                                        </td>
                                        <td>
                                            {{$item->rabu}}
                                        </td>
                                        <td>
                                            {{$item->kamis}}
                                        </td>
                                        <td>
                                            {{$item->jumat}}
                                        </td>
                                        <td>
                                            {{$item->sabtu}}
                                        </td>
                                        <td>
                                            {{$item->minggu}}
                                        </td>
                                        <td>
                                            <a href="{{url('jadwal/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{url('jadwal/'.$item->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin untuk menghapus data {{$item->nama_poli}} ?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection