@extends('admin.master')

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
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Entries
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('admin.user.create')}}">Registration</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Experts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="entry-register.blade.php">Registration</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">List</a>
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
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <br><br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Antique Items Table
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Creator</th>
                                            <th>Year of Creation</th>
                                            <th>Images</th>
                                            <th>Certificate of Authenticity</th>
                                            <th>Verification</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->provenance->creator }}</td>
                                                <td>{{ $item->provenance->year }}</td>
                                                <td>
                                                    @foreach ($item->images as $image)
                                                        <a href="{{ asset('storage/antique/' . $image->file_name) }}"
                                                           target="_blank">Available! Click to view!</a>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($item->provenance->images as $image)
                                                        <a href="{{ asset('storage/certificate/' . $image->file_name) }}"
                                                           target="_blank">Available! Click to view!</a>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <button @cannot('verify item') disabled  @endcannot  data-bs-toggle="dropdown"
                                                            type="button"
                                                            aria-expanded="false"
                                                            @class([
                                                                'btn',
                                                                'dropdown-toggle',
                                                                'btn-danger' => !$item->status,
                                                                'btn-success' => !!$item->status,
                                                            ])>
                                                        {{ $item->status ? 'Verified' : 'Unverified' }}
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form action="{{ route('admin.item.update.status', ['id' => $item->id]) }}"
                                                                  method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button class="dropdown-item"
                                                                        name="status"
                                                                        type="submit"
                                                                        value="1"
                                                                        @disabled(!!$item->status)>Verify</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('admin.item.update.status', ['id' => $item->id]) }}"
                                                                  method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button class="dropdown-item"
                                                                        name="status"
                                                                        type="1"
                                                                        value="0"
                                                                        @disabled(!$item->status)>Unverify</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
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
