<div class="modal fade"
     id="Register"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     aria-hidden="true"
     aria-labelledby="exampleModalToggleLabel2"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-border-removal">
                <h1 class="modal-title fs-4 register-title-c">Create an account</h1>
                <button class="btn-close"
                        data-bs-dismiss="modal"
                        type="button"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body modal-border-removal">
                <form action="" id="user-register">
                    <div class="mb-lg-4">
                        <div class="input-group mlm">
                            <span class="input-group-addon">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input class = "form-control login-inputbox"
                                   name="user_name"
                                   type="text"
                                   placeholder="Enter your username"
                                   required>
                        </div>
                        <span class="text-danger d-block"
                        id="signUp-user_name-error"></span>
                    </div>
                    <div class="mb-lg-4">
                        <div class="input-group mlm">
                            <span class="input-group-addon">
                                <i class="bi bi-envelope-at-fill"></i>
                            </span>
                            <input class = "form-control login-inputbox"
                                   name="email"
                                   type="email"
                                   placeholder="Enter your email"
                                   required>
                        </div>
                        <span class="text-danger d-block"
                        id="signUp-email-error"></span>
                    </div>
                    <div class="mb-lg-4">
                        <div class="input-group mlm">
                            <span class="input-group-addon">
                                <i class="bi bi-lock-fill"></i>
                            </span>
                            <input class = "form-control login-inputbox"
                                   name="password"
                                   type="text"
                                   placeholder="Enter your password"
                                   required>
                        </div>
                        <span class="text-danger d-block"
                        id="signUp-password-error"></span>
                    </div>
                    <div class="mb-lg-4">
                        <div class="input-group mlm">
                            <span class="input-group-addon">
                                <i class="bi bi-shield-lock-fill"></i>
                            </span>
                            <input class = "form-control login-inputbox"
                                   name="password_confirmation"
                                   type="text"
                                   placeholder="Retype your password to confirm"
                                   required>
                        </div>
                        <span class="text-danger d-block"
                        id="signUp-password_confirmation-error"></span>
                    </div>
                    <div class="mb-lg-4">
                        <div class="input-group mlm">
                            <span class="input-group-addon">
                                <i class="bi bi-person-circle"></i>
                            </span>
                            <input class = "form-control login-inputbox"
                                   name="full_name"
                                   type="text"
                                   placeholder="Enter your full name"
                                   required>
                        </div>
                        <span class="text-danger d-block"
                        id="signUp-full_name-error"></span>
                    </div>
                    <div class="mb-lg-4">
                        <div class="input-group mlm">
                            <span class="input-group-addon">
                                <i class="bi bi-telephone-fill"></i>
                            </span>
                            <input class = "form-control login-inputbox"
                                   name="phone_number"
                                   type="text"
                                   placeholder="Enter your phone number"
                                   required>
                        </div>
                        <span class="text-danger d-block"
                        id="signUp-phone_number-error"></span>
                    </div>
                    <div class="mb-lg-4">
                        <div class="input-group mlm">
                            <span class="input-group-addon">
                                <i class="bi bi-house-fill"></i>
                            </span>
                            <input class = "form-control login-inputbox"
                                   name="address"
                                   type="text"
                                   placeholder="Enter your address"
                                   required>
                        </div>
                        <span class="text-danger d-block"
                        id="signUp-address-error"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer modal-border-removal">
                <button class="btn-sign"
                        id="btn-sign-up"
                        type="button">Sign Up</button>
                <span>Already had an account?<button class="blue-link"
                            data-bs-target="#SignIn"
                            data-bs-toggle="modal">Sign In</button></span>
            </div>
        </div>
    </div>
</div>
