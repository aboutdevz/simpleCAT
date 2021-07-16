<?= $this->extend('layout/master.php') ?>

<?= $this->section('main'); ?>
<?=view_cell('\App\Controllers\Layout::mhsNav');?>
<div class="row mt-5 d-flex align-items-center justify-content-center mb-5">
    <div class="col-12 p-lg-3 m-lg-2 p-1">


        <div class="card p-5 border-0 rounded-3 shadow-lg ">
            <div class="text-center">
                <h2>Selamat Datang di Sistem Tes Potensi Akademik Universitas Nusa Putra</h2>
                <p>Tes Potensi Akademik dapat membantu para mahasiswa Universitas Nusa Putra Kota Sukabumi dalam menentukan
                    Program SCP (Study Complection Program) berdasarkan kemampuan dan potensi dasar masing-masing bahasiswa
                    yang
                    akan diukur dan dinilai melalui Sistem Tes Potensi Akademik ini.</p>
            </div>



            <div class=" row  flex-row text-center text-md-start p-md-5 word-wrap">
                <div class="col-12 mb-3 col-lg-5">
                    <p class="card-title"><b>Terdiri Dari 3 Sub Test</b> </p>
                    <ol class="list-group  list-group-numbered">
                        <li>Test Verbal</li>
                        <li>Test Kuantitatif</li>
                        <li>Test Logika</li>
                    </ol>
                </div>
                <div class="col-12 mb-3 col-md-5">
                    <p class="card-title"><b>Waktu Pengerjaan</b> </p>
                    <ul class="list-group">
                        <li>Test Verbal : <b>25 Menit</b></li>
                        <li>Test Kuantitatif <b>35 Menit</b></li>
                        <li>Test Logika <b>30 Menit</b></li>
                    </ul>
                </div>
                <div class="col-12 col-md-2">
                    <p><b>Jumlah Total Soal = 115 Soal</b> </p>
                </div>
            </div>
            <div class="row">
                <button class="btn bg-primary">Mulai</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>