<?php

class Agendamento 
{
    public $nomeMed;
    public $espMed;
    public $data;
    public $hora;
    public $nomePac;
    public $telefone;
}

function getAgendamentos($conn)
{
  $arrayagend;
  
  $SQL = "
            SELECT NOME_FUNC,
                ESP_MEDICA,
                DATA,
                HORA,
            PACIENTE.NOME,
            PACIENTE.TELEFONE
            FROM AGENDA
            INNER JOIN PACIENTE ON AGENDA.COD_PACIENTE = PACIENTE.COD_PACIENTE
            INNER JOIN FUNCIONARIO ON AGENDA.COD_FUNCIONARIO = FUNCIONARIO.COD_FUNCIONARIO ORDER BY NOME_FUNC, DATA;
  
  ";
  
  $result = $conn->query($SQL);
  if (! $result)
    throw new Exception('Ocorreu uma falha ao gerar o relatorio de testes: ' . $conn->error);
    
  if ($result->num_rows > 0)
  {
    while ($row = $result->fetch_assoc())
    {
      $agend = new Agendamento();

      $agend->nomeMed=  utf8_encode($row["NOME_FUNC"]);
      $agend->espMed=  utf8_encode($row["ESP_MEDICA"]);
      $auxDate = new DateTime(utf8_encode($row["DATA"]));
      $agend->data = $auxDate->format('d/m/Y') ;
      $agend->hora =  $row["HORA"]; 
      $agend->nomePac =  utf8_encode($row["NOME"]);
      $agend->telefone= utf8_encode($row["TELEFONE"]);

    //   $aluno->matricula     = $row["MATRICULA"];
    //   $aluno->nome          = $row["NOME"];
    //   $aluno->sexo          = $row["SEXO"];

      $arrayagend[] = $agend;
    }
  }
  
  return $arrayagend;
}

function formatHour($hr)
{
    if($hr<10)
        return "0".$hr.":00";
    if($hr>=10)
        return $hr.":00";

}

function defineSexo($tipo){
    if($tipo == 'm')
        return "Masculino";
    else if($tipo == 'f')
        return "Feminino";
    
    
}



?>