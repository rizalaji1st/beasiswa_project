@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-akses', 'active')
@section('content')
    <div class="container">
        <div class="mt-2">
            @if (session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
            @endif
        </div>
        <h1>Daftar User</h1>
        <table class="table table-bordered table-striped" id="user-table">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Roles</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td scope="col" class="text-center">{{$loop->iteration}}</td>
                        <td scope="col">{{$user->name}}</td>
                        <td scope="col">{{$user->email}}</td>
                        <td scope="col">{{implode(', ',$user->roless()->get()->pluck('name')->toArray())}}</td>
                        <td scope="col" class="text-center">
                            <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{route('admin.users.destroy',$user)}}" method="POST" class="d-inline">
                                @method('Delete')
                                @csrf
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#user-table').DataTable();
        } );
    </script>
@endpush