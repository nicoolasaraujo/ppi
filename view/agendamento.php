<?php
session_start();
if(isset($_SESSION["nome"]))
  header('Location:index.php');

$activePage = 'agendamento';






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
                
                // foreach()

                document.forms["cad_Func"]["logr"].value = logr ;
                document.forms["cad_Func"]["bairro"].value = bairro ;
                document.forms["cad_Func"]["cidade"].value = cidade ;
                //  document.forms["cad_Func"]["logr"].value    = endereco.logr;
                // document.forms["cad_Func"]["bairro"].value = endereco.bairro;
                //  document.forms["cad_Func"]["cidade"].value = endereco.cidade;
              }
            }
          }

          xhttp.open("GET", "../model/buscaMedico.php?esp=" + esp, true);
          xhttp.send();  
        }

        function buscaEsp()
        {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() 
          {
            if (xhttp.readyState == 4 && xhttp.status == 200) 
            {
              
              if (xhttp.responseText != "")
              {
                
                var campoSelect = document.getElementById("especMed");
                // $("#especMed").empty();//limpa os selects antigos
                
                var esp_med = JSON.parse(xhttp.responseText);
                
                esp_med.forEach(function(valor, chave){
                  var option = document.createElement("option");
                  option.text = valor;
                  option.value = valor;
                  campoSelect.add(option);
                });
                
                // var campoSelect = document.getElementById("especMed");
                // var option = document.createElement("option");
                // option.text = 
                // option.value = "Value da nova opção";
                // campoSelect.add(option);

                
              }
            }
          }

          xhttp.open("GET", "../model/buscaEsp.php" , true);
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
        <select class="form-control" name="especMed" id="especMed">
          <option></option>
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
        <select class="form-control" name="nomeMed" id="nomeMed">
          <!-- I don't know -->

        
        </select>


      </div>

      
      
       <div class="form-group form-group col-sm-4">
        <label for="date">Data da consulta:</label>
        <input type="date" class="form-control">


      </div>
      

      <div class="form-group form-group col-sm-6">
        <label for="hour">Horario da Consulta</label>
        <select class="form-control" name="hora" id="hour">
          <!-- I don't know -->

        
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
