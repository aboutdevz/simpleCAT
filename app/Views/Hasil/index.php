<?php

$session = \Config\Services::session();
$dataMhs = $session->credential['dataMhs'];
?>

<?= $this->extend('layout/master.php') ?>

<?= $this->section('main'); ?>
<?=view_cell('\App\Controllers\Layout::mhsNav');?>
<a href="Hasil/getSertifikat" class="btn bg-success w-100">Print</a>
<div class="card  rounded-3 shadow-lg mt-2 p-3" id="sertifikat">
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
        <div class="col-12 col-lg-8 d-flex border-end border-2">
            <div class="row">
                <div class="col-12 col-lg-4">

                    <img class="img-thumbnail" src="<?=$foto?>" alt="mahasiswa foto" style="height:auto;width:auto">
                </div>
                <div class="col-12 col-lg-8">
<span class="d-inline align-self-center ms-5">
                <div class="row">
                    <div class="col-4">
                        <h4>Nama </h4>
                    </div>
                    <div class="col-8">
                        <h4 class="fs-3">:<?=" ".$nama?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h4>Nim </h4>
                    </div>
                    <div class="col-8">
                        <h4 class="fs-3">:<?=" ".$nim?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <h4>Jurusan </h4>
                    </div>
                    <div class="col-8">
                        <h4 class="fs-3">:<?=" ".$jurusan?></h4>
                    </div>
                </div>
                
            </span>
                </div>
            </div>
            
        </div>
        <div class="col-12 col-md-4 d-flex">
            <span class="ms-4 align-self-center">
                
                        <p class="fw-light">Verbal </p>
                   
                    
                        <p class="fw-bold"><?=$verbal?></p>
                
                
                        <p class="fw-light">Kuantitatif </p>
               
                    
                        <p class="fw-bold"><?=$kuantitatif?></p>
           
              
                        <p class="fw-light">Logika </p>
                   
                   
                        <p class="fw-bold"><?=$logika?></p>
                 
            </span>
            <span class="d-flex ms-5 align-self-center bg-primary text-center align-items-center justify-content-center rounded-circle text-white" style="width: 100px; height: 100px;"> <b><?=$skor?></b> </span>
        </div>
    </div>
    <br>
    <div class="row text-center mt-5 mb-5">
        <p class="fs-4 ">Berdasarkan dari hasil skor Tes Potensi Akademik, maka anda disarankan untuk memilih program SCP</p>
        <br><br><br><br><br>
        <h4 class="fw-bold">"<?=$scp?>"</h4>
    </div>
</div>

<!-- modal start  -->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Profil Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
                </div>
                <div class="modal-body row p-4">
                    <div class="img-profile col-12 col-lg-4 mb-5 justify-content-center">
                        <img class="rounded-3 " src="<?=$dataMhs->foto?>" alt="" height="auto" width="150">
                        
                        </div>
                    <div class="col-12 col-lg-8 profile-body">

                        <div class="row">
                            <div class="col-6 col-lg-4 ">
                                
                                <p>NIM</p>
                                <p>Nama Lengkap</p>
                                <p>Jenis Kelamin</p>
                                <p>Program Studi</p>
                                <p>Tanggal Lahir</p>
                                <p>Email</p>
                                <p>No. Handphone</p>
                            </div>
                            <div class="col-6 col-lg-8 ">
                                <p>:<?=" ".$dataMhs->nim?></p>
                                <p>:<?=" ".$dataMhs->nama_mhs?> </p>
                                <p>:<?=" ".$dataMhs->jenis_kelamin  ?></p>
                                <p>:<?=" ".$dataMhs->prodi?></p>
                                <p>:<?=" ".$dataMhs->ttl?></p>
                                <p>:<?=" ".$dataMhs->email?></p>
                                <p>:<?=" ".$dataMhs->no_hp?></p>
                            </div>
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

<?= $this->endSection('main'); ?>