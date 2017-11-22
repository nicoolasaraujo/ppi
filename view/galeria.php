<?php
  session_start();

  $activePage = 'galeria';
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Galeria</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/home.css">
      <link rel="stylesheet" href="css/galeria.css">
      <link rel="stylesheet" href="css/footer.css">
      <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
      <script src="../js/jquery-3.2.1.js"></script>
      <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
      <script src="../js/galeria.js"></script>
   </head>
   <body>
      <?php include "header.php";?>
      <?php include "navbar.php";?>
      <div class="container-fluid">
         <h1 class="h1">Galeria</h1>
         <div class="container">
            <div class="row">
               <div class="col-sm-4">
                  <img class="img-responsive img-fluid img-thumbnail" src="img/img1.jpeg" onmouseenter="onBorder(this)" onmouseleave="offBorder(this)" >
               </div>
               <div class="col-sm-4">
                  <img class="img-responsive img-fluid img-thumbnail" src="img/img2.jpg" onmouseenter="onBorder(this)" onmouseleave="offBorder(this)" >
               </div>
               <div class="col-sm-4">
                  <img class="img-responsive img-fluid img-thumbnail " src="img/img3.jpg" onmouseenter="onBorder(this)" onmouseleave="offBorder(this)" >
               </div>
            </div>
            <div class="row">
               <div class="col-sm-4">
                  <img class="img-responsive img-fluid img-thumbnail" src="img/img4.jpg" onmouseenter="onBorder(this)" onmouseleave="offBorder(this)" >
               </div>
               <div class="col-sm-4">
                  <img class="img-responsive img-fluid img-thumbnail" src="img/img5.jpg" onmouseenter="onBorder(this)" onmouseleave="offBorder(this)" >
               </div>
               <div class="col-sm-4">
                  <img class="img-responsive img-fluid img-thumbnail" src="img/img6.jpg" onmouseenter="onBorder(this)" onmouseleave="offBorder(this)" >
               </div>
            </div>
         </div>
         <div class="container">
            <div class="embed-responsive embed-responsive-16by9 ">
               <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/92VHPEJBV7k"></iframe>
            </div>
         </div>
      </div>
      <?php include "footer.php";?>
   </body>
</html>
