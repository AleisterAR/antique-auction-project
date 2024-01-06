@extends('admin.master')
@section('content')
    <main>
        <div class="container px-4 form-container-style">
            <a href="{{ route('admin.index') }}" class="admin-back-icon">
                <i class="bi bi-box-arrow-left"></i>
            </a>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 form-style">
                    <h1 class="form-title">Registration</h1><br><br>
                    <form method="POST"
                          action="{{ route('admin.user.store') }}"
                          autocomplete="off"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input class="form-cus"
                                   name="user_name"
                                   type="text"
                                   placeholder="Username">
                            @error('user_name')
                            <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class = "form-cus"
                                   name="email"
                                   type="text"
                                   placeholder="Email">
                            @error('email')
                            <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class = "form-cus"
                                   name="password"
                                   type="text"
                                   placeholder="Password">
                            @error('password')
                            <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class="form-cus"
                                   name="password_confirmation"
                                   type="text"
                                   placeholder="Confirm Password">
                            @error('password_confirmation')
                            <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <select class="form-select-cus role-option"
                                    name="role"
                                    aria-label="Default select example">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class = "form-cus"
                                   name="full_name"
                                   type="text"
                                   placeholder="Full name">
                            @error('full_name')
                            <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class = "form-cus"
                                   name="phone_number"
                                   type="text"
                                   placeholder="Phone Number">
                            @error('phone_number')
                            <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class = "form-cus"
                                   name="address"
                                   type="text"
                                   placeholder="Address">
                            @error('address')
                            <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        <div class = "row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center"><button class="btn-submit btn-submit-color"
                                                                      type="submit">Submit</button></div>
                            <div class="col-md-4"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
