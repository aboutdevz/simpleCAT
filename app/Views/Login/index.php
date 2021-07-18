<?php $session = \Config\Services::session();?>

<?= $this->extend('layout/minimal'); ?>


<?= $this->section("minimal") ?>


<div class="row d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card  p-5 border-0 rounded-3 shadow-lg" style="max-width: 800px;">
            <img src="<?= imgAsset('appImg/fav.png') ?>" alt="person" class="mx-auto" width="100px" height="auto">
            <h1 class="text-center card-title">Login</h1>
            <?php if ($session->getFlashdata('salahAkun') !== null) :?>
            <p class="text-white text-center p-3 bg-danger"> Password / Username Salah <br> Silahkan Coba Lagi</p>
            <?php endif;?>
            <?= form_open('Login/auth') ?> <div class="mb-3">
                <?= csrf_field() ?>
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control">
                <span class="form-text">Masukkan username</span>
                
                
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
            <span class="form-text">Masukkan password</span>
        </div>
        <button type="submit" class="btn bg-primary text-white text-center w-100">Submit</button>
        <?= form_close() ?>
    </div>
</div>
</div>


<?= $this->endSection(); ?>