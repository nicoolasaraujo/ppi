<?php

  $activePage = 'galeria';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Galeria</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/galeria.css">      
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">    
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="../js/galeria.js"></script>
</head>
    
<script>
  /* $(document).ready(function(){
    $(".center").find('tr').find('td').children().each(function(i){
      $(this).delay(400*i).fadeIn();
    });

  }); */
</script>
<script >
/* function onBorder(img)
{
    img.style.border='5px solid aqua';


}
function offBorder(img)
{
    img.style.border='none' ;


} */
</script>




  </head>
  <body>
      <?php include "navbar.php";?>
    <div class="container-fluid">
     
      <!-- <nav class="navbar  navbar-light" style="background-color: #E2DEDD ;">
        <div class="container-fluid">

          <div class="navbar-header">
            <a href="#" class="navbar-brand" style="color:black;">Clinica Medica</a>
          </div>

          <ul class="nav navbar-nav navbar navbar-light" style="background-color: #C6BEBD  ;">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="#">Galeria </a></li>
            <li><a href="#">Contato</a></li>
            <li><a href="#">Agendamento</a></li>
          </ul>

        </div>
      </nav> -->

    <div class="container-fluid">
      <h1 class="h1">Galeria</h1>
      <div class="center container-fluid">

        <table class="container-fluid" >
          <tbody>
            <tr>
              <td><img class="img-responsive" src="img/CasaFoto1.jpg" onmouseenter="onBorder(this)" onmouseleave="offBorder(this)" ></td>
              <div class="col-md-4">
                <td><img class="img-responsive" src="img/CasaFoto2.jpg" onmouseenter="onBorder(this)" onmouseleave="offBorder(this)"></td>
              </div>
              <td><img class="img-responsive" src="img/CasaFoto3.jpg" onmouseenter="onBorder(this)" onmouseleave="offBorder(this)"></td>
            </tr>

            <tr>
              <td><img class="img-responsive" src="img/CasaFoto4.jpg" onmouseenter="onBorder(this)" onmouseleave="offBorder(this)"></td>
              <td><img class="img-responsive" src="img/CasaFoto5.jpg" onmouseenter="onBorder(this)" onmouseleave="offBorder(this)"></td>
              <td><img class="img-responsive" src="img/CasaFoto6.jpg" onmouseenter="onBorder(this)" onmouseleave="offBorder(this)"></td>

            </tr>
          </tbody>

        </table>
      </div>

    </div>
    </div>
  </body>

</html>
