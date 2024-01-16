@extends('admin.master')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <a href="{{ route('admin.index') }}" class="admin-back-icon">
                <i class="bi bi-box-arrow-left"></i>
            </a>
            <div class="container-fluid px-4">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Admin & Expert List</h1>
                        <br>
                    </div>
                    <div class="table-responsive card-body">
                        <table class="table table-bordered" id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->user_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->roles->pluck('name')->implode(',') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


