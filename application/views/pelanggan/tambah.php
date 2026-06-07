<!DOCTYPE html>
<html>
<head>

    <title>Tambah Pelanggan</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body>

<div class="container mt-5">

    <h2>Tambah Pelanggan</h2>

    <form action="" method="post">

        <div class="form-group">

            <label>Nama Pelanggan</label>

            <input type="text"
                   name="nama_pelanggan"
                   class="form-control"
                   required>

        </div>

        <div class="form-group">

            <label>No HP</label>

            <input type="text"
                   name="no_hp"
                   class="form-control"
                   required>

        </div>

        <div class="form-group">

            <label>Alamat</label>

            <textarea name="alamat"
                      class="form-control"
                      required></textarea>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Simpan

        </button>

    </form>

</div>

</body>
</html>