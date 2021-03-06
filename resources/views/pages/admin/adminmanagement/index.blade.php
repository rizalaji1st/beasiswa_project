@extends('layouts.adminuniv')
@section('title', 'Admin Universitas')
@section('status-akses', 'active')
@section('content')
<div class="container">
    @include('includes.flashmessage')
    <div class="section-header">
        <h1>Daftar User</h1>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="user-table">
                    <thead>
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
                                @can('edit-users')
                                <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                @endcan
                                @can('delete-users')
                                <form action="{{route('admin.users.destroy',$user)}}" method="POST" class="d-inline">
                                    @method('Delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script>
    $(document).ready(function() {
        $('#user-table').DataTable();
    });
</script>
@endpush