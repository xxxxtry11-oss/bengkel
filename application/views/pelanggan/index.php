<!DOCTYPE html>
<html>
<head>

    <title>Data Pelanggan</title>

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

        .card-custom{
            background:white;
            border-radius:15px;
            padding:25px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
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

    <div class="container d-flex justify-content-between">

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

<div class="container mt-5">

    <div class="card-custom">

        <div class="d-flex justify-content-between mb-3">

            <h2>Data Pelanggan</h2>

            <a href="<?= base_url('index.php/pelanggan/tambah') ?>"
               class="btn btn-primary">

               Tambah Pelanggan

            </a>

        </div>

        <table class="table table-bordered table-hover">

            <thead class="bg-primary text-white">

                <tr>

                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php $no=1; foreach($pelanggan as $p): ?>

                <tr>

                    <td><?= $no++ ?></td>
                    <td><?= $p->nama_pelanggan ?></td>
                    <td><?= $p->no_hp ?></td>
                    <td><?= $p->alamat ?></td>

                    <td>

                        <a href="<?= base_url('index.php/pelanggan/edit/'.$p->id_pelanggan) ?>"
                           class="btn btn-warning btn-sm">

                           Edit

                        </a>

                        <a href="<?= base_url('index.php/pelanggan/hapus/'.$p->id_pelanggan) ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus?')">

                           Hapus

                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<footer>

    © 2026 Bengkel UMMAT

</footer>

</body>
</html>