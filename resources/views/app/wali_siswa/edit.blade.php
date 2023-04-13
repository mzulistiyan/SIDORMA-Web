@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Basic form control</h5>
                </div>
                <form class="form theme-form" method="POST" action="{{route('wali.update', $data->id_wali)}}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input class="form-control" type="text"
                                        value="{{ $data->nama }}" name="nama">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">No. Telepon</label>
                                    <input class="form-control" type="tel"
                                        value="{{ $data->no_telp }}" name="no_telp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">NIM</label>
                                    <input class="form-control" type="text"
                                        value="{{ $data->nim }}" name="nim">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea class="form-control" name="alamat">{{ $data->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Hubungan</label>
                                    <select class="form-control" name="hubungan" value="{{ $data->hubungan }}">
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
                        <a href='{{ url('wali/index') }}' class="btn btn-pill btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection