@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 main-header">
                <h2>Basic <span>DataTables </span></h2>
                <h6 class="mb-0">admin panel</h6>
            </div>
            <div class="col-lg-6 breadcrumb-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item">Data Tables</li>
                    <li class="breadcrumb-item active">Basic Init</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Zero Configuration</h5><span>DataTables has most features enabled by default, so all you need to
                        do to use it with your own tables is to call the construction
                        function:<code>$().DataTable();</code>.</span><span>Searching, ordering and paging goodness will
                        be
                        immediately added to the table, as shown in this example.</span>
                        <a href="{{route('sr.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>NIM SR</th>
                                    <th>Nama SR</th>
                                    <th>Fakultas</th>
                                    <th>Prodi</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>ID Gedung</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sr as $senior)
                                <tr>
                                    <td>{{$senior->nim}}</td>
                                    <td>{{$senior->nama}}</td>
                                    <td>{{$senior->fakultas}}</td>
                                    <td>{{$senior->prodi}}</td>
                                    <td>{{$senior->no_telp}}</td>
                                    <td>{{$senior->alamat}}</td>
                                    <td>{{$senior->id_gedung}}</td>
                                    <td>
                                        <a href="{{route('sr.edit', $senior->nim)}}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{route('sr.destroy', $senior->nim)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection