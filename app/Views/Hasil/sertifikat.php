<?= $this->extend('layout/minimal.php') ?>

<?= $this->section('minimal'); ?>
<div class="card  rounded-3 shadow-lg mt-2 p-3" id="sertifikat">
    <div class="row">
        <div class="col-1">
            <img class=" border-0" src="<?=imgAsset('appImg/fav.png')?>" alt="logo" style="height: auto; width:80px;">
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
            <div class="row">
                <div class="col-4">

                    <img class="img-thumbnail" src="<?=$foto?>" alt="mahasiswa foto" style="height:auto;width:auto">
                </div>
                <div class="col-8">
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
        <div class="col-4 d-flex">
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
<script>
    function baseUrl(value) {
    return window.location.protocol + "//" + window.location.host + "/" + value;
  }

    window.print();
    window.onafterprint = function(){
    window.location.href = baseUrl('Logout');
}
</script>
<?= $this->endSection('minimal'); ?>