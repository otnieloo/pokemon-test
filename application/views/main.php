<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?php 
                            echo $this->session->flashdata('success'); 
                            $this->session->unset_userdata('success');    
                        ?>
                    </div>
                <?php endif; ?>

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

                <h5 class="card-title text-center">Sign In</h5>
                <form class="form-signin" action="<?= site_url('userLogin') ?>" method="post">
                    <div class="form-label-group">
                        <input type="text" id="inputUsername" class="form-control" placeholder="Email address" required autofocus name="username">
                        <label for="inputUsername">Username</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                        <label for="inputPassword">Password</label>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                    <hr class="my-4">
                    <a href="<?= site_url('register');?>">Register</a>
                    <div class=""></div>
                    <a href="<?= site_url('reset') ?>">Forgot Password?</a>
                    <!-- <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                    <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
