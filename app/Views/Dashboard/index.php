<?= $this->extend('layout/master.php') ?>

<?= $this->section('main'); ?>
<?= view_cell('\App\Controllers\Layout::dashNav'); ?>
<div class="row ">
    <div class="col-12">

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-interval="false" data-bs-wrap="false" data-bs-ride="carousel">

            <div class="carousel-inner p-lg-5">
                <div class="carousel-item pt-5 active">
                    <div class="row h-25 text-center ">
                        <h2 class="align-self-end">Selamat Datang Admin</h2>
                    </div>
                    <hr>
                    <div class="row justify-content-center ">
                        <img class="" src="<?= imgAsset('appImg/fav.png') ?>" alt="" style="height: 200px; width: 200px;">

                        <span class="fs-2 text-center mt-5">Sistem Potensi Akademik</span>
                        <span class="fs-2 text-center">Universitas Nusa Putra</span>
                    </div>
                </div>

                <div class="carousel-item">

                    <div class="card w-100 p-lg-5 pt-3 rounded-3 mt-5  shadow-lg " style="max-height: 1000px;">

                        <p class="text-center display-4 mb-5">Daftar Mahasiswa</p>
                        <div class="btn-soal w-100 text-center mb-3">
                            <button class="btn bg-success">&uparrow; Import Data</button>
                            <button  id="tambahDataMahasiswa" data-tipe="tambah" class="btn flex-grow-1 bg-primary dataMahasiswa" >&plus;
                                Tambah Data Mahasiswa</button>
                            <button class="btn bg-info">&downarrow; Export Data</button>
                        </div>
                        <div class="table-wrapper table-responsive">


                            <table id="daftar-mahasiswa" class="display table  table-hover table-striped  w-100">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nim</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Program Studi</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php if (!empty($dataMahasiswa)):?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($dataMahasiswa as $data) : ?>

                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['nim']; ?></td>
                                            <td><?= $data['nama_mhs']; ?></td>
                                            <td><?= $data['jenis_kelamin']; ?></td>
                                            <td><?= $data['prodi']; ?></td>
                                            <td><?= $data['email']; ?></td>
                                            <td>
                                                <div class="btn-group ">
                                                    <button id="updateDataMahasiswa"  data-id="<?=$data['id']?>"  class="btn bg-success updateDataMahasiswa">Update</button>
                                                    <button  class="btn bg-danger hapusDataMahasiswa" data-id="<?=$data['id']?>">Hapus</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                    <?php else:?>
                                    <td class="text-center" colspan="7">No Data</td>
                                    <?php endif;?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card w-100 p-lg-5 pt-3 rounded-3 mt-5  shadow-lg ">

                        <p class="text-center display-4 mb-5">Daftar Soal</p>
                        <div class="btn-soal w-100 text-center mb-3">
                            <button  data-bs-toggle="modal" data-bs-target="#import-modal" class="btn bg-success">&uparrow; Import Data</button>
                            <button id="tambahDataSoal" class="btn bg-primary" data-bs-toggle="modal" data-bs-target="#soal-modal">&plus;
                                Tambah Soal </button>
                            <button class="btn bg-info">&downarrow; Export Data</button>
                        </div>
                        <div class="table-wrapper table-responsive">

                                    
                            <table id="daftar-soal" class="display table  table-hover table-striped  w-100">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Jenis Soal</th>
                                        <th>Soal</th>
                                        <th>Opsi A</th>
                                        <th>Opsi B</th>
                                        <th>Opsi C</th>
                                        <th>Opsi D</th>
                                        <th>Jawaban</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php if (!empty($dataSoal)):?>
                                    
                                    <?php foreach ($dataSoal as $data) : ?>
                                        <input type="hidden" name="id_soal" value="<?=$data['id']?>">
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['kategori'] ?></td>
                                            <td><?= $data['jenis_soal'] ?></td>
                                            <td><?= $data['soal'] ?></td>
                                            <td><?= $data['opsi_a'] ?></td>
                                            <td><?= $data['opsi_b'] ?></td>
                                            <td><?= $data['opsi_c'] ?></td>
                                            <td><?= $data['opsi_d'] ?></td>
                                            <td><?= $data['jawaban'] ?></td>
                                            <td><?= $data['status'] ?></td>
                                            <td>
                                                <div class="btn-group ">
                                                    <button id="update-soal" data-id="<?=$data['id']?>" type="submit" class="btn bg-success updateDataSoal">Update</button>
                                                    <button id="hapus-soal" class="btn bg-danger hapusDataSoal" data-id="<?=$data['id']?>">Hapus</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                    <?php else:?>
                                    <td class="text-center" colspan="42">No Data</td>
                                    <?php endif;?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card w-100 p-lg-5 pt-3 rounded-3 mt-5  shadow-lg ">

                        <p class="text-center display-4 mb-5">Hasil TPA</p>
                        <div class="btn-soal w-100 text-center mb-3">
                            <button class="btn bg-info">&downarrow; Export Data</button>
                        </div>
                        <div class="table-wrapper table-responsive">


                            <table id="daftar-tpa" class="display table  table-hover table-striped  w-100">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nim</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Tanggal Tes</th>
                                        <th>Skor TPA</th>
                                        <th>Rekomendasi Program SCP</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no=1;?>
                                    <?php foreach($dataHasil as $data):?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$data['nim']?></td>
                                        <td><?=$data['nama_mhs']?></td>
                                        <td>6 Juni 2021</td>
                                        <td><?=$data['skor']?></td>
                                        <td><?=$data['scp']?></td>
                                    </tr>
                                    <?php $no++;?>
                                    <?php endforeach;?>
                                
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="mahasiswa-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="#tambah-mahasiswa-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal-mahasiswa-modalLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
            </div>
            <div class="modal-body">
                <form id="formMahasiswa" enctype="multipart/form-data" method="POST" name="formMahasiswa">
                    <div class="form-group mt-3">
                        <label class="form-label" for=""><b>Profile</b> </label>
                        <input class="form-control" type="file" name="profile" id="profile" required>
                        <span class="form-text">masukkan foto profile</span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for=""><b>NIM</b> </label>
                        <input class="form-control" type="text" name="NIM" id="NIM" placeholder="Masukkan Nim Anda" required>
                        <span class="form-text">masukkan NIM</span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for=""><b>Nama</b> </label>
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Masukkan Nama Anda" required>
                        <span class="form-text">masukkan nama</span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for=""><b>password</b> </label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Masukkan password Anda" required>
                        <span class="form-text">masukkan password</span>
                    </div>
                    <label class="form-label" for=""><b>Jenis Kelamin</b> </label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kelamin" value="L" id="kelamin" required>

                        <span class="form-check-label">Laki - Laki</span>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kelamin" value="P" id="kelamin" required>

                        <span class="form-check-label">Perempuan</span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for=""><b>Program Studi</b> </label>
                        <select class="form-control" name="prodi" id="prodi">
                            <option value="0" selected>Pilih Program Studi</option>
                            <option value="Sistem Informasi">Sistem informasi</option>
                            <option value="Tataboga">Tataboga</option>
                            <option value="Komputer">Komputer</option>
                        </select>
                        <span class="form-text">masukkan prodi anda</span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for=""><b>Tanggal Lahir</b> </label>
                        <input class="form-control" type="date" name="ttl" id="ttl">
                        <span class="form-text">masukkan tanggal lahir anda</span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for=""><b>Email</b> </label>
                        <input class="form-control" type="email" name="email" id="email">
                        <span class="form-text">masukkan Email anda</span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for=""><b>No Hp</b></label>
                        <input class="form-control" type="tel" name="no_hp" id="no_hp">
                        <span class="form-text">masukkan No Telepon anda</span>
                    </div>





            </div>
            <div class="modal-footer">
                <div class="btn-group w-100 justify-content-end">
                    <button id="cancel" class="btn bg-danger" data-bs-dismiss="modal">Kembali</button>
                    <button id="submit-mahasiswa" type="submit" class="btn bg-success">simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal end -->

<!-- modal start -->
<div class="modal fade" id="soal-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="soal-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="soal-modalLabel">Tambah Soal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;">
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formSoal" enctype="multipart/form-data">
                    <div class="form-group mt-3">
                        <label class="form-label" for="jenis-soal"><b>Jenis</b> </label>
                        <select class="form-select" name="jenis-soal" id="jenis-soal-input" required>
                            <option value="" selected>Pilih Jenis</option>
                            <?php foreach ($jenisform as $jenis) : ?>
                                <option value="<?= $jenis['id'] ?>"><?= $jenis['jenis_soal'] ?></option>

                            <?php endforeach ?>
                        </select>
                        <span class="form-text">Pilih Jenis Soal</span>
                    </div>
                    <div class="form-group mt-3">
                        <label class="form-label" for="kategori-soal"><b>Kategori</b> </label>
                        <select class="form-select" name="kategori-soal" id="kategori-soal-input" required>
                            <option value="" selected>Pilih Kategori</option>
                            <?php foreach ($kategoriform as $kategori) : ?>
                                <option value="<?= $kategori['id'] ?>"><?= $kategori['kategori'] ?></option>

                            <?php endforeach ?>
                        </select>
                        <span class="form-text">Pilih Kategori Soal</span>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="soal" id="soal">
                        <label class="form-label" for="soal-container"><b>Soal</b> </label>

                        <div class="ql-editor" id="soal-container">
                            <p>Hello World!</p>
                            <p>Some initial <strong>bold</strong> text</p>
                            <p><br></p>
                        </div>
                        <span class="form-text">Tulislah Soal</span>


                    </div>
                    <div class="form-group">
                        <input type="hidden" name="opsiA" id="opsiA">
                        <label class="form-label" for="opsiA"><b>Opsi A</b> </label>
                        <div class="ql-editor" id="opsiA-container">
                            <p>Hello World!</p>
                            <p>Some initial <strong>bold</strong> text</p>
                            <p><br></p>
                        </div>
                        <span class="form-text">Masukkan Opsi A</span>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="soalB" id="soalB">
                        <label class="form-label" for="opsiB"><b>Opsi B</b> </label>
                        <div class="ql-editor" id="opsiB-container">
                            <p>Hello World!</p>
                            <p>Some initial <strong>bold</strong> text</p>
                            <p><br></p>
                        </div>
                        <span class="form-text">Masukkan Opsi B</span>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="opsiC" id="opsiC">
                        <label class="form-label" for="opsiC"><b>Opsi C</b> </label>
                        <div class="ql-editor" id="opsiC-container">
                            <p>Hello World!</p>
                            <p>Some initial <strong>bold</strong> text</p>
                            <p><br></p>
                        </div>
                        <span class="form-text">Masukkan Opsi C</span>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="opsiD" id="opsiD">
                        <label class="form-label" for="opsiD"><b>Opsi D</b> </label>
                        <div class="ql-editor" id="opsiD-container">
                            {"ops":[{"insert":"Hello World!\nSome initial "},{"attributes":{"bold":true},"insert":"bold"},{"insert":" text\n\n"}]}
                        </div>
                        <span class="form-text">Masukkan Opsi D</span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="jawaban-soal"><b>Jawaban</b> </label>
                        <select class="form-select" name="jawaban-soal" id="jawaban-soal" required>
                            <option value="" selected>Pilih Jawaban</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        <span class="form-text">Pilih Jawaban </span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="status-soal"><b>Status</b> </label>
                        <select class="form-select" name="status-soal" id="status-soal" required>
                            <option value="" selected>Pilih Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Mati">Mati</option>
                        </select>
                        <span class="form-text">Pilih Status </span>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group w-100 justify-content-end">
                    <button class="btn bg-danger" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn bg-success">simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- modal end -->


<!-- modal start -->

<div class="modal fade" id="tpa-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="#tambah-tpa-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="#tambah-tpa-modalLabel">Tambah Data TPA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
            </div>
            <div class="modal-body">
                <form action="" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="form-label" for="NIM-tpa"><b>NIM</b> </label>
                        <input class="form-control" type="text" name="NIM-tpa" id="NIM-tpa" placeholder="Masukkan Nim Anda" required>
                        <span class="form-text">masukkan NIM</span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="tanggal-ujian"><b>Tanggal Ujian</b> </label>
                        <input class="form-control" type="date" name="tanggal-ujian" id="tanggal-ujian">
                        <span class="form-text">masukkan tanggal Ujian anda</span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="skor-tpa"><b>Skor</b> </label>
                        <input class="form-control" type="text" name="skor-tpa" id="skor-tpa" placeholder="Masukkan Nim Anda" required>
                        <span class="form-text">masukkan Skor TPA</span>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <div class="btn-group w-100 justify-content-end">
                    <button class="btn bg-danger" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn bg-success">simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal end  -->



<!-- modal start  -->
<div class="modal fade" id="import-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="#tambah-mahasiswa-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="#modal-mahasiswa-modalLabel">Import</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('Test');?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-3">
                        <label class="form-label" for=""><b>file</b> </label>
                        <input class="form-control" type="file" name="file" id="file" required>
                        <span class="form-text text-danger">masukkan File yang sesuai format!!</span>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <div class="btn-group w-100 justify-content-end">
                    <button id="cancel" class="btn bg-danger" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn bg-success">simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- modal end  -->

<?= $this->endSection('main'); ?>