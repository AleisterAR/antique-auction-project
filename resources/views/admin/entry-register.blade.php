@extends('master')
@section('content')

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark nav_ground">
            <a class="admin-brand ps-3"
               href="admin_panel.html">Timeless Treasuria</a>
            <button class="btn btn-link order-1 order-lg-0 me-4 me-lg-0"
                    id="sidebarToggle"
                    href="#!"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       id="navbarDropdown"
                       data-bs-toggle="dropdown"
                       href="#"
                       role="button"
                       aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item"
                               href="#!">Settings</a></li>
                        <li><a class="dropdown-item"
                               href="#!">Activity Log</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item"
                               href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-cus"
                     id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link collapsed"
                               data-bs-toggle="collapse"
                               data-bs-target="#collapseLayouts"
                               href="#"
                               aria-expanded="false"
                               aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Entries
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse"
                                 id="collapseLayouts"
                                 data-bs-parent="#sidenavAccordion"
                                 aria-labelledby="headingOne">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link"
                                       href="layout-static.html">Registration</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed"
                               data-bs-toggle="collapse"
                               data-bs-target="#collapseLayouts1"
                               href="#"
                               aria-expanded="false"
                               aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Experts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse"
                                 id="collapseLayouts1"
                                 data-bs-parent="#sidenavAccordion"
                                 aria-labelledby="headingOne">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link"
                                       href="entry-register.blade.php">Registration</a>
                                    <a class="nav-link"
                                       href="layout-sidenav-light.html">List</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <br><br>
                    <div class="container px-4 form-container-style">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
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
                                        <select class="form-select-cus"
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
                <footer class="py-4 bg-cus-footer mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-mute">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a class="text-mute"
                                   href="#">Privacy Policy</a>
                                &middot;
                                <a class="text-mute"
                                   href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
@endsection
