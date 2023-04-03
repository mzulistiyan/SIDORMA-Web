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
                    <h5>Data Gedung Asrama</h5><span>Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book.</span>
                    <span></span>
                    <a href="{{route('gedung.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
                <div class="card-header">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>ID Gedung</th>
                                        <th>Nama Gedung</th>
                                        <th>Nomor Gedung</th>
                                        <th>Longtitude</th>
                                        <th>Lattitude</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gedung as $gd)
                                    <tr>
                                        <td>{{$gd->id_gedung}}</td>
                                        <td>{{$gd->nama_gedung}}</td>
                                        <td>{{$gd->nomor_gedung}}</td>
                                        <td>{{$gd->longitude}}</td>
                                        <td>{{$gd->lattitude}}</td>
                                        {{-- <td>
                                            <a href="{{route('mahasiswa.edit', $gd->nim)}}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{route('mahasiswa.destroy', $gd->nim)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




@endsection
