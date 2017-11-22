<?php

class Contato
{
    public $nome;
    public $email;
    public $msg;
    public $tipo;
}

function getContatos($conn)
{
  $arrayContatos =null;

  $SQL = "
    SELECT NOME,EMAIL,MENSAGEM,TIPO
    FROM CONTATO ORDER BY ID_CONTATO DESC
  ";

  $result = $conn->query($SQL);
  if (! $result)
    throw new Exception('Ocorreu uma falha ao gerar o relatorio de testes: ' . $conn->error);

  if ($result->num_rows > 0)
  {
    while ($row = $result->fetch_assoc())
    {
      $contato = new Contato();

      $contato->nome            = $row["NOME"];
      $contato->email           = $row["EMAIL"];
      $contato->msg             = $row["MENSAGEM"];
      $contato->tipo           = $row["TIPO"];

    //   $aluno->matricula     = $row["MATRICULA"];
    //   $aluno->nome          = $row["NOME"];
    //   $aluno->sexo          = $row["SEXO"];

      $arrayContatos[] = $contato;
    }
  }

  return $arrayContatos;
}

function validaTipo($tipo){
    if($tipo == 'r')
        return "Reclamação";
    else if($tipo == 's')
        return "Sugestão";
    else if($tipo == 'e')
        return "Elogio";
    else if($tipo == 'd')
        return "Dúvida";
}


?>
