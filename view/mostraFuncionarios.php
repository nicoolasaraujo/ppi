<?php
session_start();
if(!isset($_SESSION["nome"]))
  header('Location:index.php');
$activePage = 'mostraFuncionarios';

require "../model/listaFuncionario.php";
require "../model/conection.php";

$arrayContatos = "";
$msgErro = "";

try
{
  $conn = conectaAoMySQL();
  $arrayFunc = getFuncionarios($conn);

}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
  echo "<script>alert('erro')</script>";
}


  

?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Galeria</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/galeria.css">
  <link rel="stylesheet" href="css/tabelas.css">
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

    <table class="table table-hover">
        <thead>
        <!-- <th>ID_CONTATO</th> -->
        <th>Nome </th>
        <th>Sexo </th>
        <th>Cargo </th>
        <th>RG </th>
        <th>Logradouro</th>
        <th>Cidade</th>
        
        </thead>


        <tbody>
            <?php
        
                if ($arrayFunc != "")
                {
                
                foreach ($arrayFunc as $func)
                {       
                    $aux = defineSexo($func->sexo);
                    echo "
                    <tr>
                    
                    <td>$func->nome</td>
                    <td>$aux</td>
                    <td>$func->cargo</td>
                    <td>$func->rg</td>
                    <td>$func->logr</td>
                    <td>$func->cidade</td>
                    </tr>      
                    ";
                }
                }
            
            ?>    
        
        </tbody>
    
    
    </table>



  </div>
  <?php include "footer.php";?>
</body>
