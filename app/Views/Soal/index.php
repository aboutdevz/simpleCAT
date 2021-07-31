<?php

$session = \Config\Services::session();
$dataMhs = $session->credential['dataMhs'];
?>

<?= $this->extend('layout/master.php') ?>

<?= $this->section('main'); ?>
<?= view_cell('\App\Controllers\Layout::mhsNav'); ?>
<div class="row soal-wrapper mt-lg-4">


    <div class="soal-container mt-4  col-12  pt-0 ">
        <div class="bg-primary text-white px-4">
            <div class="row">
                <div class="col-11">

                    <small class="title-soal word-wrap fs-3 fw-light w-100 p-lg-4">Soal Logika </small>
                </div>
                <div class="col-1">
                    <small class="fw-bold timer">Soal Logika </small>

                </div>
            </div>
        </div>
        <div class="card cardSoal " style="min-height: 80vh; max-height: 80vh;" id="cardSoal" >


            <div class="card-body bg-white ps-0 p-lg-3 ">


                <div id="carouselExampleIndicators" class="carousel slide" data-bs-interval="false" data-bs-wrap="false" data-bs-ride="carousel">

                    <div class="carousel-inner ps-lg-2">

                        <div class="carousel-item active">
                            <?= form_open('Soal/submit') ?>
                            <?= csrf_field() ?>
                            <ol class="list-contain soalVerbal">
                                <?php if (!empty($dataSoal['sinonim'])) :?>
                                    <h5 class="m-3 m-lg-5 mt-5">A. Sinonim</h5>
                                <?php foreach ($dataSoal['sinonim'] as $data) : ?>
                                    <li class="mb-3">
                                        <div class="soal card bg-secondary p-2 mb-4 ms-1" style="text-align: justify;">

                                            <?= $data['soal'] ?>

                                        </div>
                                        <ol type="A" class="">
                                            <li class="list-item-jawaban h-100 w-100">
                                                <input class="form-check-input" type="radio" value="A" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_a'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="B" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_b'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="C" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_c'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="D" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_d'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>

                                        </ol>


                                    </li>
                                <?php endforeach; ?>
                                <?php else:?>
                                    <h3 class="text-center">No data</h3>
                                <?php endif;?>
                                <?php if (!empty($dataSoal['antonim'])) :?>
                                    <h5 class="m-3 m-lg-5 mt-5">B. Antonim</h5>
                                <?php foreach ($dataSoal['antonim'] as $data) : ?>
                                    <li class="mb-3">
                                        <div class="soal card bg-secondary p-2 mb-4 ms-1" style="text-align: justify;">

                                            <?= $data['soal'] ?>

                                        </div>
                                        <ol type="A" class="">
                                            <li class="list-item-jawaban h-100 w-100">
                                                <input class="form-check-input" type="radio" value="A" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_a'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="B" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_b'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="C" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_c'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="D" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_d'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>

                                        </ol>


                                    </li>
                                <?php endforeach; ?>
                                <?php else:?>
                                    <h3 class="text-center">No data</h3>
                                <?php endif;?>
                                <?php if (!empty($dataSoal['analogi'])) :?>
                                    <h5 class="m-3 m-lg-5 mt-5">C. Analogi</h5>
                                <?php foreach ($dataSoal['analogi'] as $data) : ?>
                                    <li class="mb-3">
                                        <div class="soal card bg-secondary p-2 mb-4 ms-1" style="text-align: justify;">

                                            <?= $data['soal'] ?>

                                        </div>
                                        <ol type="A" class="">
                                            <li class="list-item-jawaban h-100 w-100">
                                                <input class="form-check-input" type="radio" value="A" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_a'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="B" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_b'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="C" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_c'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="D" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_d'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>

                                        </ol>


                                    </li>
                                <?php endforeach; ?>
                                <?php else:?>
                                    <h3 class="text-center">No data</h3>
                                <?php endif;?>
                            </ol>


                            <?= form_close() ?>
                        </div>
                        <div class="carousel-item">
                        <?= form_open('Soal/submit') ?>
                            <?= csrf_field() ?>
                            <ol class="list-contain soalKuantitatif">
                                <?php if (!empty($dataSoal['logikaMtk'])) :?>
                                    <h5 class="m-3 m-lg-5">A. Logika Aritmatika</h5>
                                <?php foreach ($dataSoal['logikaMtk'] as $data) : ?>
                                    <li class="mb-3">
                                        <div class="soal card bg-secondary p-2 mb-4 ms-1" style="text-align: justify;">

                                            <?= $data['soal'] ?>

                                        </div>
                                        <ol type="A" class="">
                                            <li class="list-item-jawaban h-100 w-100">
                                                <input class="form-check-input" type="radio" value="A" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_a'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="B" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_b'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="C" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_c'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="D" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_d'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>

                                        </ol>


                                    </li>
                                <?php endforeach; ?>
                                <?php else:?>
                                    <h3 class="text-center">No Data</h3>
                                <?php endif;?>
                                <?php if (!empty($dataSoal['mtk'])) :?>
                                    <h5 class="m-3 m-lg-5">B. Matematika</h5>
                                <?php foreach ($dataSoal['mtk'] as $data) : ?>
                                    <li class="mb-3">
                                        <div class="soal card bg-secondary p-2 mb-4 ms-1" style="text-align: justify;">

                                            <?= $data['soal'] ?>

                                        </div>
                                        <ol type="A" class="">
                                            <li class="list-item-jawaban h-100 w-100">
                                                <input class="form-check-input" type="radio" value="A" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_a'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="B" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_b'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="C" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_c'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="D" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_d'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>

                                        </ol>


                                    </li>
                                <?php endforeach; ?>
                                <?php else:?>
                                    <h3 class="text-center">No Data</h3>
                                <?php endif;?>
                            </ol>


                            <?= form_close() ?>
                        </div>
                        <div class="carousel-item">
                        <?= form_open('Soal/submit') ?>
                            <?= csrf_field() ?>
                            <ol class="list-contain soalLogika">
                                <?php if(!empty($dataSoal['logikaUmum'])) :?>
                                    <h5 class="m-3 m-lg-5">A. Logika Umum</h5>
                                <?php foreach ($dataSoal['logikaUmum'] as $data) : ?>
                                    <li class="mb-3">
                                        <div class="soal card bg-secondary p-2 mb-4 ms-1" style="text-align: justify;">

                                            <?= $data['soal'] ?>

                                        </div>
                                        <ol type="A" class="">
                                            <li class="list-item-jawaban h-100 w-100">
                                                <input class="form-check-input" type="radio" value="A" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_a'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="B" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_b'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="C" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_c'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="D" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_d'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>

                                        </ol>


                                    </li>
                                <?php endforeach; ?>
                            
                            <?php else:?>
                                <h3 class="text-center">No Data</h3>
                            <?php endif;?>
                                <?php if(!empty($dataSoal['logikaNalar'])) :?>
                                    <h5 class="m-3 m-lg-5">B. Logika Penalaran</h5>
                                <?php foreach ($dataSoal['logikaNalar'] as $data) : ?>
                                    <li class="mb-3">
                                        <div class="soal card bg-secondary p-2 mb-4 ms-1" style="text-align: justify;">

                                            <?= $data['soal'] ?>

                                        </div>
                                        <ol type="A" class="">
                                            <li class="list-item-jawaban h-100 w-100">
                                                <input class="form-check-input" type="radio" value="A" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_a'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="B" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_b'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="C" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_c'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="D" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_d'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>

                                        </ol>


                                    </li>
                                <?php endforeach; ?>
                            
                            <?php else:?>
                                <h3 class="text-center">No Data</h3>
                            <?php endif;?>
                                <?php if(!empty($dataSoal['gambar'])) :?>
                                    <h5 class="m-3 m-lg-5">C. Gambar / Spasial</h5>
                                <?php foreach ($dataSoal['gambar'] as $data) : ?>
                                    <li class="mb-3">
                                        <div class="soal card bg-secondary p-2 mb-4 ms-1" style="text-align: justify;">

                                            <?= $data['soal'] ?>

                                        </div>
                                        <ol type="A" class="">
                                            <li class="list-item-jawaban h-100 w-100">
                                                <input class="form-check-input" type="radio" value="A" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_a'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="B" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_b'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="C" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_c'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="D" name="<?= $data['id'] ?>" >
                                                    <?= $data['opsi_d'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>

                                        </ol>


                                    </li>
                                <?php endforeach; ?>
                            </ol>
                            <?php else:?>
                                <h3 class="text-center">No Data</h3>
                            <?php endif;?>

                            <?= form_close() ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="  d-block w-100 mt-3 ">
            <button class="btn w-25  left carousel-control bg-danger " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">Back</button>
            <button class="btn w-25  float-end  right  carousel-control bg-info" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">Next</button>
            <button id="soal-submit" class="btn bg-success w-25 float-end" type="submit">Submit</button>
        </div>
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

    <script>
        Scrollbar.init(document.querySelector('#cardSoal'))
    </script>

    <!-- model end  -->
<?= $this->endSection(); ?>