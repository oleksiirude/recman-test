<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Registration</h5>
                    <?php if (isset($_GET['error'])) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php if ($_GET['error'] === 'invalid-params') : ?>
                                Please, fill out the form correctly.
                            <?php elseif ($_GET['error'] === 'user-exists') : ?>
                                User with this email already exists.
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="/register-action">
                        <div class="form-floating mb-3">
                            <input required type="text" class="form-control" name="first_name" id="floatingInputFirstName" placeholder="Password2">
                            <label for="floatingInputFirstName">First Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input required type="text" class="form-control" name="last_name" id="floatingInputLastName" placeholder="Password2">
                            <label for="floatingInputLastName">Last Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input required type="text" class="form-control" name="phone" id="floatingInputMobilePhone" placeholder="Password2">
                            <label for="floatingInputMobilePhone">Mobile Phone</label>
                            <small style="color: dimgrey">Only digits, min 8 numbers.</small>
                        </div>

                        <div class="form-floating mb-3">
                            <input required type="email" class="form-control" name="email" id="floatingInputEmail" placeholder="name@example.com">
                            <label for="floatingInputEmail">Email</label>
                            <small style="color: dimgrey">Min 6 symbols.</small>
                        </div>

                        <div class="form-floating mb-3">
                            <input required type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            <small style="color: dimgrey">Min 8, max 30 symbols.</small>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>