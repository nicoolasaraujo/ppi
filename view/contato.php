<?php
session_start();
if(isset($_SESSION["nome"]))
  header('Location:index.php');
$activePage = 'contato';
$msgError = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
require "../model/conection.php";

try{
  
  $conn = conectaAoMySQL();
  $conn->begin_transaction();
  $stmt = $conn->prepare("INSERT INTO CONTATO(ID_CONTATO,NOME,EMAIL,MENSAGEM,TIPO) VALUES(NULL,?,?,?,?)");
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $msg = $_POST["msg"];
  $motivo = $_POST["motivo"];
  $stmt->bind_param('ssss',$nome,$email,$msg,$motivo);
  if(!$stmt->execute())
  {
    throw new Exception('some erro has been ocurred');
  } else 
  $conn->commit();


}
catch(Exception $s){
  $conn->rollback();
  $msgError = $s->getMessage();

}




}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Galeria</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/galeria.css">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="../js/jquery-3.2.1.js"></script>
  <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <script src="../js/galeria.js"></script>
</head>






<body>
  <?php include "header.php";?>
  <?php include "navbar.php";?>
  <div class="container-fluid">
    <h1 class="h1">Contato</h1>
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <fieldset class="form-group">
    <legend>Dados</legend>
      <div class="form-group col-sm-8">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o seu nome..."  required >
      </div>

      <div class="form-group col-sm-8">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Digite o seu email..." required >
      </div>



      <div class="form-group col-sm-8">
        <label for="comment">Mensagem:</label>
        <textarea class="form-control" rows="5" id="comment" name="msg"></textarea>
      </div>

      </fieldset>
       

    <fieldset class="form-group">
      <legend>Motivo do contato</legend>
      <div class="radio col-sm-8 form-check">
        
        <label class="form-check-label"> <input type="radio" name="motivo" value="r" checked> Reclamação</label>
        <label class="form-check-label"> <input type="radio" name="motivo" value="s"> Sugestão</label>
        <label class="form-check-label"> <input type="radio" name="motivo" value="e"> Elogio</label>
        <label class="form-check-label"> <input type="radio" name="motivo" value="d"> Duvida</label>
      </div>

      </fieldset>

      <button class="btn btn-block submitContact" type="submit" name="submit">Enviar!</button>

      </fieldset>


    

    </form>
  <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if($msgError!=''){
  
    echo "<script>alert('Erro ao enviar o contato');</script>";    
         
      }
    else
    echo "<script>alert('Contato realizado com sucesso');</script>";
    }
  ?>
  </div>
  <?php include "footer.php";?>
</body>
