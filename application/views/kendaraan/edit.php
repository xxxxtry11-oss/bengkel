<!DOCTYPE html>
<html>
<head>

    <title>Edit Kendaraan</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body>

<div class="container mt-5">

    <h2>Edit Kendaraan</h2>

    <form method="post">

        <div class="form-group">

            <label>Pelanggan</label>

            <select name="id_pelanggan"
                    class="form-control">

                <?php foreach($pelanggan as $p): ?>

                    <option value="<?= $p->id_pelanggan ?>"
                    <?= $p->id_pelanggan == $kendaraan->id_pelanggan ? 'selected' : '' ?>>

                        <?= $p->nama_pelanggan ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

        <div class="form-group">

            <label>Merk Kendaraan</label>

            <input type="text"
                   name="merk_kendaraan"
                   value="<?= $kendaraan->merk_kendaraan ?>"
                   class="form-control">

        </div>

        <div class="form-group">

            <label>No Polisi</label>

            <input type="text"
                   name="no_polisi"
                   value="<?= $kendaraan->no_polisi ?>"
                   class="form-control">

        </div>

        <div class="form-group">

            <label>Warna</label>

            <input type="text"
                   name="warna"
                   value="<?= $kendaraan->warna ?>"
                   class="form-control">

        </div>

        <button type="submit"
                class="btn btn-primary">

            Update

        </button>

    </form>

</div>

</body>
</html>