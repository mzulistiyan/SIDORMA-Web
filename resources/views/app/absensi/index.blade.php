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
					<h5>Data Absensi</h5>
					<span>
						Data Absensi adalah data yang berisi tentang absensi mahasiswa yang sudah melakukan absensi.
						Isi data absensi ini adalah log dari check in dan check out mahasiswa.
					</span>
					<span></span>
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
										<!-- <th>Photo</th> -->
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
										<!-- <td>{{$mhs->photo}}</td> -->
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