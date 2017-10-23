<?php
session_start();
if(isset($_SESSION["nome"]))
  header('Location:index.php');
$activePage = 'contato'

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Galeria</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/galeria.css">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="../js/jquery-3.2.1.js"></script>
  <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <script src="../js/galeria.js"></script>
</head>






<body>
  <?php include "header.php";?>
  <?php include "navbar.php";?>
  <div class="container-fluid">
    <h1 class="h1">Contato</h1>
    <form  action="index.html" method="post">

      <div class="form-group col-sm-8">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o seu nome..."  required >
      </div>

      <div class="form-group col-sm-8">
        <label for="nome">Email:</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Digite o seu email..." required >
      </div>



      <div class="form-group col-sm-8">
        <label for="comment">Mensagem:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>

      <div class="radio col-sm-8">
        <h4 class="h4">Motivo:</h4>
        <label> <input type="radio" name="motivo" value="reclamacao" checked> Reclamação</label>
        <label> <input type="radio" name="motivo" value="sugestao"> Sugestão</label>
        <label> <input type="radio" name="motivo" value="elogio"> Elogio</label>
        <label> <input type="radio" name="motivo" value="duvida"> Duvida</label>
      </div>

      <button class="btn btn-block submitContact" type="submit" name="submit">Enviar!</button>

    </form>


  </div>
  <?php include "footer.php";?>
</body>
