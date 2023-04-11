@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Basic HTML input control</h5>
    </div>
    <form class="form theme-form" method="POST" action="{{route('sr.update',$senior_resident->nim)}}">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NIM Senior Resident</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$senior_resident->nim}}" name="nim">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Senior Resident</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$senior_resident->name}}" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fakultas</label>
                        <div class="col-sm-9">
                            <select class="form-control btn-pill digits" id="fakultas" name="fakultas">
                                <option value="" disabled selected> -- Pilih Fakultas -- </option>
                                <option value="Informatika" {{($senior_resident->fakultas ==='Informatika') ? 'selected' : '' }}>Informatika</option>
                                <option value="Management" {{($senior_resident->fakultas ==='Management') ? 'selected' : '' }}>Management</option>
                                <option value="Kedokteran" {{($senior_resident->fakultas ==='Kedokteran') ? 'selected' : '' }}>Kedokteran</option>
                                <option value="Hukum" {{($senior_resident->fakultas ==='Hukum') ? 'selected' : '' }}>Hukum</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Prodi</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$senior_resident->prodi}}" name="prodi">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$senior_resident->alamat}}" name="alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$senior_resident->no_telp}}" name="no_telp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">ID Gedung</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$senior_resident->id_gedung}}" name="id_gedung">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-sm-9 offset-sm-3">
                <button class="btn btn-pill btn-primary" type="submit">Submit</button>
                <input class="btn btn-pill btn-light" type="reset" value="Cancel">
            </div>
        </div>
    </form>
</div>
@endsection