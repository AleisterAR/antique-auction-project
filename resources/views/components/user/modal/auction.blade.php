<div class="modal fade"
     id="StartAuction"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     aria-labelledby="staticBackdropLabel"
     aria-hidden="true"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content login-form">
            <div class="modal-header modal-border-removal">
                <h1 class="modal-title fs-4 login-title-c">Start an Auction</h1>
                <button class="btn-close"
                        data-bs-dismiss="modal"
                        type="button"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body modal-border-removal">
                <form id="auction-form">
                    <div class="mb-lg-4">
                        <label class="form-label"
                               for="photo">Start Date</label>
                        <div class="mb-lg-4">
                            <div class="input-group">
                                <input class = "form-control"
                                       name="start-time"
                                       type="datetime-local">
                            </div>
                        </div>
                    </div>
                    <div class="mb-lg-4">
                        <label class="form-label"
                               name="password"
                               for="photo">End Date</label>
                        <div class="input-group mlm">
                            <input class = "form-control"
                                   name="end-time"
                                   type="datetime-local">
                        </div>
                        <span class="text-danger d-block"
                              id="signIn-password-error"></span>
                    </div>
                    <div class="mb-lg-4">
                        <label class="form-label"
                               name="password"
                               for="photo">Initial Price</label>
                        <div class="input-group mlm">
                            <input class = "form-control"
                                   name="start-price"
                                   type="text"
                                   placeholder="Initial Price for Antique">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer modal-border-removal">
                <button class="btn-start-auction"
                        id="start-auction"
                        type="button">Start Auction</button>
            </div>
        </div>
    </div>
</div>

