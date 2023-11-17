@extends('master')

@section('content')
    <nav class="navbar navbar-expand-xxl nav_ground">
        <div class="container">
                <a class="cus-brand" href="#">Timeless Treasuria.</a>
                <button class="cus-toggler cus-toggle-border" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="cus-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav flex-grow-1 pe-3">
                            <li class="nav-item nav-space">
                                <a class="cus-link l_active" aria-current="page" href="#">HOME</a>
                            </li>
                            <li class="nav-item nav-space">
                                <a class="cus-link" href="#">
                                    ABOUT
                                </a>
                            </li>
                            <li class="nav-item dropdown nav-space">
                                <a class="cus-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    AUCTION
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-space-searchbar">
                                <a class="cus-link" href="#">CONTACT</a>
                            </li>
                            <li class="nav-item nav-space-searchbar">
                                <form class="d-flex pad_for_s_bar" role="search">
                                    <div class="input-group mb-3">
                                        <input class="form-control bg-search-bar" type="search" aria-label="Search"
                                            aria-describedby="ba2">
                                        <button class="btn btn-search-bar" type="button" id="ba2">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </li>
                            <div class="li-sign-in">
                                @guest
                                <button type="button" class="btn-cus btn-sign-in" data-bs-toggle="modal"
                                    data-bs-target="#SignIn">
                                    Sign In
                                </button>
                                @endguest
                            </div>
                            @auth
                                <div class="li-after-sign-in">
                                    <div class="dropdown">
                                        <button class="btn btn-user-icon dropdown-cus dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-person-fill"></i>
                                            Dropdown button
                                        </button>
                                        <ul class="dropdown-menu dropdown-cus">
                                            <li><a class="dropdown-item" href="#">Inventory</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Log out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
    </nav>
    <div class="modal fade" id="SignIn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content login-form">
                <div class="modal-header modal-border-removal">
                    <h1 class="modal-title fs-4 login-title-c">Welcome back!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-border-removal">
                    <form id="signIn-form">
                        <div class="mb-lg-4">
                            <label for="photo" class="form-label">Email</label>
                            <div class="input-group mlm">
                                <span class="input-group-addon">
                                    <i class="bi bi-envelope-at-fill"></i>
                                </span>
                                <input type="text" name="email" class = "form-control login-inputbox" id="i_name"
                                    placeholder="Enter your email" required>
                            </div>
                            <span class="text-danger d-block" id="signIn-email-error"></span>
                        </div>
                        <div class="mb-lg-4">
                            <label for="photo" class="form-label" name="password">Password</label>
                            <div class="input-group mlm">
                                <span class="input-group-addon">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="text" name="password" class = "form-control login-inputbox"
                                    id="password" placeholder="Enter your password" name="password" required>
                            </div>
                            <span class="text-danger d-block" id="signIn-password-error"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer modal-border-removal">
                    <button type="button" id="btn-sign" class="btn-sign">Sign In</button>
                    <span>Don't have an account?<button class="blue-link" data-bs-target="#Register"
                            data-bs-toggle="modal">Sign Up</button></span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Register" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modal-border-removal">
                    <h1 class="modal-title fs-4 register-title-c">Create an account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-border-removal">
                    <form action="">
                        <div class="mb-lg-4">
                            <div class="input-group mlm">
                                <span class="input-group-addon">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" class = "form-control login-inputbox"
                                    placeholder="Enter your username" name="username" required>
                            </div>
                        </div>
                        <div class="mb-lg-4">
                            <div class="input-group mlm">
                                <span class="input-group-addon">
                                    <i class="bi bi-envelope-at-fill"></i>
                                </span>
                                <input type="email" class = "form-control login-inputbox"
                                    placeholder="Enter your email" name="email" required>
                            </div>
                        </div>
                        <div class="mb-lg-4">
                            <div class="input-group mlm">
                                <span class="input-group-addon">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="text" class = "form-control login-inputbox"
                                    placeholder="Enter your password" name="password" required>
                            </div>
                        </div>
                        <div class="mb-lg-4">
                            <div class="input-group mlm">
                                <span class="input-group-addon">
                                    <i class="bi bi-shield-lock-fill"></i>
                                </span>
                                <input type="text" class = "form-control login-inputbox"
                                    placeholder="Retype your password to confirm" name="confirm_password" required>
                            </div>
                        </div>
                        <div class="mb-lg-4">
                            <div class="input-group mlm">
                                <span class="input-group-addon">
                                    <i class="bi bi-person-circle"></i>
                                </span>
                                <input type="text" class = "form-control login-inputbox"
                                    placeholder="Enter your full name" name="full_name" required>
                            </div>
                        </div>
                        <div class="mb-lg-4">
                            <div class="input-group mlm">
                                <span class="input-group-addon">
                                    <i class="bi bi-telephone-fill"></i>
                                </span>
                                <input type="text" class = "form-control login-inputbox"
                                    placeholder="Enter your phone number" name="phone_number" required>
                            </div>
                        </div>
                        <div class="mb-lg-4">
                            <div class="input-group mlm">
                                <span class="input-group-addon">
                                    <i class="bi bi-house-fill"></i>
                                </span>
                                <input type="text" class = "form-control login-inputbox"
                                    placeholder="Enter your address" name="address" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer modal-border-removal">
                    <button type="button" class="btn-sign">Sign Up</button>
                    <span>Already had an account?<button class="blue-link" data-bs-target="#SignIn"
                            data-bs-toggle="modal">Sign In</button></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container form-container-style">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h1 class="form-title">Item Registration</h1><br><br>
                <form action={{ route('user.item-register.store') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class = "form-cus" id="i_name" placeholder="Item Name" name="name"
                            required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class = "form-cus" id="creator" placeholder="Creator" name="creator">
                    </div>
                    <div class="mb-3">
                        <input type="text" class = "form-cus" id="year" placeholder="Year Created"
                            name="year">
                    </div>
                    <div class="mb-3">
                        <select class="form-select-cus" aria-label="Default select example">
                            <option selected>Painting</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class = "form-cus" id="condition" placeholder="Condition"
                               name="condition">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Image of Antique</label>
                        <input class="form-cus" type="file" name="photo" id="photo">
                    </div>
                    <div class="mb-3">
                        <label for="certificate" class="form-label">Certificate of Authenticity</label>
                        <input class="form-cus" type="file" name="certificate" id="certificate">
                    </div>
                    <div class="mb-3">
                        <textarea type="text" class = "form-cus textarea-size" id="description" placeholder="Description"
                            name="description" required></textarea>
                    </div>
                    <div class = "row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center"><button type="submit"
                                class="btn-cus btn-submit btn-submit-color">Submit</button></div>
                        <div class="col-md-4"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container first-footer">
            <div class="row">
                <div class="footer-col">
                    <ul>
                        <h4>about</h4>
                        <li>Welcome to our antique and vintage auction house! We have been working for years to provide you
                            with unique furniture, jewelry, fine arts and other antique items. We value these old and
                            fragile pieces of history and do our best to longer their life. We regularly provide our clients
                            with seamless experience, so you could become a happy owner of beautiful objects.
                        </li>
                    </ul>
                </div>
                <div class="footer-col">
                    <ul>
                        <h4>get support</h4>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">account</a></li>
                        <li><a href="#">payment methods</a></li>
                        <li><a href="#">refunds</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <ul>
                        <h4>contact</h4>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">live chat</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <ul>
                        <h4>follow us</h4>
                    </ul>
                </div>
            </div>
        </div>
        <div class="second-footer">
            <div class="container">
                <div class="p-4 pb-0">
                    <section class="p-3 pt-0 container">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-7 col-lg-8 text-start">
                                <span class="footer-brand">Timeless Treasuria.</span>
                                <div class="footer-pp-col">
                                    <span class="footer-pp">All Right Reserved.
                                        <a class="footer-pp-a" href="#">Privacy Policy</a></span>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 ml-lg-0 text-end s-media-btn">
                                <a class="btn btn-outline-light m-1" class="text-white" role="button"><i
                                        class="bi bi-facebook"></i></a>
                                <a class="btn btn-outline-light m-1" class="text-white" role="button"><i
                                        class="bi bi-twitter-x"></i></a>
                                <a class="btn btn-outline-light m-1" class="text-white" role="button"><i
                                        class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </footer>
    <script>
        const sigInErrors = {
            'email': document.querySelector('#signIn-email-error'),
            'password': document.querySelector('#signIn-password-error')
        }
        const signInForm = document.querySelector('#signIn-form')
        document.querySelector('#btn-sign').addEventListener('click', function(e) {
            Object.values(sigInErrors).forEach(v => {
                v.innerText = ''
            })
            const formData = new FormData(signInForm)
            axios.post('/login', formData).then(res => {
                if (res.data.isAdmin) {
                    return window.location = '/admin'
                }
                window.location.reload()
            }).catch(error => {
                console.log(error)
                if (error.response.status === 422) {
                    const validationErrors = error.response.data.errors
                    for (let key in validationErrors) {
                        if (key in sigInErrors) {
                            sigInErrors[key].innerText = validationErrors[key][0]
                        }
                    }
                }
            })
        })
    </script>
@endsection