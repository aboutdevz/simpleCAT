<?= $this->extend('layout/master.php') ?>

<?= $this->section('main'); ?>
<?=view_cell('\App\Controllers\Layout::mhsNav');?>

<div class="row" style="height: 90vh;">
    <div class="col">

        <div class="card mx-auto w-75 rounded-3 shadow-lg mt-5 pb-5 p-lg-3">
            <div class="row mt-5 h-50">
                <div class="col text-center">
                    <h3 class="display-4">Selamat</h3>
                    <br>
                    <h3>anda telah menyelesaikan tes potensi akademik</h3>
                    <br><br>
                    <a class="btn btn-lg bg-primary text-white" href="<?=base_url('Hasil');?>">lihat hasil tes</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('main'); ?>