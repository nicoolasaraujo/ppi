<?php

class Medico
{
    public $id;
    public $nome;

}

try
{
  require "conection.php";
  $conn = conectaAoMySQL();

  $endereco = "";
  $esp = "";
  if (isset($_GET["esp"]))
    $esp = $_GET["esp"];

  $SQL = "
        SELECT COD_FUNCIONARIO,NOME_FUNC FROM FUNCIONARIO WHERE ESP_MEDICA = '$esp' AND ESP_MEDICA <> '';
    ";

  if (! $result = $conn->query($SQL))
    throw new Exception('Ocorreu uma falha ao buscar o endereco: ' . $conn->error);


    $results = array();


  if ($result->num_rows > 0)
  {

    while($row = $result->fetch_assoc()){

        $medico = new Medico();

        $medico->id   = $row["COD_FUNCIONARIO"];
        $medico->nome = $row["NOME_FUNC"];

        array_push($results,$medico);
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
