<?php

require "conection.php";



session_start();
$login = filtraEntrada($_POST["nome"]);
$aux =  filtraEntrada($_POST["senha"]);
$senha = md5($aux);



$conn= conectaAoMySQL();

$stmt = $conn->prepare("SELECT * FROM USUARIO WHERE LOGIN = ? AND SENHA = ?");

$stmt->bind_param("ss",$login,$senha);

$stmt->execute();

$stmt->store_result();


$aux=$stmt->num_rows;


if($aux==1){
    $_SESSION["nome"] = $login;
    $_SESSION["senha"] = $senha;
    echo "<script>alert('Login realizado com sucesso !');window.location.href='../view/index.php';</script>";
    // header('Location:../view/index.php?Message=Ok');


}

else {

    echo "<script>alert('Usuário ou senha incorreto!');window.location.href='../view/index.php';</script>";
    // header("Location:../view/index.php?Message=".$Message);


}




/* header('Location:../view/index.php'); */

function filtraEntrada($dado)
{

  $dado = trim($dado);
  $dado = stripslashes($dado);
  $dado = htmlspecialchars($dado);
  return $dado;
}



?>
