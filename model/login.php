<?php
session_start();

$_SESSION["nome"] = $_POST["nome"];
header('Location:../view/index.php');

?>
