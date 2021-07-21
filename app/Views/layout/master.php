<!doctype html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="assets/node_modules/quill/dist/quill.core.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/node_modules/quill/dist/quill.snow.css">
    
    <link rel="stylesheet" type="text/css" href="assets/data_table/datatables.min.css" />

    <link rel="stylesheet" href="assets/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/data_table/datatables.min.js"></script>

    <style>
        .loaderContainer {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            position: fixed;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader {
            text-align: center;
            vertical-align: middle;
            display: flex;
            padding: 150px;

        }

        .loader span {
            display: block;
            width: 20px;
            height: 20px;
            background: #770042ff;
            border-radius: 50%;
            margin: 0 5px;
        }

        .loader span:nth-child(2) {
            background: rgb(179, 34, 114);
        }

        .loader span:nth-child(3) {
            background: rgb(214, 66, 148);
        }

        .loader span:nth-child(4) {
            background: rgb(253, 122, 194);
        }

        .loader span:not(:last-child) {
            animation: animate 1.5s linear infinite;
        }

        @keyframes animate {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(30px);
            }
        }

        .loader span:last-child {
            animation: jump 1.5s ease-in-out infinite;
        }

        @keyframes jump {
            0% {
                transform: translate(0, 0);
            }

            10% {
                transform: translate(10px, -10px);
            }

            20% {
                transform: translate(20px, 10px);
            }

            30% {
                transform: translate(30px, -50px);
            }

            70% {
                transform: translate(-150px, -50px);
            }

            80% {
                transform: translate(-140px, 10px);
            }

            90% {
                transform: translate(-130px, -10px);
            }

            100% {
                transform: translate(-120px, 0);
            }
        }
    </style>

    <title><?= esc($title) ?></title>
</head>

<body class="d-flex flex-column">

    <div class="loaderContainer">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>



    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistem Tes Potensi Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav w-100 mb-2 justify-content-end mb-lg-0 dropstart">
                   
                    <?= $this->renderSection('navItem'); ?>
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
            <span class="badge bg-light text-dark">&copy; made with &hearts; by <a class="text-decoration-none" href="https://github.com/aboutdevz/">{isi nama}</a> </span>
        </div>
    </footer>
    <!-- footer end -->



    

    <script src="assets/node_modules/smooth-scrollbar/dist/smooth-scrollbar.js"></script>
    <script src="assets/node_modules/highlight.js/highlight.min.js"></script>
    <script src="assets/node_modules/quill/dist/quill.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="assets/node_modules/timerjs/dist/easytimer.min.js"></script>
    <script src="assets/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/quillsetup.js"></script>
    <script>
        $(window).on('load', function() {
            $('.loaderContainer').fadeOut('slow');
        });
        Scrollbar.initAll();
    </script>
</body>

</html>