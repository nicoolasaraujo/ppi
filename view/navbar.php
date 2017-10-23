<nav class="navbar navbar-light" style="background-color: #E2DEDD ;">
  <div class="container-fluid">

    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav" >
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand" style="color:black;">Clinica Medica</a>
    </div>
    <div class="collapse navbar-collapse" id="mynav">
    <ul class="nav navbar-nav navbar navbar-light" style="background-color: #C6BEBD  ;">
      <li <?php if($activePage=='home') echo "class='active' ";?>><a href="index.php">Home</a></li/>
      <li <?php if($activePage=='galeria') echo "class='active' ";?>><a href="galeria.php">Galeria </a></li>
      <?php
        if(!isset($_SESSION["nome"])){
      ?>
      <li <?php if($activePage=='contato') echo "class='active' ";?>><a href="contato.php">Contato</a></li>
      <li <?php if($activePage=='agendamento') echo "class='active' ";?>><a href="agendamento.php">Agendamento</a></li>
      <?php
      }
      ?>
      <?php
        if(isset($_SESSION["nome"])){//Lembrar de inverter os if's $SESSION
      ?>
      <li <?php if($activePage=='cadFuncionario') echo "class='active' ";?>><a href="cadFuncionario.php">Cadastro Funcionario</a></li>
      <li <?php if($activePage=='listaContatos') echo "class='active' ";?>><a href="listaContatos.php">Listar Contatos</a></li>
      <li <?php if($activePage=='listaAgendamento') echo "class='active' ";?>><a href="listaAgendamento.php">Listar Agendamentos</a></li>
      <?php
      }
      ?>
    </ul>
    <ul class="nav navbar-nav navbar navbar-light navbar-right">
      <!-- <li><button type="button" name="button" class="btn"><span class="glyphicon glyphicon-log-in"></span> Login</button> </li>
      <li><button type="button" name="button" class="btn"><span class="glyphicon glyphicon-log-in"></span> Logout</button></li> -->
      <?php
        if(isset($_SESSION["nome"])){//Lembrar de inverter os if's $SESSION
          $aux = $_SESSION["nome"];
      ?>
      <li><a href="../model/logout.php"class="btn" > <?php  echo "<p>Bem vindo $aux</p>";?><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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



<div class="modal fade" id="myModal" role="dialog">
 <div class="modal-dialog">

 <div class="modal-content">

 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">&times;</button>
 <h4 class="modal-title">Insira os dados de acesso</h4>
 </div>
<div class="modal-body">


 <form action="../model/login.php" method="post">

 <div class="form-group col-sm-8">
   <label for="nome">Nome de Usuário: </label>
   <input class="form-control" type="text" name="nome" id="nome" placeholder="Digite o nome de usuário">
 </div>
 <div class="form-group col-sm-8">
   <label for="nome">Senha: </label>
   <input class="form-control" type="password" name="senha" id="nome" placeholder="Digite sua senha">
 </div>
 <button class="btn btn-success btn-block" type="submit" name="submit">Entrar</button>
 <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Fechar</button>
 </form>
</div>


 </div>
 </div>
</div>
