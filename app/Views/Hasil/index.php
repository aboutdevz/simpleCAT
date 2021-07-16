<?= $this->extend('layout/master.php') ?>

<?= $this->section('main'); ?>
<?=view_cell('\App\Controllers\Layout::mhsNav');?>
<div class="card rounded-3 shadow-lg mt-5 p-3">
    <div class="row">
        <div class="col-1">
            <img class="img-round img-thumbnail w-100 h-auto border-0" src="<?=imgAsset('appImg/fav.png')?>" alt="logo">
        </div>
        <div class="col-11 text-center pe-5">
            <h2>
                Tes Potensi Akademik Pemilihan Study Complection Program
                Universitas Nusa Putra
            </h2>
        </div>
    </div>
    <div class="row row-hasil">
        <div class="row d-flex justify-content-center h-100">
            <img class="hasil-logo d-block position-absolute border-0  w-25  h-auto" src="<?=imgAsset('appImg/fav.png')?>" alt="logo kampus">
        </div>
        <hr>
        <div class="col-8 d-flex border-end border-2">
            <img class="img-thumbnail" src="<?=imgAsset('appImg/person-icon.png')?>" alt="mahasiswa foto">
            <span class="d-inline align-self-center ms-5">
                <h4>Nama    : Eva Siti Nurjanah</h4>
                <h4>Nim     : 17185034</h4>
                <h4>Jurusan : Sistem Informasi</h4>
            </span>
        </div>
        <div class="col-4 d-flex">
            <span class="ms-4 align-self-center">
                <p class=" fw-bold">Verbal      = 620</p>
                <p class=" fw-bold">Kuantitatif = 680</p>
                <p class=" fw-bold">Logika      = 575</p>
            </span>
            <span class="d-flex ms-5 align-self-center bg-primary text-center align-items-center justify-content-center rounded-circle text-white" style="width: 100px; height: 100px;"> <b>617</b> </span>
        </div>
    </div>
    <br>
    <div class="row text-center mt-5 mb-5">
        <p class="fs-4 ">Berdasarkan dari hasil skor Tes Potensi Akademik, maka anda disarankan untuk memilih program SCP</p>
        <br><br><br><br><br>
        <h4 class="fw-bold">"Research Track"</h4>
    </div>
</div>
<?= $this->endSection('main'); ?>