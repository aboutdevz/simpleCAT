<?= $this->extend('layout/master.php') ?>

<?= $this->section('main'); ?>
<?= view_cell('\App\Controllers\Layout::mhsNav'); ?>
<div class="row mt-lg-4">


    <div class="soal-container mt-4  col-12  pt-0 ">
        <div class="bg-primary text-white px-4">
            <small class="  word-wrap fs-3 fw-light w-100 p-lg-4">Soal Logika / Verbal / Kuantitatif</small>
        </div>
        <div class="card m " style="min-height: 80vh; max-height: 80vh;" data-scrollbar="true">


            <div class="card-body bg-white ps-0 p-lg-3 ">


                <div id="carouselExampleIndicators" class="carousel slide" data-bs-interval="false" data-bs-wrap="false" data-bs-ride="carousel">

                    <div class="carousel-inner ps-lg-2">

                        <div class="carousel-item active">
                            <?= form_open('Soal/submit') ?>
                            <?= csrf_field() ?>
                            <ol class="list-contain">

                                <?php foreach ($dataSoal as $data) : ?>
                                    <li class="mb-3">
                                        <div class="soal card bg-light p-2 mb-4 ms-1" style="text-align: justify;">

                                            <?= $data['soal'] ?>

                                        </div>
                                        <ol type="A" class="">
                                            <li class="list-item-jawaban h-100 w-100">
                                                <input class="form-check-input" type="radio" value="A" name="<?= $data['id'] ?>" id="input-jawaban" >
                                                    <?= $data['opsi_a'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="B" name="<?= $data['id'] ?>" id="input-jawaban" >
                                                    <?= $data['opsi_b'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="C" name="<?= $data['id'] ?>" id="input-jawaban" >
                                                    <?= $data['opsi_c'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>
                                            <li class="list-item-jawaban h-100 w-100"><input class="form-check-input" type="radio" value="D" name="<?= $data['id'] ?>" id="input-jawaban" >
                                                    <?= $data['opsi_d'] ?>
                                                <label class="form-check-label" for="input-jawaban">
                                                </label>
                                            </li>

                                        </ol>


                                    </li>
                                <?php endforeach; ?>
                            </ol>


                            <?= form_close() ?>
                        </div>
                        <div class="carousel-item">
                            <ol class="list-contain">
                                <li>
                                    <div class="soal card bg-light p-2 mb-4 ms-1" style="text-align: justify;">

                                        Halo Dunia Halo DuniaHalo DuniaHalo DuniaHalo DuniaHalo DuniaHalo
                                        DuniaHalo DuniaHalo DuniaHalo DuniaHalo DuniaHalo Dunia

                                    </div>
                                    <ol type="A" class="">
                                        <li class="list-item-jawaban w-100">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </li>
                                        <li class="list-item-jawaban w-100"><input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </li>
                                        <li class="list-item-jawaban w-100"><input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </li>
                                        <li class="list-item-jawaban w-100"><input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </li>

                                    </ol>

                                </li>
                            </ol>
                        </div>
                        <div class="carousel-item">
                            <ol class="list-contain">
                                <li>
                                    <div class="soal card bg-light p-2 mb-4 ms-1" style="text-align: justify;">

                                        Halo Dunia Halo DuniaHalo DuniaHalo DuniaHalo DuniaHalo DuniaHalo
                                        DuniaHalo DuniaHalo DuniaHalo DuniaHalo DuniaHalo Dunia

                                    </div>
                                    <ol type="A" class="">
                                        <li class="list-item-jawaban w-100">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </li>
                                        <li class="list-item-jawaban w-100"><input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </li>
                                        <li class="list-item-jawaban w-100"><input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </li>
                                        <li class="list-item-jawaban w-100"><input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </li>

                                    </ol>

                                </li>
                            </ol>
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

<?= $this->endSection(); ?>