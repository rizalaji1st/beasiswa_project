@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-penetapan', 'active')
@section('content')

<!doctype html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Tutorial Membuat Table Dengan Bootstrap 4 - www.malasngoding.com</title>
 
	<link rel="stylesheet" href="assets/css/bootstrap.css"> 
</head> 
<body> 
 
	<div class="container">
 
		<center>
			<h3>DAFTAR PENDAFTAR BEASISWA</h3>
		</center>
		<br/><br/>
 
		<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Daftar Beasiswa</th>
      <th scope="col">Penetapan Oleh Sistem</th>
	  <th scope="col">Penetapan Lolos</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>PPA</td>
		<td><input type='submit' class='btn btn-primary center-block' value="Unduh">
		<td><input type='submit' class='btn btn-primary center-block' value="Upload">
    </tr>
	<tr>
      <th scope="row">2</th>
      <td>Semar</td>
	  <td><input type='submit' class='btn btn-primary center-block' value="Unduh">
		<td><input type='submit' class='btn btn-primary center-block' value="Upload">
    </tr>
	<tr>
      <th scope="row">3</th>
      <td>BUMN</td>
	  <td><input type='submit' class='btn btn-primary center-block' value="Unduh">
		<td><input type='submit' class='btn btn-primary center-block' value="Upload">
    </tr>
  </tbody>
</table>
	<script src="assets/js/jquery.js"></script> 
	<script src="assets/js/popper.js"></script> 
	<script src="assets/js/bootstrap.js"></script>
</body> 
</html>

@endsection
