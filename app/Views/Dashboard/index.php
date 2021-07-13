<?= $this->extend('layout/master.php') ?>

<?= $this->section('main'); ?>
<?=view_cell('\App\Controllers\Layout::dashNav');?>
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
                        <img class="rounded-circle" src="<?= imgAsset('appImg/fav.png') ?>" alt="" style="height: 200px; width: 200px;">

                        <span class="fs-2 text-center mt-5">Sistem Potensi Akademik</span>
                        <span class="fs-2 text-center">Universitas Nusa Putra</span>
                    </div>
                </div>

                <div class="carousel-item">

                    <div class="card w-100 p-lg-5 pt-3 rounded-3 mt-5  shadow-lg " style="max-height: 1000px;">

                        <p class="text-center display-4 mb-5">Daftar Mahasiswa</p>
                        <div class="btn-soal w-100 text-center mb-3">
                            <button class="btn  bg-success">&uparrow; Import Data</button>
                            <button class="btn flex-grow-1   bg-primary" data-bs-toggle="modal" data-bs-target="#mahasiswa-modal">&plus;
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
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                        <td>$86,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card w-100 p-lg-5 pt-3 rounded-3 mt-5  shadow-lg ">

                        <p class="text-center display-4 mb-5">Daftar Soal</p>
                        <div class="btn-soal w-100 text-center mb-3">
                            <button class="btn bg-success">&uparrow; Import Data</button>
                            <button class="btn bg-primary" data-bs-toggle="modal" data-bs-target="#soal-modal">&plus;
                                Tambah Soal </button>
                            <button class="btn bg-info">&downarrow; Export Data</button>
                        </div>
                        <div class="table-wrapper table-responsive">


                            <table id="daftar-soal" class="display table  table-hover table-striped  w-100">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
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
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>6</td>
                                        <td>2</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2</td>
                                        <td>$170,750</td>
                                        <td>$170,750</td>
                                        <td>$170,750</td>
                                        <td>$170,750</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2</td>
                                        <td>2009/01/12</td>
                                        <td>2009/01/12</td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                        <td>$86,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card w-100 p-lg-5 pt-3 rounded-3 mt-5  shadow-lg ">

                        <p class="text-center display-4 mb-5">Hasil TPA</p>
                        <div class="btn-soal w-100 text-center mb-3">
                            <button class="btn bg-success">&uparrow; Import Data</button>
                            <button class="btn bg-primary" data-bs-toggle="modal" data-bs-target="#tpa-modal">&plus;
                                Tambah Data TPA</button>
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
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>6</td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="mahasiswa-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="#tambah-mahasiswa-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="#tambah-mahasiswa-modalLabel">Tambah Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: white;"></button>
                </div>
                <div class="modal-body">
                    <form action="" enctype="multipart/form-data">
                        <div class="form-group mt-3">
                            <label class="form-label" for=""><b>Profile</b> </label>
                            <input class="form-control" type="file" name="profile" id="profile" required>
                            <span class="form-text">masukkan foto profile</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for=""><b>NIM</b> </label>
                            <input class="form-control" type="text" name="NIM" id="NIM" placeholder="Masukkan Nim Anda"
                                required>
                            <span class="form-text">masukkan NIM</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for=""><b>Nama</b> </label>
                            <input class="form-control" type="text" name="nama" id="nama"
                                placeholder="Masukkan Nama Anda" required>
                            <span class="form-text">masukkan nama</span>
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
                                <option value="0" selected>Masukkan Prodi</option>
                                <option value="" selected>Masukkan Prodi</option>
                                <option value="" selected>Masukkan Prodi</option>
                            </select>
                            <span class="form-text">masukkan prodi anda</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for=""><b>Tanggal Lahir</b> </label>
                            <input class="form-control" type="date" name="tanggalLahir" id="tanggalLahir">
                            <span class="form-text">masukkan tanggal lahir anda</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for=""><b>Email</b> </label>
                            <input class="form-control" type="email" name="tanggalLahir" id="tanggalLahir">
                            <span class="form-text">masukkan Email anda</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for=""><b>No Hp</b></label>
                            <input class="form-control" type="tel" name="tanggalLahir" id="tanggalLahir">
                            <span class="form-text">masukkan No Telepon anda</span>
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

    <!-- modal end -->

    <!-- modal start -->
    <div class="modal fade" id="soal-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="soal-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="soal-modalLabel">Tambah Soal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="color: white;">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="form-soal-import" enctype="multipart/form-data">
                            <div class="form-group mt-3">
                                <label class="form-label" for="kategori-soal"><b>Kategori</b> </label>
                                <select class="form-select" name="kategori-soal" id="kategori-soal-input" required>
                                    <option value="" selected>Pilih Kategori</option>
                                    <option value="">kategori</option>
                                    <option value="">kategori</option>
                                    <option value="">kategori</option>
                                </select>
                                <span class="form-text">Pilih Kategori Soal</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="soal-container"><b>Soal</b> </label>


                                <div class="ql-editor" id="soal-container">
                                    <p>Hello World!</p>
                                    <p>Some initial <strong>bold</strong> text</p>
                                    <p><br></p>
                                </div>
                                <span class="form-text">Tulislah Soal</span>


                            </div>
                            <div class="form-group">
                                <label class="form-label" for="opsiA"><b>Opsi A</b> </label>
                                <div class="ql-editor" id="opsiA-container">
                                    <p>Hello World!</p>
                                    <p>Some initial <strong>bold</strong> text</p>
                                    <p><br></p>
                                </div>
                                <span class="form-text">Masukkan Opsi A</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="opsiB"><b>Opsi B</b> </label>
                                <div class="ql-editor" id="opsiB-container">
                                    <p>Hello World!</p>
                                    <p>Some initial <strong>bold</strong> text</p>
                                    <p><br></p>
                                </div>
                                <span class="form-text">Masukkan Opsi B</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="opsiC"><b>Opsi C</b> </label>
                                <div class="ql-editor" id="opsiC-container">
                                    <p>Hello World!</p>
                                    <p>Some initial <strong>bold</strong> text</p>
                                    <p><br></p>
                                </div>
                                <span class="form-text">Masukkan Opsi C</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="opsiD"><b>Opsi D</b> </label>
                                <div class="ql-editor" id="opsiD-container">
                                    <p>Hello World!</p>
                                    <p>Some initial <strong>bold</strong> text</p>
                                    <p><br></p>
                                </div>
                                <span class="form-text">Masukkan Opsi D</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="jawaban-soal"><b>Jawaban</b> </label>
                                <select class="form-select" name="jawaban-soal" id="jawaban-soal" required>
                                    <option value="" selected>Pilih Jawaban</option>
                                    <option value="A" >A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                                <span class="form-text">Pilih Status </span>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="status-soal"><b>Status</b> </label>
                                <select class="form-select" name="status-soal" id="status-soal" required>
                                    <option value="" selected>Pilih Status</option>
                                    <option value="0" >Aktif</option>
                                    <option value="">Mati</option>
                                </select>
                                <span class="form-text">Pilih Jawaban </span>
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
    <!-- modal end -->


    <!-- modal start -->

    <div class="modal fade" id="tpa-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="#tambah-tpa-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="#tambah-tpa-modalLabel">Tambah Data TPA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: white;"></button>
                </div>
                <div class="modal-body">
                    <form action="" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label class="form-label" for="NIM-tpa"><b>NIM</b> </label>
                            <input class="form-control" type="text" name="NIM-tpa" id="NIM-tpa" placeholder="Masukkan Nim Anda"
                                required>
                            <span class="form-text">masukkan NIM</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="tanggal-ujian"><b>Tanggal Ujian</b> </label>
                            <input class="form-control" type="date" name="tanggal-ujian" id="tanggal-ujian">
                            <span class="form-text">masukkan tanggal Ujian anda</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="skor-tpa"><b>Skor</b> </label>
                            <input class="form-control" type="text" name="skor-tpa" id="skor-tpa" placeholder="Masukkan Nim Anda"
                                required>
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

<?= $this->endSection('main'); ?>