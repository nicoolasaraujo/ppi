<?php

class Hora{
    public $hr;
    

}

try
{
  require "conection.php";
  $conn = conectaAoMySQL();

  
  $med = 0;
  $dt = "";
  if (isset($_GET["med"]) && isset($_GET["dt"]) )
  {

    $med = $_GET["med"];
    $dt = $_GET["dt"];
  }
    
  $sql = $conn->prepare( "SELECT DISTINCT HORA FROM AGENDA WHERE COD_FUNCIONARIO = ? AND DATE(DATA) = DATE(?)");


  $sql->bind_param("is",$med,$dt);
    // $sql->bind_param("i",$med);


  
  if (!$sql->execute())
    throw new Exception('Ocorreu uma falha ao buscar o endereco: ' . $conn->error);
  
    // $jsonStr ="";
    $hr=0;

    $sql->bind_result($hr);
    $results = array();

    $sql->store_result();
  if ($sql->num_rows > 0)
  {

    while($sql->fetch()){
        // array_push($results,$hr);
        $hora = new Hora();
        $hora->hr = $hr;
        $results[] = $hora;
    }
    
    $jsonStr = json_encode($results);
    echo $jsonStr;   

    
  }else echo 'false';
//   else {
//     $hora = new Hora();
//     $hora->hr = null;
//     $result[] = $hora;

//   }

  
  
  
  
}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
  echo "<script>alert('Erro')</script>";
  
}

if ($conn != null)
  $conn->close();

?>


