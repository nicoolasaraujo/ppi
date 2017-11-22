<?php
/*action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"*/

?>

<nav class="navbar navbar-light" style="background-color: #E2DEDD ;">
  <div class="container-fluid">

    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav" >
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand" style="color:black;">Cheap Clínica</a>
      <!-- <a href="#" class="navbar-brand"><img src="img/logo3.svg" class="img-responsive logo"></a> -->
    </div>
    <div class="collapse navbar-collapse" id="mynav">
    <ul class="nav navbar-nav navbar navbar-light" style="background-color: #C6BEBD  ;">
      <li <?php if($activePage=='home') echo "class='active' ";?>><a href="index.php">Home</a></li/>
      <li <?php if($activePage=='galeria') echo "class='active' ";?>><a href="galeria.php">Galeria </a></li>
      <li <?php if($activePage=='agendamento') echo "class='active' ";?>><a href="agendamento.php">Agendamento</a></li>
      <?php
        if(!isset($_SESSION["nome"])){
      ?>
      <li <?php if($activePage=='contato') echo "class='active' ";?>><a href="contato.php">Contato</a></li>

      <?php
      }
      ?>
      <?php
        if(isset($_SESSION["nome"])){
      ?>
      <li <?php if($activePage=='cadFuncionario') echo "class='active' ";?>><a href="cadFuncionario.php">Cadastro Funcionario</a></li>
      <li <?php if($activePage=='mostraContatos') echo "class='active' ";?>><a href="mostraContatos.php"> Contatos</a></li>

      <li <?php if($activePage=='mostraFuncionarios') echo "class='active' ";?>><a href="mostraFuncionarios.php"> Funcionários</a></li>
      <li <?php if($activePage=='mostraAgendamentos') echo "class='active' ";?>><a href="mostraAgendamentos.php"> Agendamentos Marcados</a></li>
      <?php
      }
      ?>
    </ul>
    <ul class="nav navbar-nav navbar navbar-light navbar-right">

      <?php
        if(isset($_SESSION["nome"])){
          $aux = $_SESSION["nome"];
      ?>
        <li><a href="../model/logout.php"class="btn" > <?php  echo "<span>Bem vindo $aux </span>";?><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      <?php
        }else{
      ?>
        <li><a href="#"class="btn" data-toggle="modal" data-target = "#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php
      }
      ?>
    </ul>

  </div>
</nav>



<div class="modal fade" id="myModal" role="dialog" style="display:auto;">
 <div class="modal-dialog">

  <div class="modal-content">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
 <h4 class="modal-title">Insira os dados de acesso</h4>
 </div>
<div class="modal-body">


 <form action="../model/login.php")  method="POST">

 <div class="form-group col-sm-8">
   <label for="nome">Nome de Usuário: </label>
   <input class="form-control" type="text" name="nome" id="nome" placeholder="Digite o nome de usuário" required>
 </div>
 <div class="form-group col-sm-8">
   <label for="nome">Senha: </label>
   <input class="form-control" type="password" name="senha" id="nome" placeholder="Digite sua senha" required>
 </div>
 <button class="btn btn-success btn-block" type="submit" name="submit">Entrar</button>
 <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Fechar</button>
 </form>
</div>


 </div>
 </div>
</div>
