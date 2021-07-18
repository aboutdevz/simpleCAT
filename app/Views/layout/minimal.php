<?php

$session = \Config\Services::session();
$dataMhs = $session->credential['dataMhs'];
?>

<!doctype html>
<html lang="en" id="rootHtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <title>Login</title>
</head>

<body>
    <div class="container-fluid ">


        <?= $this->renderSection('minimal') ?>


    </div>
    
    

    <script src="<?=base_url('js/bootstrap.min.js');?>"></script>
</body>

</html>