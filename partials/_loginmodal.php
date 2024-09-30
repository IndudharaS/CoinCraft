<div class="modal fade modal-xl m1" id="loginmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <div class="container ">
                    <div class="row align-items-center g-lg-5 p-5">
                        <div class="col-lg-7 text-center text-lg-start">
                            
                            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Welcome back!</h1>
                            <p class="col-lg-10 fs-4" fw-medium>
                            <ol>
                                <li>Securely access your account by entering your username and password to unlock a
                                    personalized and streamlined experience.</li>
                                <li>Log in to your account with confidence, ensuring a seamless and protected connection
                                    to your financial or personal information.</li>
                                <li>Log in to your account with confidence, ensuring a seamless and protected connection
                                    to your financial or personal information.</li>
                            </ol>
                            <p>If Admin, click here to login.
                                <a href="/coincraft/partials/_admin.php" >Admin Login</a>
                            </p>
                            </p>
                        </div>
                        <div class="col-md-10 mx-auto col-lg-5 ">
                            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="POST"
                                action="/coincraft/partials/_handlelogin.php">
                                <!-- <p class='text-center' >Login to make a difference</p> -->
                                <div class="my-2"></div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" required
                                        placeholder="name@example.com" name="loginemail">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" required
                                        placeholder="Password" name="loginpass">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="checkbox mb-3 text-center">
                                    <label>
                                        <input type="checkbox" value="remember-me"> Remember me
                                    </label>
                                </div>
                                <button class="w-100 btn btn-lg btn-outline-primary my-4" type="submit">Sign in</button>
                                <!-- <button class="w-50 btn btn-lg btn-outline-primary my-2" type="reset">Reset</button> -->
                            </form>
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