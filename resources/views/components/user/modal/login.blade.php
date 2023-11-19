<div class="modal fade"
     id="SignIn"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     aria-labelledby="staticBackdropLabel"
     aria-hidden="true"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content login-form">
            <div class="modal-header modal-border-removal">
                <h1 class="modal-title fs-4 login-title-c">Welcome back!</h1>
                <button class="btn-close"
                        data-bs-dismiss="modal"
                        type="button"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body modal-border-removal">
                <form id="signIn-form">
                    <div class="mb-lg-4">
                        <label class="form-label"
                               for="photo">Email</label>
                        <div class="input-group mlm">
                            <span class="input-group-addon">
                                <i class="bi bi-envelope-at-fill"></i>
                            </span>
                            <input class="form-control login-inputbox"
                                   id="i_name"
                                   name="email"
                                   type="text"
                                   placeholder="Enter your email"
                                   required>
                        </div>
                        <span class="text-danger d-block"
                              id="signIn-email-error"></span>
                    </div>
                    <div class="mb-lg-4">
                        <label class="form-label"
                               name="password"
                               for="photo">Password</label>
                        <div class="input-group mlm">
                            <span class="input-group-addon">
                                <i class="bi bi-lock-fill"></i>
                            </span>
                            <input class = "form-control login-inputbox"
                                   id="password"
                                   name="password"
                                   name="password"
                                   type="password"
                                   placeholder="Enter your password"
                                   required>
                        </div>
                        <span class="text-danger d-block"
                              id="signIn-password-error"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer modal-border-removal">
                <button class="btn-sign"
                        id="btn-sign"
                        type="button">Sign In</button>
                <span>Don't have an account?<button class="blue-link"
                            data-bs-target="#Register"
                            data-bs-toggle="modal">Sign Up</button></span>
            </div>
        </div>
    </div>
</div>
