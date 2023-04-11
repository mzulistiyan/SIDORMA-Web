@extends('layouts.master')
@section('content')

<div class="container-fluid">   
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 main-header">
                <h2>Tambah Data<span>Mahasiswa</span></h2>
                <h6 class="mb-0">admin panel</h6>
            </div>
            <div class="col-lg-6 breadcrumb-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
                    <li class="breadcrumb-item">Forms </li>
                    <li class="breadcrumb-item">Form Layout</li>
                    <li class="breadcrumb-item active">Form Wizard 3</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Basic form control</h5>
          </div>
          <form class="form theme-form" method="POST" action="{{ route('gedung.store') }}">
            @csrf
            <div class="card-body">

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Nama Gedung</label>
                    <input class="form-control" id="" type="text" placeholder="Nama Gedung" name="nama_gedung">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Nomor Gedung</label>
                    <input class="form-control" id="" type="text" placeholder="Nomor Gedung" name="nomor_gedung">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Longtitude</label>
                    <input class="form-control" id="" type="text" placeholder="Longitude" name="longitude">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Lattitude</label>
                    <input class="form-control" id="" type="text" placeholder="lattitude" name="lattitude">
                  </div>
                </div>
              </div>

              <div class="f1-buttons">
                <button class="btn btn-primary btn-submit" type="submit">Submit</button>
            </div>
              
            </div>
          </form>
        </div>
    </div>
</div>

@endsection