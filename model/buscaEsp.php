<?php


try
{
  require "conection.php";
  $conn = conectaAoMySQL();

  $endereco = "";
  
  
  
  $SQL = "
    SELECT DISTINCT ESP_MEDICA FROM FUNCIONARIO WHERE ESP_MEDICA <> '';
    ";
  
  if (! $result = $conn->query($SQL))
    throw new Exception('Ocorreu uma falha ao buscar o endereco: ' . $conn->error);
    

    $results = array();


  if ($result->num_rows > 0)
  {

    while($row = $result->fetch_assoc()){
    
        $aux   = utf8_encode($row["ESP_MEDICA"]);
        array_push($results,$aux);

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


