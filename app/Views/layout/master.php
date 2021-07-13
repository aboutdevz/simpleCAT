<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.min.css'); ?>">
    <link href="<?= base_url('assets/node_modules/quill/dist/quill.core.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/node_modules/quill/dist/quill.snow.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/node_modules/quill/dist/quill.bubble.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/data_table/datatables.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/node_modules/katex/dist/katex.min.css') ?>">
    <link rel="stylesheet" href="<?=base_url('public/css/style.css');?>">
    <style>
    
    </style>
    <title><?=esc($title)?></title>
</head>

<body class="d-flex flex-column">

    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistem Tes Potensi Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav w-100 mb-2 justify-content-end mb-lg-0 dropstart" >
                        <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul> -->
                        <?=$this->renderSection('navItem');?>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- navbar end -->





    <!-- content start -->
    <div class="container-fluid p-0 p-lg-3">


        <?= $this->renderSection("main"); ?>


    </div>
        
    <!-- footer start -->

    <footer class="footer mt-5 bg-primary">
        <div class="container">
          <span class="badge bg-light text-dark">&copy; made with &hearts; by <a class="text-decoration-none"
              href="https://github.com/aboutdevz/">{isi nama}</a> </span>
        </div>
      </footer>
    <!-- footer end -->

    <script src="<?= base_url('assets/node_modules/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?=base_url('public/js/screen.js');?>"></script>
    <script src="<?=base_url('public/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('assets/node_modules/smooth-scrollbar/dist/smooth-scrollbar.js'); ?>"></script>
    <script src="<?=base_url('assets/node_modules/highlight.js/highlight.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/data_table/datatables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/node_modules/katex/dist/katex.min.js'); ?>"></script>
    <script src="<?= base_url('assets/node_modules/katex/contrib/auto-render/auto-render.js'); ?>"
        onload="renderMathInElement(document.body);"></script>
    <script src="<?= base_url('assets/node_modules/quill/dist/quill.js'); ?>"></script>
    <script src="<?=base_url('public/js/bootstrap.min.js');?>"></script>

    <script src="<?=base_url('public/js/script.js');?>"></script>
    <script src="<?=base_url('public/js/quillsetup.js');?>"></script>
    <script>
        Scrollbar.initAll();

    </script>
</body>

</html>