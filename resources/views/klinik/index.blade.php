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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title pull-left">Data Poli / Klinik Trust Medika</strong>
                            <div class="pull-right">
                            <a href="{{url('klinik/create')}}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Tambah Baru
                            </a>
                        </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Klinik</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Hari Praktek</th>
                                        <th scope="col">No Izin Praktek</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($klinik as $item)
                                    <tr ">
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            {{$item->nama_poli}}
                                        </td>
                                        <td>
                                            {{$item->alamat}}
                                        </td>
                                        <td>
                                            {{$item->jadwal}}
                                        </td>
                                        <td>
                                            {{$item->no_izin}}
                                        </td>
                                        <td>
                                            <a href="{{url('klinik/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{url('klinik/'.$item->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin untuk menghapus data {{$item->nama_poli}} ?')">
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