@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Basic HTML input control</h5>
    </div>
    <form class="form theme-form" method="POST" action="{{route('gedung.update',$gedung->id)}}">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$mahasiswa->name}}" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Fakultas</label>
                        <div class="col-sm-9">
                            <select class="form-control btn-pill digits" id="fakultas" name="fakultas">
                                <option value="" disabled selected> -- Pilih Fakultas -- </option>
                                <option value="Informatika" {{($mahasiswa->fakultas ==='Informatika') ? 'selected' : '' }}>Informatika</option>
                                <option value="Management" {{($mahasiswa->fakultas ==='Management') ? 'selected' : '' }}>Management</option>
                                <option value="Kedokteran" {{($mahasiswa->fakultas ==='Kedokteran') ? 'selected' : '' }}>Kedokteran</option>
                                <option value="Hukum" {{($mahasiswa->fakultas ==='Hukum') ? 'selected' : '' }}>Hukum</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Prodi</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$mahasiswa->prodi}}" name="prodi">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$mahasiswa->alamat}}" name="alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$mahasiswa->no_hp}}" name="no_hp">
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