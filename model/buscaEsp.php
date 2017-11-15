<?php


try
{
  require "conection.php";
  $conn = conectaAoMySQL();

  $endereco = "";
  
  function buscaEsp()
  {
	  
	  $SQL = " SELECT DISTINCT * FROM nova_cheap.FUNCIONARIO WHERE ESP_MEDICA <> ''; ";
  
	  if (! $result = $conn->query($SQL))
		throw new Exception('Ocorreu uma falha ao buscar o endereco: ' . $conn->error);
		

		$results = array();


	  if ($result->num_rows > 0)
	  {

		while($row = $result->fetch_assoc()){
		
			$aux   = utf8_encode($row["ESP_MEDICA"]);
			array_push($results,$aux);

		}

		return $results;		
	  }  
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


