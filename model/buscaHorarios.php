<?php



try
{
  require "conection.php";
  $conn = conectaAoMySQL();

  
  $med = "";
  $dt = "";
  if (isset($_GET["med"]) &&isset($_GET["dt"]) )
  {
    $med = $_GET["med"];
    $dt = $_GET["dt"];
  }
    
  
  $sql = $conn->prepare( "SELECT HORA FROM AGENDA WHERE COD_FUNCIONARIO = ? AND DATA = ?;");


  $sql->bind_param("is",$med,$dt);

  
  if (!$sql->execute())
    throw new Exception('Ocorreu uma falha ao buscar o endereco: ' . $conn->error);
  

    $hr =0 ;

  $sql->bind_result($hr);

    $results = array();


  if ($sql->num_rows > 0)
  {

    while(($sql->fetch()){
        array_push($results,$hr);
    }

    $jsonStr = json_encode($results);
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


