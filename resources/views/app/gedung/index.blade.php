@extends('layouts.master')
@section('content')
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Zero Configuration</h5><span>DataTables has most features enabled by default, so all you need to
                            do to use it with your own tables is to call the construction
                            function:<code>$().DataTable();</code>.</span><span>Searching, ordering and paging goodness will be
                            immediately added to the table, as shown in this example.</span>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>


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