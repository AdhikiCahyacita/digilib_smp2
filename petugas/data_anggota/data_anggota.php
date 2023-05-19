<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Panel</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

<div id="container">

<main role="main" class="col-md-auto ml-sm-auto col-lg-12 ">

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Anggota Perpustakaan </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nomor</th>
                    <th>NISN</th>
                    <th>Nama Anggota</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                <tbody>
                
                <?php
                require("lib/lib_anggota.php");

                $no   = 0;
                $Lib  = new Library();
                $show = $Lib->showAnggota();

                while($data = $show->fetch(PDO::FETCH_LAZY)){
                    $no++;
                    echo "
                    <tr>
                        <th>$no </th>
                        <td>$data->nisn</td>
                        <td>$data->nama_anggota</td>
                        <td>$data->jenis_kelamin</td>
                        <td>$data->email_anggota</td>
                        <td>$data->no_telp_anggota</td>
                        <td>$data->alamat</td>
                        <td><a class='btn btn-info' href='edit_anggota.php?id_anggota=$data->id_anggota' target='frmMain'>Edit</td>
                        <td><a class='btn btn-danger' href='data_anggota.php?delete=$data->id_anggota'>Delete</a></td>
                    </tr>";
                };
                ?>

                <?php
                if(isset($_GET['delete'])){
                $del = $Lib->deleteAnggota($_GET['delete']);

                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data_anggota.php" target="frmMain">';

                }
                ?>

                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Perpustakaan SMP N 2 Giritontro</div>
        </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../assets/vendor/chart.js/Chart.min.js"></script>
  <script src="../assets/vendor/datatables/jquery.dataTables.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../assets/js/demo/datatables-demo.js"></script>
  <script src="../assets/js/demo/chart-area-demo.js"></script>

</main>
</div>

</body>

</html>
