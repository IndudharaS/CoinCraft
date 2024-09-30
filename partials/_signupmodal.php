<div class="modal fade modal-xl" id="signupmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Signup</h1>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row align-items-center g-lg-5 py-5">
                        <div class="col-md-10 mx-auto col-lg-6">
                            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="POST"
                                action="/coincraft/partials/_handlesignup.php">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3 ">
                                            <input type="text" class=" form-control" id="floatingInput" required
                                                placeholder="name@example.com" name="first_name">
                                            <label for="floatingInput">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" required
                                                placeholder="name@example.com" name="last_name">
                                            <label for="floatingInput">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" required
                                        placeholder="name@example.com" name="signupemail">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" required
                                        placeholder="Password" name="signuppassword">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" required
                                        placeholder="Password" name="signupcpassword">
                                    <label for="floatingPassword">Confirm Password</label>
                                </div>
                                <div class="checkbox mb-3">
                                    <label>
                                        <input type="checkbox" value="remember-me" required> <small
                                            class="text-body-secondary">By clicking Sign up, you agree to the terms of
                                            use.</small>
                                    </label>
                                </div>
                                <!-- <button class="w-100 btn btn-lg btn-outline-primary my-2" type="reset">Reset</button> -->
                                <hr class="my-4">
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
                                

                            </form>

                        </div>
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">It's not Late</h1>
                            <p class="col-lg-10 fs-5">Ready to get started? Sign up for a new account and enjoy the
                                convenience of accessing our services with just a few easy steps. As a registered
                                member, you will gain exclusive access to personalized features, tailored
                                recommendations, and a user-friendly interface designed to enhance your overall
                                experience. Join our community today and explore the countless benefits that come with
                                being a valued member!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>