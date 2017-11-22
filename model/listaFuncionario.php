<?php
 // ini_set('default_charset','UTF-8');
class Funcionario
{
    public $nome;
    public $sexo;
    public $cargo;
    public $rg;

    public $logr;
    public $cidade;
}

function getFuncionarios($conn)
{
  $arrayFunc;

  $SQL = "
        SELECT NOME_FUNC,SEXO,CARGO,RG,LOGRADOURO,CIDADE FROM FUNCIONARIO
        LEFT JOIN ENDERECO
            ON FUNCIONARIO.COD_FUNCIONARIO = ENDERECO.COD_FUNCIONARIO;
  ";

  $result = $conn->query($SQL);
  if (! $result)
    throw new Exception('Ocorreu uma falha ao gerar o relatorio de testes: ' . $conn->error);

  if ($result->num_rows > 0)
  {
    while ($row = $result->fetch_assoc())
    {
      $func = new Funcionario();

      $func->nome =  $row["NOME_FUNC"];
      $func->sexo =  $row["SEXO"];
      $func->cargo = $row["CARGO"];
      $func->rg =    $row["RG"];
      $func->logr =  $row["LOGRADOURO"];
      $func->cidade= $row["CIDADE"];

    //   $aluno->matricula     = $row["MATRICULA"];
    //   $aluno->nome          = $row["NOME"];
    //   $aluno->sexo          = $row["SEXO"];

      $arrayFunc[] = $func;
    }
  }

  return $arrayFunc;
}

function defineCivil($tipo){
    if($tipo == 'c')
        return "Casado";
    else if($tipo == 'd')
        return "Divorciado";
    else if($tipo == 's')
        return "Solteiro";

}
function defineSexo($tipo){
    if($tipo == 'm')
        return "Masculino";
    else if($tipo == 'f')
        return "Feminino";


}



?>
