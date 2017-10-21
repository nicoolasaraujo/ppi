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
      <li <?php if($activePage=='galeria') echo "class='active' ";?>
      
      ><a href="galeria.php">Galeria </a></li>
      <li <?php if($activePage=='contato') echo "class='active' ";?>><a href="#">Contato</a></li>
      <li <?php if($activePage=='agendamento') echo "class='active' ";?>><a href="agendamento.php">Agendamento</a></li>
    
    </ul>
    <div>
  
  </div>
</nav>
