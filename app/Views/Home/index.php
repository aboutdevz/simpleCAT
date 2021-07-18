<?php

$session = \Config\Services::session();
$dataMhs = $session->credential['dataMhs'];
?>

<?= $this->extend('layout/master.php') ?>

<?= $this->section('main'); ?>
<?=view_cell('\App\Controllers\Layout::mhsNav');?>
<div class="row mt-5 d-flex align-items-center justify-content-center mb-5">
    <div class="col-12 p-lg-3 m-lg-2 p-1">


        <div class="card p-5 border-0 rounded-3 shadow-lg ">
            <div class="text-center">
                <h2>Selamat Datang di Sistem Tes Potensi Akademik Universitas Nusa Putra</h2>
                <p>Tes Potensi Akademik dapat membantu para mahasiswa Universitas Nusa Putra Kota Sukabumi dalam menentukan
                    Program SCP (Study Complection Program) berdasarkan kemampuan dan potensi dasar masing-masing mahasiswa
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
                <a href="<?=base_url('Soal')?>" class="btn w-100 bg-primary">Mulai</a>
            </div>
        </div>
    </div>
</div>
<!-- modal start  -->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Profil Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
                </div>
                <div class="modal-body p-4">
                    <img class="rounded-3 position-absolute" src="<?=$dataMhs->foto?>" alt="" height="auto" width="150">
                    <div class="row" style="margin-left: 12em;">
                        <div class="col-4 ">
                            
                            <p>NIM</p>
                            <p>Nama Lengkap</p>
                            <p>Jenis Kelamin</p>
                            <p>Program Studi</p>
                            <p>Tanggal Lahir</p>
                            <p>Email</p>
                            <p>No. Handphone</p>
                        </div>
                        <div class="col-8 ">
                            <p>:<?=" ".$dataMhs->nim?></p>
                            <p>:<?=" ".$dataMhs->nama_mhs?> </p>
                            <p>:<?=" ".$dataMhs->jenis_kelamin?></p>
                            <p>:<?=" ".$dataMhs->prodi?></p>
                            <p>:<?=" ".$dataMhs->ttl?></p>
                            <p>:<?=" ".$dataMhs->email?></p>
                            <p>:<?=" ".$dataMhs->no_hp?></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group w-100 justify-content-end">
                        <button class="btn bg-danger" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- model end  -->
<?= $this->endSection(); ?>