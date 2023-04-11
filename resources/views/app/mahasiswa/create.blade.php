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
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Data Mahasiswa</h5>
                </div>
                <div class="card-body">
                    <form class="f1" method="POST" action="{{ route('mahasiswa.store') }}">
                        @csrf
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3"></div>
                            </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                <p>Registration</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                                <p>Bio Data</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-home"></i></div>
                                <p>Gedung</p>
                            </div>
                        </div>
                        <fieldset>
                            <div class="form-group">
                                <label for="f1-first-name">Nama Mahasiswa</label>
                                <input class="form-control" id="Nama Mahasiswa" type="text" name="name" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label for="f1-first-name">Email</label>
                                <input class="form-control" id="email" type="text" name="email" placeholder="name@example.com">
                            </div>
                            <div class="form-group">
                                <label for="f1-first-name">NIM</label>
                                <input class="form-control" id="nim" type="text" name="nim" placeholder="">
                            </div>

                            <div class=" f1-buttons">
                                <button class="btn btn-primary btn-next" type="button">Next</button>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label for="f1-first-name">Fakultas</label>
                                <select class="form-control btn-pill digits" id="fakultas" name="fakultas">
                                    <option value="" disabled selected> -- Pilih Fakultas -- </option>
                                    <option value="Informatika">Informatika</option>
                                    <option value="Management">Management</option>
                                    <option value="Kedokteran">Kedokteran</option>
                                    <option value="Hukum">Hukum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="f1-first-name">Prodi</label>
                                <input class="form-control" id="Prodi" type="text" name="prodi" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label for="f1-first-name">Alamat</label>
                                <input class="form-control" id="alamat" type="text" name="alamat" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label for="f1-first-name">Nomor Telepon</label>
                                <input class="form-control" id="alamat" type="text" name="no_telp" placeholder="" required="">
                            </div>
                            <div class="f1-buttons">
                                <button class="btn btn-primary btn-previous" type="button">Previous</button>
                                <button class="btn btn-primary btn-next" type="button">Next</button>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label for="exampleFormControlSelect7">Nomor Gedung</label>
                                <select class="form-control btn-pill digits" id="id_gedung" name="id_gedung">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div class="f1-buttons">
                                <button class="btn btn-primary btn-previous" type="button">Previous</button>
                                <button class="btn btn-primary btn-submit" type="submit">Submit</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection