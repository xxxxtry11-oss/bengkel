<!DOCTYPE html>
<html>
<head>
    <title>Edit Sparepart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header bg-warning">
            <h3>Edit Sparepart</h3>
        </div>

        <div class="card-body">

            <form action="<?= site_url('sparepart/update/'.$sparepart->id) ?>"
                  method="post">

                <div class="mb-3">
                    <label>Kode Sparepart</label>
                    <input type="text"
                           name="kode_sparepart"
                           class="form-control"
                           value="<?= $sparepart->kode_sparepart ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label>Nama Sparepart</label>
                    <input type="text"
                           name="nama_sparepart"
                           class="form-control"
                           value="<?= $sparepart->nama_sparepart ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number"
                           name="harga"
                           class="form-control"
                           value="<?= $sparepart->harga ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number"
                           name="stok"
                           class="form-control"
                           value="<?= $sparepart->stok ?>"
                           required>
                </div>

                <button type="submit"
                        class="btn btn-primary">
                    Update
                </button>

                <a href="<?= site_url('sparepart') ?>"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>