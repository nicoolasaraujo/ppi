<?php

class Medico 
{
    public id;
    public nome;
    
}

try
{
  require "conection.php";
  $conn = conectaAoMySQL();

  $endereco = "";
  $cep = "";
  if (isset($_GET["esp"]))
    $cep = $_GET["esp"];
  
  $SQL = "
        SELECT COD_FUNCIONARIO,NOME_FUNC FROM FUNCIONARIO WHERE ESP_MEDICA = '$esp';
    ";
  
  if (! $result = $conn->query($SQL))
    throw new Exception('Ocorreu uma falha ao buscar o endereco: ' . $conn->error);
    

    $results = array();


  if ($result->num_rows > 0)
  {

    while($row = $result->fetch_assoc()){
    
        $medico = new Medico();
        
        $medico->id   = utf8_encode($row["COD_FUNCIONARIO"]);
        $medico->nome = utf8_encode($row["NOME"]);

        array_push($results,$medico);
    }

    $jsonStr = json_encode($results,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_UNICODE);
    echo $jsonStr;
    
  }  
}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
//   echo "<script>alert('Erro')</script>";
  
}

if ($conn != null)
  $conn->close();

?>


