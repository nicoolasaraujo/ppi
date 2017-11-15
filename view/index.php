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
  <title>Clínica Médica</title>
<!--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/home.css">

-->


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../js/jquery-3.2.1.js"></script>
<script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<!-- <script src="../js/galeria.js"></script> -->
<script src="../js/home.js"></script>
<style>
.clinica {
	color: darkcyan;
	text-align: center;
}
.pointer {
	cursor: pointer;
}
</style>


</head>

<body>

  <?php include "header.php";?>
  <?php include "navbar.php";?>
  <div class="container-fluid">


    <h1 class="h1 clinica">Cheap Clínica</h1>


    <div class="block ">
      <h2 class="h2 showornot pointer">Sobre nós</h2>
      <div class="content" style="display: none;">
        <p>
          Sobre.
        </p>
      </div>

    </div>

    <div class="block">
      <h2 class="h2 showornot pointer">Missão</h2>
      <div class="content" style="display: none;">
        <p>
          Missão.
        </p>
      </div>

    </div>

  </div>

  <?php include "footer.php";?>
</body>
</html>
