
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

  </header>

  <main>
  <div class="col-lg-3 col-md-8 col-sm-10" id="formCadastro">
    <form class="col-" name="cadastro" method="post" action="scripts/processa.php">
    <div class="form-group">
        <label for="exampleInputPassword1">Nome no Reino:</label>
        <input type="text" class="form-control" name="nome" id="exampleInputPassword1" placeholder="Senha">
      </div>
    
    <div class="form-group">
        <label for="exampleInputEmail1 " >Email:</label>
        <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
        <small id="emailHelp" class="form-text text-muted" >Nunca compartilhe seu email com ninguém.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Senha</label>
        <input type="password" class="form-control" name="senha"  id="exampleInputPassword1" placeholder="Senha">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Repetir senha</label>
        <input type="password" class="form-control"  name="senhaValida" id="exampleInputPassword1" placeholder="Senha">
      </div>
      <div >
        <a href="login.php" style="font-size:15px; color:#474004;">Já possui conta?</a>
        <button type="submit" class="btn btn-info" style="color:white;" id="cadastro">Cadastrar-se</button>
      </div>
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