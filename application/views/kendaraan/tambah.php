<!DOCTYPE html>
<html>
<head>

    <title>Tambah Kendaraan</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body>

<div class="container mt-5">

    <h2>Tambah Kendaraan</h2>

    <form method="post">

        <div class="form-group">

            <label>Pelanggan</label>

            <select name="id_pelanggan"
                    class="form-control"
                    required>

                <option value="">-- Pilih Pelanggan --</option>

                <?php foreach($pelanggan as $p): ?>

                    <option value="<?= $p->id_pelanggan ?>">

                        <?= $p->nama_pelanggan ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

        <div class="form-group">

            <label>Merk Kendaraan</label>

            <input type="text"
                   name="merk_kendaraan"
                   class="form-control"
                   required>

        </div>

        <div class="form-group">

            <label>No Polisi</label>

            <input type="text"
                   name="no_polisi"
                   class="form-control"
                   required>

        </div>

        <div class="form-group">

            <label>Warna</label>

            <input type="text"
                   name="warna"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Simpan

        </button>

    </form>

</div>

</body>
</html>