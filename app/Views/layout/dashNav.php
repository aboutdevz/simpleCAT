<?=$this->extend('layout/master')?>

<?=$this->section('navItem')?>
<ul class="navbar-nav w-100 mb-2 mb-lg-0 dropstart">
    <li class="nav-item">
        <a type="button" class="nav-link active" aria-current="page" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0">Home</a>
    </li>
    <li class="nav-item ">
        <a type="button" id="admin-mahasiswa-tab" class="nav-link" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1">Daftar Mahasiswa</a>
    </li>
    <li class="nav-item ">
        <a type="button" id="admin-soal-tab" class="nav-link" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2">Daftar Soal</a>
    </li>
    <li class="nav-item me-auto">
        <a type="button" id="admin-tpa-tab" class="nav-link" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3">Daftar Hasil TPA</a>
    </li>
    <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
        </a>
        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
            <li>
                <hr class="dropdown-divider">
            </li>
            <li class="logoutNav"><a class="dropdown-item text-danger" href="<?=base_url('Logout')?>">Logout</a></li>
        </ul>
    </li>

</ul>
<?=$this->endSection()?>