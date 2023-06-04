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
                    <h5>Data Wali Siswa</h5>
                    <br>
                    <a href="{{route('wali.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Telp</th>
                                    <th>NIM</th>
                                    <th>Alamat</th>
                                    <th>Hubungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wali as $wali)
                                <tr>
                                    <td>{{$wali->id_wali}}</td>
                                    <td>{{$wali->nama}}</td>
                                    <td>{{$wali->no_telp}}</td>
                                    <td>{{$wali->nim}}</td>
                                    <td>{{$wali->alamat}}</td>
                                    <td>{{$wali->hubungan}}</td>
                                    <td>
                                        <a href='{{ url('wali/edit/'.$wali->id_wali) }}' class="btn btn-warning btn-sm">Edit</a>
                                        <form onsubmit="return confirm('Yakin ingin hapus data?')" class="d-inline" action="{{route('wali.destroy', $wali->id_wali)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
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