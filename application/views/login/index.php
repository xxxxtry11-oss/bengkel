<!DOCTYPE html>
<html>
<head>

    <title>Login Admin</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>

        body{
            background:#1565f9;
        }

        .login-box{
            width:400px;
            background:white;
            padding:30px;
            border-radius:15px;
            margin:auto;
            margin-top:120px;
            box-shadow:0 2px 10px rgba(0,0,0,0.2);
        }

    </style>

</head>

<body>

<div class="login-box">

    <h2 class="text-center mb-4">
        Login Admin
    </h2>

    <?php if($this->session->flashdata('error')): ?>

        <div class="alert alert-danger">

            <?= $this->session->flashdata('error') ?>

        </div>

    <?php endif; ?>

    <form method="post">

        <div class="form-group">

            <label>Username</label>

            <input type="text"
                   name="username"
                   class="form-control">

        </div>

        <div class="form-group">

            <label>Password</label>

            <input type="password"
                   name="password"
                   class="form-control">

        </div>

        <button type="submit"
                class="btn btn-primary btn-block">

            Login

        </button>

    </form>

</div>

</body>
</html>