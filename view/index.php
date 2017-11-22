<?php

session_start();
$activePage = 'home';
$flag = null;
if(isset($_GET['Message'])){
  $flag = $_GET['Message'];
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Home</title>



<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../js/jquery-3.2.1.js"></script>
<script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<!-- <script src="../js/galeria.js"></script> -->
<script src="../js/home.js"></script>



</head>

<body>

  <?php include "header.php";?>
  <?php include "navbar.php";?>
  <div class="container-fluid">


  <h1 class="h1 clinica">Cheap Clínica</h1>

  <div class="block center">
      <img class="img-responsive " src="img/imgClinica.jpg" >
    </div>

    <div class="block ">
      <h2 class="h2 showornot pointer">Sobre nós</h2>
      <div class="content" style="display: none;">
        <p class="container">
        Somos uma clínica renomada na cidade de Uberlândia, contamos com a melhor infraestrutura da região e com os profissionais mais qualificados. Além da qualidade do atendimento a Cheap Clínica também conta com os preços mais acessivos do mercado, agenda já a sua consulta clicando na opção Agendamento.
        </p>
      </div>

    </div>

    <div class="block">
      <h2 class="h2 showornot pointer">Missão</h2>
      <div class="content" style="display: none;">
        <p class="container">
         Nossa missão é ser uma empresa notada nacional e internacionalmente como uma empresa objetiva e cuidadosa, colocando sempre o bem estar e a satisfação dos nossos pacientes em primeiro lugar.
        </p>
      </div>

    </div>


    <div class="block">
      <h2 class="h2 showornot pointer">Valores</h2>
      <div class="content" style="display: none;">
        <div class="container">
          <ul class="list">
            <li>Ética</li>
            <li>Respeito</li>
            <li>Paixão</li>
            <li>Honestidade</li>
            <li>Profissionalismo</li>
          </ul>


        </div>
      </div>

    </div>

  </div>

  <?php include "footer.php";?>

</body>
</html>
