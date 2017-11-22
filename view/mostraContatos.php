<?php
session_start();
if(!isset($_SESSION["nome"]))
  header('Location:index.php');
$activePage = 'mostraContatos';

require "../model/listaContatos.php";
require "../model/conection.php";

$arrayContatos = "";
$msgErro = "";

try
{
  $conn = conectaAoMySQL();
  $arrayContatos = getContatos($conn);

}
catch (Exception $e)
{
  $msgErro = $e->getMessage();

}


?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Contatos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/tabelas.css">
  <link rel="stylesheet" href="css/footer.css">
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

    <table class="table table-hover">
        <thead>
          <th>NOME </th>
          <th>EMAIL </th>
          <th>MENSAGEM </th>
          <th>TIPO </th>
        </thead>


        <tbody>
            <?php

                if ($arrayContatos != "")
                {

                foreach ($arrayContatos as $contatos)
                {
                    $aux = validaTipo($contatos->tipo);
                    echo "
                    <tr>
                      <td>$contatos->nome</td>
                      <td class='email'>$contatos->email</td>
                      <td>$contatos->msg</td>
                      <td>$aux</td>
                    </tr>
                    ";
                }
                }

            ?>

        </tbody>

    </table>
  </div>
  <?php
    if($msgErro!=""){
          echo "<script>alert('Erro ao enviar ao buscar dados do servidor!');</script>";
    }
   ?>
  <?php include "footer.php";?>
</body>
