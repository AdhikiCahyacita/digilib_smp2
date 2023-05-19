<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
 
 <script type="text/javascript">
            
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          var originalAddEventListener = EventTarget.prototype.addEventListener,
                    oldWidth = window.innerWidth;

                EventTarget.prototype.addEventListener = function (eventName, eventHandler, useCapture) {
                    if (eventName === "resize") {
                        originalAddEventListener.call(this, eventName, function (event) {
                            if (oldWidth === window.innerWidth) {
                                return;
                            }
                            else if (oldWidth !== window.innerWidth) {
                                oldWidth = window.innerWidth;
                            }
                            if (eventHandler.handleEvent) {
                                eventHandler.handleEvent.call(this, event);
                            }
                            else {
                                eventHandler.call(this, event);
                            };
                        }, useCapture);
                    }
                    else {
                        originalAddEventListener.call(this, eventName, eventHandler, useCapture);
                    };
                };
            };
            
        </script>

<script type="text/javascript">

$(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 10 ) {
            $('.navbar').addClass('active');
        } else {
            $('.navbar').removeClass('active');
        }
    });
});

</script>

    <title>DIGILIB SMP 2 GIRITONTRO &copy;</title>
  </head>
  <body>

  <div class="header">
    <nav class="navbar navbar-expand-lg fixed-top py-3 mt-3">
        <div class="container">
        <a href="#" class="navbar-brand text-uppercase font-weight-bold">DIGILIB SMP 2 GIRITONTRO</a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="#" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">About</a></li>
                    <li class="nav-item"><a href="#buku" class="nav-link text-uppercase font-weight-bold">Buku</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link text-uppercase font-weight-bold">Contact</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link text-uppercase font-weight-bold">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>


    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Judul</a>
      <a class="dropdown-item" href="#">Pengarang</a>
      <a class="dropdown-item" href="#">Penerbit</a>
      <div role="separator" class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </div>
</div>

</div>

<div class="container">
<div class="card-deck mb-5">
<div class="row col-md">

<?php
require("petugas/data_buku/lib/lib_buku.php");
$Lib = new lib_buku();
$show = $Lib->showBuku();
while($data = $show->fetch(PDO::FETCH_OBJ)){

echo '

<section id="buku">
<div class="col-md-12 offset-md-3 ">

<div class="card mb-3">
    <img src="petugas/assets/images/'.$data->gambar.'" class="card-img-top " width="140px" height="140px" alt="...">
    <div class="card-body">
      <h5 class="card-title">'.$data->judul_buku.'</h5>
      <p class="card-text"><small class="text-muted"> Pengarang: '.$data->nama_pengarang.' </small></p>
      
      <p class="card-text">'.$data->nama_kategori.'</p>
      <p class="card-text"><small class="text-muted">Tahun terbit: '.$data->tahun_terbit .'</small></p>
      
    <a href="data_satuan.php?id_buku='.$data->id_buku.'" class="btn btn-primary">Lihat Selengkapnya</a
    </div>
</div>

</div>


</section>
'
;
};
?>

</div>
</div>
</div>

<br><br>
  <section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto text-center mt-5">
        <h1>SMP N 2 Giritontro</h1>
        <hr class="my-4">
        <p>Jl. Raya Giritontro-Pracimantoro, Dungklepu Kulon, Giritontro, Kabupaten Wonogiri, Jawa Tengah 57676</p>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 ml-auto text-center mb-5">
      <p>  <a target="_blank" href="https://api.whatsapp.com/send?phone=628112637734 ">08112637734 </p>
      </div>
      <div class="col-lg-4 mr-auto text-center">
        <p>
          <a href="mailto: smpn2gro@yahoo.com "> 	smpn2gro@yahoo.com </a>
        </p>
      </div>
      <div class="col-lg-4 mr-auto text-center">
            <p>
              <a target="_blank" href="https://www.instagram.com/esperogro/">Instagram Kami</a>
            </p>
      </div>

    </div>
  </div>
</section>

<footer class="py-3 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Adhiki Cahyacita Eknanda 2023</p>
  </div>
</footer>


</body>
</html>