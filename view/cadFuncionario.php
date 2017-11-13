<?php
session_start();
if(!isset($_SESSION["nome"]))
  header('Location:index.php');
$activePage = 'cadFuncionario';
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
  <form class="form-horizontal">

  <fieldset>
    <legend>Dados Pessoais: </legend>

    <div class="form-group">
      <label class="control-label col-sm-2" for="nome_func">Nome:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="nome_func" name="nome_func"  placeholder="Digite o seu nome...">
      </div>
    </div>

    
    <div class="form-group">
      <label class="control-label col-sm-2" for="nome_func">Data Nascimento:</label>
      <div class="col-sm-4">
        <input type="date" class="form-control" id="data_func" name="data_func">
      </div>
    </div>

  
    <div class="form-group">
      <label class="control-label col-sm-2">Sexo:</label>
      <div class="radio">
        <label><input type="radio" name="sexo_func" value='m'>Masculino</label>
        <label><input type="radio" name="sexo_func" value='f'>Feminino</label>
      </div>
    </div>

    <div class="form-group">

        <label  class="control-label col-sm-2">Estado Civil: </label>
        <div class="col-sm-4">

          <select class="form-control" name="civil_func" id="civil_func">
            <option value="c">Casado</option>
            <option value="s">Solteiro</option>
            <option value="d">Divorciado</option>
          </select>

        </div>

    </div>
    
    <div class="form-group">

        <label class="control-label col-sm-2">Cargo:</label>
        <div class="col-sm-4">
        
          <select class="form-control" name="cargo_func" id="cargo_func">
            <option value="medico">Médico</option>
            <option value="enfermeiro" selected>Enfermeiro</option>
            <option value="secretario">Secretario</option>
            <option value="outro">Outro</option>
          </select>

        <div>

    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="nome_func">Nome:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="nome_func" name="nome_func"  placeholder="Digite o seu nome...">
      </div>
    </div>




  </fieldset>



  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>




  </div>
  <?php include "footer.php";?>
</body>
