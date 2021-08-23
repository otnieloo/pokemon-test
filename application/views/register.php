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

                <?php if($this->session->flashdata('failed')): ?>
                    <div class="alert alert-danger">
                        <?php 
                            echo $this->session->flashdata('failed'); 
                            $this->session->unset_userdata('failed');    
                        ?>
                    </div>
                <?php endif; ?>

                <h5 class="card-title text-center">Sign Up</h5>
                <form enctype='multipart/form-data' class="form-signin" action="<?= site_url('regist') ?>" method="post">
                    <div class="form-label-group">
                        <input type="text" id="inputUsername" class="form-control" placeholder="Username" required name="username" value="<?= set_value('username') ?>">
                        <label for="inputUsername">Username</label>
                    </div>
                    
                    <div class="form-label-group">
                        <input type="text" id="inputName" class="form-control" placeholder="Name" required name="name" value="<?= set_value('name') ?>">
                        <label for="inputName">Name</label>
                    </div>

                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Name" required name="email" value="<?= set_value('email') ?>">
                        <label for="inputEmail">Email</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                        <label for="inputPassword">Password</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="inputPassword2" class="form-control" placeholder="Password" required name="password2">
                        <label for="inputPassword2">Password Again</label>
                    </div>

                    <div class="custom-file mb-4">
                        <input type="file" id="inputFile" class="custom-file-input" required name="photo" >
                        <label for="inputPassword" class="custom-file-label">Photo</label>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign Up</button>
                    <hr class="my-4">
                    <a href="<?= site_url('') ?>">Login</a>
                    <div class=""></div>
                    <a href="<?= site_url('reset') ?>">Forgot Password?</a>
                    <!-- <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                    <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button> -->
                </form>
            </div>
        </div>
    </div>
</div>

