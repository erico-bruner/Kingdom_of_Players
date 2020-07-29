<?php
  include_once "scripts/valida.php";
  session_start();
  if($_SESSION['token'] == ""){
    header("Location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script type="text/javascript" src="scripts/validacao.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta http-equiv="Content-Language" content="en">
  <title>Kingdon OF Player</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link rel="icon" type="imagem/png" href="img/icon.png" />
  <script src="https://use.fontawesome.com/a2dd855306.js"></script>

<body>

  <header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <img src="img/icon.png" alt="Girl in a jacket" width="70" height="70"> <a class="navbar-brand" href="#" style="margin-right:30px;padding: 10px;">Kingdon Of Player</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="col-md-5"></div>
      <div>
        <div class="collapse navbar-collapse class=" col-md-6"" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#" style="padding: 15px;"> <label>Reino </label></a> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="maps.php" style="padding: 15px;"> <label>Mapa </label></a></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="padding: 15px;"> <label>Ranking </label></a></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="padding: 15px;"> <label>Opções </label></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="padding: 15px;" class="fa fa-sign-in" aria-hidden="true"> <label>Ajuda </label></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="padding: 15px;" class="fa fa-sign-in" aria-hidden="true"> <label>Sobre </label></a>
            </li>
            <li class="nav-item dropdown">
              <a style="padding: 15px;" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 10px;">
                <label>Perfil</label>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="login.php">Login</a>
                <a class="dropdown-item" href="cadastro.php">Cadastrar-se</a>
                <a class="dropdown-item" href="perfil.php">Perfil</a>
                <a class="dropdown-item" href="login.php">Sair</a>
              </div>
            </li>
          </ul>
        </div>
        <div>
    </nav>

  </header>

  <main id="index">

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <div class="container">
      <br>
      <h1>Selecione seu reino!</h1>
      <br>
      <form class="form-reino" action="scripts/vincular.php" method="POST">
        <label>Nick:</label>
        <input type="text" name="nick-lol" placeholder="Nickname usado no jogo"></input>
        <button type="submit" class="btn" style="margin-top: -6px;">Vincular</button>
      </form>
      <img class="lol-img" src="img/lol.png" width="200">
      <hr style="margin-top: 100px;border: 1px solid #272303;border-radius: 1px; width: 90%;">
    </div>

  </main>

  <footer class="footer navbar-fixed-bottom">
    © Todos os direitos reservados | Kingdon OF Player
  </footer>


</body>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>