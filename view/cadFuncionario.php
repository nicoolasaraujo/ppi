<?php
session_start();
if(!isset($_SESSION["nome"]))
  header('Location:index.php');
$activePage = 'cadFuncionario';
// header('Content-Type: text/html; charset=utf-8');

$msgError = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){// Se o metodo for POST, ele entra no if e reliza a inserção


  require "../model/conection.php";

  try{
    $conn = conectaAoMySQL();


    $conn->begin_transaction();

    $stmt = $conn->prepare("INSERT INTO FUNCIONARIO(COD_FUNCIONARIO,NOME_FUNC,DT_NASC,SEXO,EST_CIVIL,CARGO,ESP_MEDICA,CPF,RG,OUTRO) VALUES(null,?,?,?,?,?,?,?,?,?)");//9 Colunas
    $nome = $_POST["nome_func"];
    $date = $_POST["data_func"];
    $sexo = $_POST["sexo_func"];
    $civil = $_POST["civil_func"];
    $cargo = $_POST["cargo_func"];
    $espMed = $_POST["espe_medico"];
    $cpf = $_POST["cpf_func"];
    $rg = $_POST["rg_func"];
    $outro = $_POST["outro"];

    $stmt->bind_param('sssssssss',$nome,$date,$sexo,$civil,$cargo,$espMed,$cpf,$rg,$outro);

    if(!$stmt->execute())
    {
      throw new Exception('Erro ao inserir os dados do funcionário' );
    } else {
      $stmtEnde = $conn->prepare("INSERT INTO ENDERECO(CEP,NUM,TIPO_LOG,LOGRADOURO,COMP,BAIRRO,CIDADE,ESTADO,COD_FUNCIONARIO) VALUES(?,?,?,?,?,?,?,?,LAST_INSERT_ID());");


      $cep_func =  $_POST["cep"];
      $tLogr =  $_POST["t_logr"];
      $logr =  $_POST["logr"];
      $num =  $_POST["num"];
      $comp =  $_POST["comp"];
      $bairro =  $_POST["bairro"];
      $cidade =  $_POST["cidade"];
      $estado =  $_POST["estado"];

      $stmtEnde->bind_param('sissssss', $cep_func,$num,$tLogr,$logr,$comp,$bairro,$cidade,$estado);

      if(!$stmtEnde->execute())
      {
        throw new Exception('Erro ao inserir os dados de Endereço');
      } else
        $conn->commit();
        // echo "<script>alert('Cadastro realizado com sucesso!');window.location.href='cadFuncionario.php';</script>";

    }



  }
  catch(Exception $s){
    $conn->rollback();
    $msgError = $s->getMessage();
    // echo "<script>alert('Erro ao cadastrar funcionario '+ $msgError);</script>";


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
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="../js/jquery-3.2.1.js"></script>
  <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />

  <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <script src="../js/galeria.js"></script>


  <script>

function buscaEndereco(cep)
{
  var xhttp = new XMLHttpRequest();
  if(cep !=""){
  xhttp.onreadystatechange = function()
  {
    if (xhttp.readyState == 4 && xhttp.status == 200)
    {

      if (xhttp.responseText != "")
      {


        var endereco = JSON.parse(xhttp.responseText);
        var cidade = endereco.bairro;
        var logr = endereco.logr;
        var bairro = endereco.cidade;
        document.forms["cad_Func"]["logr"].value = logr ;
        document.forms["cad_Func"]["bairro"].value = bairro ;
        document.forms["cad_Func"]["cidade"].value = cidade ;
        //  document.forms["cad_Func"]["logr"].value    = endereco.logr;
        // document.forms["cad_Func"]["bairro"].value = endereco.bairro;
        //  document.forms["cad_Func"]["cidade"].value = endereco.cidade;
      }
    }
  }


  xhttp.open("GET", "../model/buscaEndereco.php?cep=" + cep, true);
  xhttp.send();
}
}



</script>
  <script>

    function validaForm()
    {

      var aux = document.forms["cad_Func"]["data_func"].value;
      var dt = aux.split("-");
      // alert(aux);
      var currentDate = new Date();
      var d = parseInt(currentDate.getDate());
      var m = parseInt(currentDate.getMonth());

      var y = parseInt(currentDate.getFullYear());

      if(y< parseInt(dt[0]))
        {
          alert('Por favor inserida uma data valida!!');
          return false;
        }
      else{
        if(m+1 < parseInt(dt[1]))
        {
          alert('Por favor inserida uma data valida!!');
          return false;

        }
        else if(m+1 == parseInt(dt[1]))
        {
          if(d< parseInt(dt[2]))
          {
          alert('Por favor inserida uma data valida!!');
            return false;
          }
          else return true;
        }

        else {
          return true;
        }
      }


    }


    function especialidade(cargo){


      if(cargo=='medico')
      {

          
          $(".form-group.espec").fadeIn();
      }else
      {
        $(".form-group.espec").fadeOut();
      }



    }




  </script>

</head>







<body>
   <?php include "header.php";?>
   <?php include "navbar.php";?>
   <div class="container-fluid">
      <form class="form-horizontal" name="cad_Func" onSubmit="return validaForm()" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                  <input type="date" class="form-control" id="data_func" name="data_func" required>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2">Sexo:</label>
               <div class="col-sm-4">
                  <div class="radio">
                     <label><input type="radio" name="sexo_func" value='m' checked>Masculino</label>
                     <label><input type="radio" name="sexo_func" value='f'>Feminino</label>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label  class="control-label col-sm-2">Estado Civil: </label>
               <div class="col-sm-4">
                  <select class="form-control" name="civil_func" id="civil_func">
                     <option value="c"selected>Casado</option>
                     <option value="s">Solteiro</option>
                     <option value="d">Divorciado</option>
                  </select>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2">Cargo:</label>
               <div class="col-sm-4">
                  <select class="form-control" name="cargo_func" id="cargo_func" onchange="especialidade(this.value)">
                     <option value="medico">Médico</option>
                     <option value="enfermeiro" selected>Enfermeiro</option>
                     <option value="secretario">Secretario</option>
                     <option value="outro">Outro</option>
                  </select>
               </div>
            </div>
            <div class="form-group espec">
               <label class="control-label col-sm-2" for="nome_func">Epecialidade: </label>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="espe_medico"  name="espe_medico"  placeholder="Digite a sua especialidade">
               </div>
            </div>
         </fieldset>
         <fieldset>
            <legend>Documentos:</legend>
            <div class="form-group">
               <label class="control-label col-sm-2" for="id_cpf_func">CPF:</label>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="id_cpf_func" name="cpf_func"  placeholder="Digite o seu CPF...">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2" for="id_rg_func">RG:</label>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="id_rg_func" name="rg_func"  placeholder="Digite o seu RG...">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2" for="id_outro">Outros:</label>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="id_rg_func" name="outro"  placeholder="Outro documento de identificação...">
               </div>
            </div>
         </fieldset>
         <fieldset>
            <legend>Endereço: </legend>
            <div class="form-group">
               <label class="control-label col-sm-2" for="cep">CEP:</label>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="id_cep" name="cep" placeholder="Digite o seu CEP..."  onkeyup="buscaEndereco(this.value)" required>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2">Tipo logradouro:</label>
               <div class="col-sm-4">
                  <div class="radio">
                     <label><input type="radio" name="t_logr" value='rua' checked>Rua</label>
                     <label><input type="radio" name="t_logr" value='av'>Avenida</label>
                     <label><input type="radio" name="t_logr" value='praca'>Praça</label>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2" for="id_logr">Logradouro:</label>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="id_logr" name="logr"  placeholder="Digite o seu Logradouro...">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2" for="num">Número:</label>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="num" name="num"  placeholder="Digite o seu Número...">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2" for="id_comp">Complemento:</label>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="id_comp" name="comp"  placeholder="Digite algum complemento...">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2" for="id_bairro">Bairro:</label>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="id_bairro" name="bairro"  placeholder="Digite aqui o seu bairro...">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2" for="id_cidade">Cidade:</label>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="id_cidade" name="cidade"  placeholder="Digite aqui o seu cidade...">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2" for="id_estado">Estado:</label>
               <div class="col-sm-4">
                  <input type="text" class="form-control" id="id_estado" name="estado"  placeholder="Digite aqui o seu Estado...Ex.:MG">
               </div>
            </div>
         </fieldset>
         <button class="btn btn-block submitContact" type="submit" name="submit">Enviar!</button>
      </form>
   </div>
   <?php
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($msgError!=''){

      echo "<script>alert('Erro ao enviar o contato');</script>";

        }
      else
      echo "<script>alert('Cadastro realizado com sucesso');</script>";
      }
      ?>
   <?php include "footer.php";?>
</body>
