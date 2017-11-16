<?php
session_start();
if(isset($_SESSION["nome"]))
  header('Location:index.php');

$activePage = 'agendamento';
$idMedico;

if($_SERVER["REQUEST_METHOD"] == "POST"){// Se o metodo for POST, ele entra no if e reliza a inserção
    require "../model/conection.php";
try{
    $conn = conectaAoMySQL();
    $conn->begin_transaction();
	
	$stmt = $conn->prepare("INSERT INTO PACIENTE(COD_PACIENTE,NOME,TELEFONE) VALUES(NULL,?,?)");//3 Colunas
	$nomePac = $_POST["nome"];
	$telPac = $_POST["tel"];

    $stmt->bind_param('ss',$nomePac,$telPac);
    if(!$stmt->execute())
    {
      throw new Exception('some erro has been ocurred');
    } else {
      $stmtAgenda= $conn->prepare("INSERT INTO AGENDA(COD_AGENDAMENTO,COD_FUNCIONARIO,DATA,HORA,COD_PACIENTE) VALUES(NULL,?,?,?,LAST_INSERT_ID())");//5 Colunas
      $codFunc =  $_POST["nomeMed"];
      $data =  $_POST["data"];
      $hora =  $_POST["hora"];

      $stmtAgenda->bind_param('isi', $codFunc,$data,$hora);

      if(!$stmtAgenda->execute())
      {
        throw new Exception('some erro has been ocurred Endereco');
      } else 
        $conn->commit();
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0.1;URL=agendamento.php'>";
    }
    
  
  
  }
  catch(Exception $s){
    $conn->rollback();
    $msgError = $s->getMessage();
    echo "<script>alert('erro '+ $msgError);</script>";
    
  
  }
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
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="../js/jquery-3.2.1.js"></script>
  <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <script src="../js/galeria.js"></script>
  <script>
  
        function buscaMedico(esp)
        {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() 
          {
            if (xhttp.readyState == 4 && xhttp.status == 200) 
            {
              
              if (xhttp.responseText != "")
              {
                
                
                var medico = JSON.parse(xhttp.responseText);
                var campoSelect = document.getElementById("nomeMed");
                $("#nomeMed").empty();
                var option = document.createElement("option");
                option.text = "";
                campoSelect.add(option);
                medico.forEach(function(valor,chave){
                  // alert(valor.id);
                  var option = document.createElement("option");
                  // alert(valor->id);
                  option.text = valor.nome;
                  option.value = valor.id;
                  campoSelect.add(option);
                });
              }
              
            }
          }

          xhttp.open("GET", "../model/buscaMedico.php?esp=" + esp, true);
          xhttp.send(); 
        }


        function buscaHorarios(med)
        {
          var xhttp = new XMLHttpRequest();
          var aux = document.getElementById("id_data").value;
          xhttp.onreadystatechange = function() 
          {

            
            if (xhttp.readyState == 4 && xhttp.status == 200) 
            {
              var horarios = new Array(1,1,1,1,1,1,1,1,1,1);
              var campoSelect = document.getElementById("hour");
              $("#hour").empty();
              console.log(xhttp.responseText);
              if (xhttp.responseText != "" && xhttp.responseText != "false"  )
              {
                var hr = JSON.parse(xhttp.responseText);
                if(hr!=false){
                
                hr.forEach(function(valor,chave){
                  horarios[valor.hr-8]= 0;                  
                });
                }
                
                for(i=0;i<10;i++){
                  if(horarios[i]==1){
                    var option = document.createElement("option");
                    option.text =i+8+":00";
                    option.value = i+8;
                    campoSelect.add(option);

                  }
                    

                }
                // alert(xhttp.responseText);
                
                // var campoSelect = document.getElementById("nomeMed");
                // $("#nomeMed").empty();
                // medico.forEach(function(valor,chave){
                //   // alert(valor.id);
                //   var option = document.createElement("option");
                //   // alert(valor->id);
                //   option.text = valor.nome;
                //   option.value = valor.id;
                //   campoSelect.add(option);

                // });
              }
                
            }
          }
          // 
          xhttp.open("GET", "../model/buscaHorarios.php?med=" + med + "&dt=" + aux, true);
          xhttp.send();  
        }
        


  </script>


</head>






<body>
  <?php include "header.php";?>
  <?php include "navbar.php";?>
  <?php include "../model/buscaEsp.php";?>
  <div class="container-fluid">
  <h1 class="h1">Agendamento</h1>

  <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  
    <fieldset class="form-group">
      <legend >Dados da consulta</legend>
     
      <div class="form-group form-group col-sm-4">
        <label for="especMed">Especialidade Médica:</label>
        <select class="form-control" name="especMed->value" id="especMed" onchange="buscaMedico(this.value)">
          
          <?php
            $results = getEspecialidades();
            
            foreach ($results as $esp){
              echo "<option value='$esp'>$esp</option>";
            }

          ?>

        
        </select>

      </div>

      
      <div class="form-group form-group col-sm-6">
        <label for="nomeMed">Nome Médico:</label>
        <select class="form-control" name="nomeMed" id="nomeMed"">
          

        
        </select>


      </div>

      
      
       <div class="form-group form-group col-sm-4">
        <label for="date">Data da consulta:</label>
        <input type="date" class="form-control" id="id_data" name="data" onchange="buscaHorarios(nomeMed.value)">


      </div>
      

      <div class="form-group form-group col-sm-6">
        <label for="hour">Horario da Consulta</label>
        <select class="form-control" name="hora" id="hour">

        
        </select>


      </div>



      







    </fieldset>


    <fieldset class="form-group">
        <legend>Dados Paciente</legend>
          <div class="form-group col-sm-7">
              <label for="nomep">Nome:</label>
              <input type="text" class="form-control" name="nome" id="nomep">          
          </div>
          
          <div class="form-group col-sm-7">
              <label for="telp">Telefone:</label>
              <input type="text" class="form-control" name="tel" id="telp">          
          </div>
      

      

      </fieldset>
      <button class="btn btn-block submitContact" type="submit" name="submit">Enviar!</button>

    </form>



  </div>
  <?php include "footer.php";?>




  
</body>


