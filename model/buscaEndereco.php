<?php
class Endereco
{
    public $logr;
    public $bairro;
    public $cidade;
}

try
{
  require "conection.php";
  $conn = conectaAoMySQL();

  $endereco = "";
  $cep = "";
  if (isset($_GET["cep"]))
    $cep = $_GET["cep"];

  $SQL = "
    SELECT DISTINCT logradouro, bairro, cidade
    FROM trabson.ENDERECO
    WHERE CEP = '$cep' limit 1;
  ";

  if (! $result = $conn->query($SQL))
    throw new Exception('Ocorreu uma falha ao buscar o endereco: ' . $conn->error);

  if ($result->num_rows > 0)
  {
    $row = $result->fetch_assoc();

    $endereco = new Endereco();

    $endereco->logr   = $row["logradouro"];
    $endereco->bairro = $row["bairro"];
    $endereco->cidade = $row["cidade"];

    $jsonStr = json_encode($endereco,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_UNICODE);
    echo $jsonStr;

  }
}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
  echo "<script>alert('Erro')</script>";

}

if ($conn != null)
  $conn->close();

?>
