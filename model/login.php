<?php

require "conection.php";



session_start();
$login =  $_POST["nome"];
$senha =  $_POST["senha"];

$conn= conectaAoMySQL();

$stmt = $conn->prepare("SELECT * FROM USUARIO WHERE LOGIN = ? AND SENHA = ? ");

$stmt->bind_param("ss",$login,$senha);

$stmt->execute();

$stmt->store_result();


$aux=$stmt->num_rows;


if($aux==1){
    $_SESSION["nome"] = $login;
    $_SESSION["senha"] = $senha;
    header('Location:../view/index.php?Message=Ok'); 

    
}

else {
    
    echo " <script>alert('Usuário ou senha incorretos!');</script>";
    header("Location:../view/index.php?Message=".$Message);


}




/* header('Location:../view/index.php'); */

?>
