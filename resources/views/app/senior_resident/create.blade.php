@extends('layouts.master')
@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 breadcrumb-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
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
                        <h5>Create Data Senior Resident</h5>
                    </div>
                    <form class="form theme-form" method="POST" action="{{ route('sr.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">NIM</label>
                                        <input class="form-control" id="" type="text" placeholder="NIM" name="nim">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input class="form-control" id="" type="text" placeholder="Nama" name="nama">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Fakultas</label>
                                        <input class="form-control" id="" type="text" placeholder="Fakultas"
                                            name="fakultas">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">

                                    <div class="form-group">
                                        <label for="">Prodi</label>
                                        <input class="form-control" id="" type="text" placeholder="Prodi" name="prodi">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Nomor Telepon</label>
                                        <input class="form-control" id="" type="text" placeholder="Nomor Telepon"
                                            name="no_telp">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input class="form-control" id="" type="text" placeholder="Alamat"
                                            name="alamat">
                                    </div>
                                </div>
                            </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">ID Gedung</label>
                                    <input class="form-control" id="" type="text" placeholder="ID Gedung"
                                        name="id_gedung">
                                </div>
                            </div>
                        </div>
                
                <div class="card-footer">
                    <button class="btn btn-pill btn-primary" type="submit">Submit</button>
                    <input class="btn btn-pill btn-light" type="reset" value="Cancel">
                </div>
                </form>
            </div>
        </div>
    </div>
    @endsection