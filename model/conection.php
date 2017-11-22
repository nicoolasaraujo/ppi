<?php
  define("HOST", "50.62.177.216");
  define("USER", "nova_cheap");
  define("PASSWORD", "nova_cheap");
  define("DATABASE", "nova_cheap");

  function conectaAoMySQL()
  {
    $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if ($conn->connect_error)
      throw new Exception('Falha na conex達o com o MySQL: ' . $conn->connect_error);
	else {
      $conn->set_charset("utf8");
    }
    return $conn;
  }



?>
