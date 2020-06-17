
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script type="text/javascript" src="scripts/validacao.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta http-equiv="Content-Language" content="en">
  <title>Kingdon OF Player | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link rel="icon" type="imagem/png" href="img/icon.png" />
  <script src="https://use.fontawesome.com/a2dd855306.js"></script>

<body>

  <header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
      <img src="img/icon.png" alt="Girl in a jacket" width="70" height="70"> <a class="navbar-brand" href="index.php" style="margin-right:30px;padding: 10px;">Kingdon Of Player</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php" style="padding: 10px;"> <label>Reino </label></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="padding: 10px;"> <label>Mapa </label></a></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="padding: 10px;"> <label>Ranking </label></a></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="padding: 10px;"> <label>Opções </label></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="padding: 10px;" class="fa fa-sign-in" aria-hidden="true"> <label>Ajuda </label></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="padding: 10px;" class="fa fa-sign-in" aria-hidden="true"> <label>Sobre </label></a>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 10px;">
              <label>Entrar</label>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

              <a class="dropdown-item" href="cadastro.php">Cadastra-se</a>
              <a class="dropdown-item" href="#">Sair</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

  </header>




  <main>



  <div class="col-lg-3 col-md-8 col-sm-10" id="fomrlogin">
    <form class="col-"  name="login" method="post" action="scripts/valida.php" onsubmit="return validacaoLogin()">
      <div class="form-group">
        <label for="exampleInputEmail1 " name="email">Email:</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
        <small id="emailHelp" class="form-text text-muted" >Nunca compartilhe seu email com ninguém.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1" name="senha">Senha:</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
      </div>
      <div >
        <a href="" style="font-size:15px; color:#474004;">Esqueceu sua senha?</a>
        </div>
        <p></p>
        <button type="submit" class="btn btn-info">Entrar</button>
        <a type="submit" class="btn btn-info" style="color:white;" id="cadastro">Cadastrar-se</a>
      </form>
      </div>  
   
      
      
  </main>








  <footer>


  </footer>


</body>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>