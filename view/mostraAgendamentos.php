<?php
session_start();
if(!isset($_SESSION["nome"]))
  header('Location:index.php');
$activePage = 'mostraAgendamentos';

require "../model/listaAgendamento.php";
require "../model/conection.php";

$arrayAgend = "";
$msgErro = "";

try
{
  $conn = conectaAoMySQL();
  $arrayAgend = getAgendamentos($conn);

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
  <script src="../js/tabelas.js"></script>
  <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <script src="../js/galeria.js"></script>

  



</script>
  
</head>




<body>
  <?php include "header.php";?>
  <?php include "navbar.php";?>
  <div class="container-fluid">
  <form class="form-horizontal">

    <table class="table table-hover">
        <thead>
        <!-- <th>ID_CONTATO</th> -->
        <th>Médico </th>
        <th>Especialidade </th>
        <th>Data </th>
        <th>Horario </th>
        <th>Paciente </th>
        <th>Telefone</th>
        </thead>


        <tbody>
            <?php
        
                if ($arrayAgend != "")
                {
                
                foreach ($arrayAgend as $agend)
                {       
                    $aux = formatHour($agend->hora);
                    echo "
                    <tr>
                    
                    <td>$agend->nomeMed</td>
                    <td>$agend->espMed</td>
                    <td class='data'>$agend->data</td>
                    <td>$aux</td>
                    <td>$agend->nomePac</td>
                    <td>$agend->telefone</td>
                    
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
