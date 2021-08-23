<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">CI Test</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= site_url('/welcome/list') ?>">Pokemon List</a>
            </li>
            <?php if ($this->session->has_userdata('username')) : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('/welcome/owned_list') ?>">Owned Pokemon</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('logout') ?>">Logout</a>
                </li>
            <?php else : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('') ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('register') ?>">Register</a>
                </li>
            <?php endif; ?>

        </ul>
    </div>
</nav>