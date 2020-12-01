@extends('layouts.stisla')
@section('title', 'Penawaran Beasiswa')
@section('content')
<div class="section-header">
    <h1>Advanced Forms</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Forms</a></div>
        <div class="breadcrumb-item">Advanced Forms</div>
    </div>
</div>
<div class="section-body">
    <h2 class="section-title">Advanced Forms</h2>
    <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Input Text</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">Default</div>
                    <div class="form-group">
                        <label>Default Select</label>
                        <select class="form-control">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection