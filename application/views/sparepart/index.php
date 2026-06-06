<!DOCTYPE html>
<html>
<head>
    <title>Data Sparepart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f4f4;
        }

        .navbar-custom{
            background:#1565f9;
            padding:20px;
        }

        .navbar-custom h2{
            color:white;
            margin:0;
            font-weight:bold;
        }

        .content-box{
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 2px 15px rgba(0,0,0,0.1);
            margin-top:60px;
            margin-bottom:60px;
        }

        .footer{
            background:#1565f9;
            color:white;
            text-align:center;
            padding:20px;
            margin-top:50px;
        }

    </style>

</head>
<body>

<nav class="navbar-custom">

    <div class="container d-flex justify-content-between">

        <h2>Bengkel UMMAT</h2>

        <div>
            <span class="text-white me-3">
                Halo, admin
            </span>

            <a href="#" class="btn btn-danger">
                Logout
            </a>
        </div>

    </div>

</nav>

<div class="container">

    <div class="content-box">

        <div class="d-flex justify-content-between mb-3">

            <h1>Data Sparepart</h1>

            <a href="<?= site_url('sparepart/create') ?>"
               class="btn btn-primary btn-lg">
                Tambah Sparepart
            </a>

        </div>

        <table class="table table-bordered">

            <thead class="table-primary">

                <tr>
                    <th>No</th>
                    <th>Kode Sparepart</th>
                    <th>Nama Sparepart</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th width="180">Aksi</th>
                </tr>

            </thead>

            <tbody>

            <?php $no=1; foreach($sparepart as $s): ?>

                <tr>

                    <td><?= $no++ ?></td>

                    <td><?= $s->kode_sparepart ?></td>

                    <td><?= $s->nama_sparepart ?></td>

                    <td>
                        Rp <?= number_format($s->harga,0,',','.') ?>
                    </td>

                    <td><?= $s->stok ?></td>

                    <td>

                        <a href="<?= site_url('sparepart/edit/'.$s->id) ?>"
                           class="btn btn-warning">
                            Edit
                        </a>

                        <a href="<?= site_url('sparepart/delete/'.$s->id) ?>"
                           onclick="return confirm('Yakin hapus data?')"
                           class="btn btn-danger">
                            Hapus
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<div class="footer">
    © Maju Jaya Motor
</div>

</body>
</html>