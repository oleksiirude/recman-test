<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>

                    <?php if (isset($_GET['registration']) && $_GET['registration'] === 'success') : ?>
                        <div class="alert alert-success" role="alert">
                            Registration completed successfully. Now you can sign in!
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid-params') : ?>
                        <div class="alert alert-danger" role="alert">
                            Please, fill out the form correctly.
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['error']) && $_GET['error'] === 'wrong-credentials') : ?>
                        <div class="alert alert-danger" role="alert">
                            Wrong credentials.
                        </div>
                    <?php endif; ?>

                    <form method="post" action="/sign-in-action">
                        <div class="form-floating mb-3">
                            <input required type="email" class="form-control" name="email" id="floatingInputEmail" placeholder="name@example.com">
                            <label for="floatingInputEmail">Email</label>
                            <small style="color: dimgrey">Min 6 symbols.</small>
                        </div>
                        <div class="form-floating mb-3">
                            <input required type="password" class="form-control" name="password" id="floatingInputPassword" placeholder="********">
                            <label for="floatingInputPassword">Password</label>
                            <small style="color: dimgrey">Min 8, max 30 symbols.</small>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>