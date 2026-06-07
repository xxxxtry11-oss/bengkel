<!DOCTYPE html>
<html>
<head>

    <title>Dashboard Admin</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>

        body{
            background:#f3f3f3;
        }

        .navbar-custom{
            background:#1565f9;
            padding:15px;
            color:white;
        }

        .sidebar{
            background:white;
            border-radius:15px;
            padding:20px;
            box-shadow:0 2px 8px rgba(0,0,0,0.1);
        }

        .menu-card{
            background:white;
            border-radius:15px;
            padding:25px;
            box-shadow:0 2px 8px rgba(0,0,0,0.1);
        }

        .menu-item{
            border:1px solid #ddd;
            border-radius:10px;
            padding:20px;
            margin-bottom:15px;
        }

        footer{
            background:#1565f9;
            color:white;
            text-align:center;
            padding:15px;
            margin-top:50px;
        }

    </style>

</head>

<body>

<div class="navbar-custom">

    <div class="container d-flex justify-content-between align-items-center">

        <h3>Bengkel UMMAT</h3>

        <div>

            Halo, <?= $this->session->userdata('username') ?>

            <a href="<?= base_url('index.php/login/logout') ?>"
               class="btn btn-danger btn-sm ml-3">

               Logout

            </a>

        </div>

    </div>

</div>

<div class="container mt-4">

    <div class="row">

        <div class="col-md-3">

            <div class="sidebar text-center">

                <h3>Administrator</h3>

                <p>@admin</p>

                <span class="btn btn-success btn-sm mb-3">
                    ADMIN
                </span>

                <a href="<?= base_url('index.php/dashboard') ?>"
                   class="btn btn-primary btn-block mb-2">

                    Dashboard

                </a>

                <a href="<?= base_url('index.php/pelanggan') ?>"
                   class="btn btn-info btn-block mb-2">

                    Data Pelanggan

                </a>

                <a href="<?= base_url('index.php/kendaraan') ?>"
                   class="btn btn-warning btn-block mb-2">

                    Data Kendaraan

                </a>

            </div>

        </div>

        <div class="col-md-9">

            <div class="menu-card">

                <h1 class="mb-4 text-primary">

                    Menu Admin

                </h1>

                <div class="row">

                    <div class="col-md-4">

                        <div class="menu-item">

                            <h4>Kelola Pelanggan</h4>

                            <p>
                                Kelola data pelanggan bengkel.
                            </p>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="menu-item">

                            <h4>Kelola Kendaraan</h4>

                            <p>
                                Kelola kendaraan pelanggan.
                            </p>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="menu-item">

                            <h4>Laporan</h4>

                            <p>
                                Lihat laporan bengkel.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<footer>

    © 2026 Bengkel UMMAT

</footer>

</body>
</html>