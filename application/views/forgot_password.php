<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <?php if($this->session->flashdata('failed')): ?>
                    <div class="alert alert-danger">
                        <?php 
                            echo $this->session->flashdata('failed'); 
                            $this->session->unset_userdata('failed');    
                        ?>
                    </div>
                <?php endif; ?>
                <?php if(validation_errors() !== ''): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?= validation_errors() ?>
                            </ul>
                        </div>
                <?php endif; ?>
                <h5 class="card-title text-center">Reset Password</h5>
                <form class="form-signin" action="<?= site_url('resetpass') ?>" method="post">                    
                    <div class="form-label-group">
                        <input type="email" id="inputUsername" class="form-control" placeholder="Check your email" required autofocus name="email">
                        <label for="inputUsername">Email</label>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                    <hr class="my-4">
                    <a href="<?= site_url('') ?>">Login</a>
                    <div class=""></div>
                    <a href="<?= site_url('register') ?>">Register</a>
                </form>
            </div>
        </div>
    </div>
</div>
