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

            <form action="petugas-check.php" class="inner-login" method="post">
            <h3 class="text-center title-login">Login Admin</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="nip" placeholder="Nomor Induk Pegawai" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                
                <input type="submit" class="btn btn-block btn-custom-green" value="LOGIN" />
                <input type="reset" class="btn btn-block btn-danger" value="RESET" />

            </form>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>