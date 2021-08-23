<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">

                <h5 class="card-title text-center">Welcome!!!</h5>
                <div class="profile">
                    <div class="img mx-auto">
                        <img src="<?= base_url('uploads/'.$photo) ?>" alt="Profile photo" width="100">
                    </div>
                    <div class="info">
                        <p>Name: <?= $name ?></p>
                        <p>Email: <?= $email ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
