@extends('layouts.pendaftar')
@section('title', 'Pendaftaran Beasiswa')
@section('status-dashboard', 'active')
@section('content')
<div class="container-fluid">
    <div class="col-lg-6"></div>
    <div class="col-lg-6">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Beasiswa</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Beasiswa</h6>
            </div>
            <div class="card-body">
                <form class="user">
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                            aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                    </div>
                    <a href="index.html" class="btn btn-primary btn-user btn-block">
                        Kirim
                    </a>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection