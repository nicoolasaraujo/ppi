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
      <div class="col-sm-4">
      <div class="radio">
        <label><input type="radio" name="sexo_func" value='m'>Masculino</label>
        <label><input type="radio" name="sexo_func" value='f'>Feminino</label>
      </div>
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

        </div>

    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="nome_func">Epecialidade: </label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="espe_medico" name="espe_medico"  placeholder="Digite a sua especialidade">
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
        <input type="text" class="form-control" id="cep" name="cep"  placeholder="Digite o seu CEP...">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Tipo logradouro:</label>
      <div class="col-sm-4">
      <div class="radio">
        <label><input type="radio" name="t_logr" value='rua'>Rua</label>
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
      <label class="control-label col-sm-2" for="id_estado">Cidade:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="id_estado" name="estado"  placeholder="Digite aqui o seu Estado...Ex.:MG">
      </div>
    </div>

  </fieldset>
  <button class="btn col-sm-2 submitContact pull-right" type="submit" name="submit">Enviar!</button>


  </div>
  <?php include "footer.php";?>
</body>
