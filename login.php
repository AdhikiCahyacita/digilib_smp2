<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="col-md-4 col-md-offset-4 form-register">

        <div class="outter-form-login">

            <form action="check-login.php" class="inner-login" method="post">
            <h3 class="text-center title-login">Login Anggota</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="nisn" placeholder="NISN" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                
                <input type="submit" class="btn btn-block btn-custom-green" value="LOGIN" />
                
                <div class="text-center forget">
                    <p>Belum Menjadi Anggota? Daftar <a href="form_registrasi.php">disini</a> </p>
                    <a href="petugas-login.php">Admin Login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>