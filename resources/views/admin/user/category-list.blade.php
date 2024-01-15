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
                        <h1>Categories List</h1>
                        <br>
                    </div>
                    <div class="table-responsive card-body">
                        <table class="table table-bordered" id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <form action="">
                                                <button class="btn btn-theme"
                                                        type="submit">Delete</button>
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
    </main>
@endsection

