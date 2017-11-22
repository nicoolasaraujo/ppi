<?php
session_start();

$_SESSION["nome"] = null;
// header('Location:../view/index.php');
session_destroy();

echo "<script>alert('Até Mais !');window.location.href='../view/index.php';</script>";


 ?>
