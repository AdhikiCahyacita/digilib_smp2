<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Registrasi</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="col-md-4 col-md-offset-4 form-register">

        <div class="outter-form-login">

            <form action="send_registration.php" class="inner-login" method="post">
            <h3 class="text-center title-login"> <b> Registrasi </b> </h3>
                
                <div class="form-group">
                    <input type="text" class="form-control" name="nisn" onkeypress="return number(event)" placeholder="NISN" required>
                </div>                

                <div class="form-group">
                    <input type="text" class="form-control" name="nama_anggota" placeholder="Nama" required>
                </div>

                <div class="form-group">
                    <table>
                     <tr rowspan="2">
                     <label> Jenis Kelamin </label> 
                      <td> <input type="radio" class="form-control" name="jenis_kelamin" value="Laki-laki" required> <p> Laki-laki </p> </td>
                      <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                      <td> <input type="radio" class="form-control" name="jenis_kelamin" value="Perempuan" required> <p> Perempuan </p> </td>
                     </tr>
                    </table>    
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="no_telp_anggota" onkeypress="return number(event)" placeholder="Nomor Telepon" required>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="email_anggota" placeholder="Email Anggota" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>

                <input type="submit" class="btn btn-block btn-custom-green" value="REGISTER" />
                <input type="reset" class="btn btn-block btn-danger" value="RESET" />
                
                <div class="text-center forget">
                    <p>Back To <a href="./login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Js untuk nomor -->
    <script type="text/javascript">
		function number(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>