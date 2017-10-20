<nav class="navbar  navbar-light" style="background-color: #E2DEDD ;">
  <div class="container-fluid">

    <div class="navbar-header">
      <a href="#" class="navbar-brand" style="color:black;">Clinica Medica</a>
    </div>

    <ul class="nav navbar-nav navbar navbar-light" style="background-color: #C6BEBD  ;">

      <li<?php if($activePage=='home') echo "class='active' ";?>><a href="index.php">Home</a></li/>
      <li <?php if($activePage=='galeria') echo "class='active' ";?>
      
      ><a href="galeria.php">Galeria </a></li>
      <li<?php if($activePage=='contato') echo "class='active' ";?>><a href="#">Contato</a></li>
      <li<?php if($activePage=='agendamento') echo "class='active' ";?>><a href="#">Agendamento</a></li>
    
    </ul>

  </div>
</nav>
