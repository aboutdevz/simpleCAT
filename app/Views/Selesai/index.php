<?php
    $session = \Config\Services::session();
    helper(['gambar']);
    $dataMhs = $session->credential['dataMhs'];
 ?>

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
                        <img class="rounded-3 " src="<?=($dataMhs->foto == !null) ? ($dataMhs->foto) :(imgAsset('appImg/person-icon.png')) ?>" alt="" height="auto" width="150">
                        
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

<?= $this->endSection('main'); ?>