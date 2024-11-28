<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>REGISTER | BERITA KITA</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/style.css">
</head>
<body>
<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default panel-login">
            <div class="panel-heading">
                <h3>REGISTER</h3>
            </div>
            <div class="panel-body">
                <!-- Tampilkan error jika ada -->
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger">
                        <?php
                        if ($_GET['error'] == 1) echo "Semua field harus diisi.";
                        if ($_GET['error'] == 2) echo "Password dan Konfirmasi Password tidak cocok.";
                        if ($_GET['error'] == 3) echo "Username sudah terdaftar.";
                        if ($_GET['error'] == 4) echo "Terjadi kesalahan saat menyimpan data.";
                        ?>
                    </div>
                <?php } ?>
                <form action="prosesRegister.php" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary">REGISTER <i class="fa fa-user-plus"></i></button>
                    </div>
                </form>
                <p class="text-center">
                    Sudah punya akun? <a href="index.php">Login di sini</a>.
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
