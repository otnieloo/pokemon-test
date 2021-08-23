<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <?php if(validation_errors() !== ''): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?= validation_errors() ?>
                            </ul>
                        </div>
                <?php endif; ?>

                <h5 class="card-title text-center">Reset Password</h5>
                <form class="form-signin" action="#" method="post">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                        <label for="inputPassword">Password</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="inputPassword2" class="form-control" placeholder="Password" required name="password2">
                        <label for="inputPassword2">Password Again</label>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Reset</button>
                    <hr class="my-4">
                    <!-- <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                    <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
