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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title pull-left">Data Pegawai Trust Medika</strong>
                            <div class="pull-right">
                            <a href="{{url('pegawai/create')}}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Tambah Baru
                            </a>
                        </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Tempat Praktek</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($pegawai as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            {{$item->name}}
                                        </td>
                                        <td>
                                            {{$item->gender}}
                                        </td>
                                        <td>
                                            {{$item->nip}}
                                        </td>
                                        <td>
                                            {{$item->jabatan}}
                                        </td>
                                        <td>
                                            {{$item->klinik->nama_poli}}
                                        </td>
                                        <td>
                                            {{$item->status}}
                                        </td>
                                        <td>
                                            <a href="{{url('pegawai/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{url('pegawai/'.$item->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin untuk menghapus data {{$item->name}} ?')">
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