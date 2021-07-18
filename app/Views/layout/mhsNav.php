<?=$this->extend('layout/master')?>

<?=$this->section('navItem')?>

<li class="nav-item dropdown me-4 ">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Peserta
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Profil</button></li>
        
        <li>
            <hr class="dropdown-divider">
        </li>
        <li class="logoutNav"><a class="dropdown-item text-danger" href="<?=base_url('Logout')?>">Logout</a></li>
    </ul>
</li>
    

<?=$this->endSection()?>