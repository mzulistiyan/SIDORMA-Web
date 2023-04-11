@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Basic HTML input control</h5>
    </div>
    <form class="form theme-form" method="POST" action="{{route('gedung.update',$gedung->id_gedung)}}">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Gedung</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$gedung->nama_gedung}}" name="nama_gedung">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Gedung</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$gedung->nomor_gedung}}" name="nomor_gedung">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Longtitude</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$gedung->longitude}}" name="longitude">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">lattitude</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$gedung->lattitude}}" name="lattitude">
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