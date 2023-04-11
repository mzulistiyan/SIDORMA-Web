@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Basic form control</h5>
                </div>
                <form class="form theme-form" method="POST" action="{{route('wali.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input class="form-control" id="" type="text"
                                        placeholder="Nama" name="nama">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">No. Telepon</label>
                                    <input class="form-control" id="" type="tel"
                                        placeholder="No. Telepon" name="no_telp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">NIM</label>
                                    <input class="form-control" id="" type="text"
                                        placeholder="NIM" name="nim">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea class="form-control" placeholder="Alamat" name="alamat"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Hubungan</label>
                                    <select class="form-control" id="" name="hubungan">
                                        <option>Ayah</option>
                                        <option>Ibu</option>
                                        <option>Saudara Kandung</option>
                                        <option>Lainnya</option>
                                    </select>
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
</div>
@endsection