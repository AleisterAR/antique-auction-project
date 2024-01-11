@extends('admin.master')
@section('content')
    <main>
        <div class="admin-container container">
            <a href="{{ route('admin.index') }}" class="admin-back-icon">
                <i class="bi bi-box-arrow-left"></i>
            </a>
            <div class="admin-container-border admin-icon-row">
                <div class="row">
                    <a class="col-lg-4 d-block col-md-6 col-12 admin-icon-in admin-icon-c"
                       href="{{ route('admin.user.create') }}">
                        <i class="bi bi-person-fill-add admin-icon-size"></i>
                        <p>Expert/Admin Registration</p>
                    </a>
                    <a class="col-lg-4 d-block col-md-6 col-12 admin-icon-in admin-icon-c"
                       href="{{route('admin.user.user-list')}}">
                        <i class="bi bi-person-vcard-fill admin-icon-size"></i>
                        <p>Admin & Expert List</p>
                    </a>
                    <a class="col-lg-4 d-block col-md-6 col-12 admin-icon-in admin-icon-c"
                       href="{{route('admin.user.category')}}">
                        <i class="bi bi-tags-fill admin-icon-size"></i>
                        <p> Category Registration</p>
                    </a>
                    <a class="col-lg-4 d-block col-md-6 col-12 admin-icon-in admin-icon-c"
                       href="{{route('admin.user.category-list')}}">
                        <i class="bi bi-card-list admin-icon-size"></i>
                        <p> Category List</p>
                    </a>
                    <a class="col-lg-4 d-block col-md-6 col-12 admin-icon-in admin-icon-c"
                       href="{{route('admin.user.antiques')}}">
                        <i class="bi bi-clipboard2-check-fill admin-icon-size"></i>
                        <p>Antiques Authentication</p>
                    </a>
                    <a class="col-lg-4 d-block col-md-6 col-12 admin-icon-in admin-icon-c"
                       href="{{route('admin.user.auction')}}">
                        <i class="bi bi-hourglass-split admin-icon-size"></i>
                        <p>Auction List</p>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
