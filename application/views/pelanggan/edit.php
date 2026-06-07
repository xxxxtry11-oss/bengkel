<!DOCTYPE html>
<html>
<head>

    <title>Edit Pelanggan</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body>

<div class="container mt-5">

    <h2>Edit Pelanggan</h2>

    <form method="post">

        <div class="form-group">

            <label>Nama Pelanggan</label>

            <input type="text"
                   name="nama_pelanggan"
                   value="<?= $pelanggan->nama_pelanggan ?>"
                   class="form-control">

        </div>

        <div class="form-group">

            <label>No HP</label>

            <input type="text"
                   name="no_hp"
                   value="<?= $pelanggan->no_hp ?>"
                   class="form-control">

        </div>

        <div class="form-group">

            <label>Alamat</label>

            <textarea name="alamat"
                      class="form-control"><?= $pelanggan->alamat ?></textarea>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Update

        </button>

    </form>

</div>

</body>
</html>