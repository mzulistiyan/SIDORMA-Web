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
						<h5>Data Absensi</h5><span>Lorem Ipsum is simply dummy text of the printing and typesetting
								industry.
								Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
								printer took a galley of type and scrambled it to make a type specimen book.</span>
						<span></span>
						<a href="{{route('absensi.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
					</div>
					<div class="card-header">
							<div class="card-body">
									<div class="table-responsive">
											<table class="display" id="basic-1">
													<thead>
															<tr>
																	<th>ID Absensi</th>
																	<th>NIM Mahasiswa</th>
																	<th>Clock In</th>
																	<th>Clock Out</th>
																	<th>Status</th>
																	<th>Photo</th>
																	<th>Action</th>
															</tr>
													</thead>
													<tbody>
															@foreach ($absensi as $abs)
															<tr>
																	<td>{{$abs->id_absensi}}</td>
																	<td>{{$abs->nim_mahasiswa}}</td>
																	<td>{{$mhs->clock_in}}</td>
																	<td>{{$mhs->clock_out}}</td>
																	<td>{{$mhs->status}}</td>
																	<td>{{$mhs->photo}}</td>
																	<td>
																			<a href="{{route('absensi.edit', $abs->id_absensi)}}" class="btn btn-warning btn-sm">Edit</a>
																			<form action="{{route('absensi.destroy', $abs->id_absensi)}}" method="POST" class="d-inline">
																					@csrf
																					@method('delete')
																					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
</div>
@endsection