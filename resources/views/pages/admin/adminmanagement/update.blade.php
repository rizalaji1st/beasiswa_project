@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-akses', 'active')
@section('content')
    <div class="container">
        <h1>Edit user {{$user->name}}</h1>
        <div class="card my-2 p-4">
            <form action="{{route('admin.users.update',$user)}}" method="POST">
                @csrf
                @method('PUT')
                @foreach ($roles as $role)
                    <div class="form-check">
                        <input type="checkbox" name="roles[]" value="{{$role->id}}">
                        <label for="roles[]">{{$role->name}}</label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
@endsection