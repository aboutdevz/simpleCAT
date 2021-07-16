<?=$this->extend('layout/master')?>

<?=$this->section('navItem')?>

<li class="nav-item dropdown me-4 ">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Peserta
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="#">Profil</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li class="logoutNav"><a class="dropdown-item text-danger" href="<?=base_url('Logout')?>">Logout</a></li>
    </ul>
</li>
    

<?=$this->endSection()?>