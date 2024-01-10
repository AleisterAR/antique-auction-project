@extends('admin.master')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <a href="{{ route('admin.index') }}" class="admin-back-icon">
                <i class="bi bi-box-arrow-left"></i>
            </a>
            <div>
                <div>
                    <h1>Antiques List</h1>
                    <br>
                </div>
                <div>
                    <table class="table table-bordered" id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Antique Name</th>
                            <th>Creator</th>
                            <th>Year</th>
                            <th>Category</th>
                            <th>Condition</th>
                            <th>Antique's Photo</th>
                            <th>Antique's Certificate</th>
                            <th>Antique's Photo</th>
                            <th>Verification</th>
                        </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
