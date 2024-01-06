@extends('admin.master')
@section('content')
    <main>
        <div class="admin-container container">
            <div class="admin-container-border admin-icon-row">
                <div class="row">
                    <a class="col-lg-3 d-block col-md-6 col-12 admin-icon-in admin-icon-c"
                       href="{{ route('admin.user.create') }}">
                        <i class="bi bi-person-fill-add admin-icon-size"></i>
                        <p>Expert/Admin Registration</p>
                    </a>
                    <a class="col-lg-3 d-block col-md-6 col-12 admin-icon-in admin-icon-c"
                       href="{{route('admin.user.category')}}">
                        <i class="bi bi-tags-fill admin-icon-size"></i>
                        <p> Category Registration</p>
                    </a>
                    <a class="col-lg-3 d-block col-md-6 col-12 admin-icon-in admin-icon-c">
                        <i class="bi bi-clipboard2-check-fill admin-icon-size"></i>
                        <p>Antiques Authentication</p>
                    </a>
                    <a class="col-lg-3 d-block col-md-6 col-12 admin-icon-in admin-icon-c">
                        <i class="bi bi-person-vcard-fill admin-icon-size"></i>
                        <p>User List</p>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
