<?php
include_once "scripts/location.php";
$listUsers = ($_SESSION['listUser']->data);
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
  <title>KOP | Map</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link rel="icon" type="imagem/png" href="img/icon.png" />
  <script src="https://use.fontawesome.com/a2dd855306.js"></script>

<body>

  <header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <img src="img/icon.png" alt="Girl in a jacket" width="70" height="70"> <a class="navbar-brand" href="index.php" style="margin-right:30px;padding: 10px;">Kingdon Of Player</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="col-md-5"></div>
      <div>
        <div class="collapse navbar-collapse class=" col-md-6"" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php" style="padding: 15px;"> <label>Reino </label></a> <span class="sr-only">(current)</span></a>
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

    <script>
      var pinto = "PINTO da variavel"
      navigator.geolocation.getCurrentPosition(function(posicao) {
          const {
            latitude
          } = posicao.coords
          const {
            longitude
          } = posicao.coords
          //alert(latitude)
          //alert(longitude)
        }),
        function(erro) {
          console.log(erro)
        }
    </script>
    <div class="container" style="height: 800px;">
      <br>
      <h1>Ache jogadores perto de você!</h1>
      <br>
      <form action="scripts/location.php" method="POST" class="form-reino" style="margin-left: 14%;">
        <label>Latitude:&nbsp;</label>
        <input type="text" name="latitude" placeholder="Latitude"></input>
        <label>Latitude:</label>
        <input type="text" name="longitude" placeholder="Longitude"></input>
        <br>
        <label style="margin-top: 10px;">Distancia:</label>
        <input type="text" name="distancia" placeholder="Distancia"></input>
        <label style="margin-top: 10px;">Clã:</label>
        <select style="margin-left: 40px;height: 35px;" name="game-list" placeholder="Selecione o clan">
          <option value="null">--Selecione--</option>  
          <option value="lol">League Of Legends</option>
        </select>
        <button type="submit" class="btn" style="margin-top: 5px;margin-left: 88px;">Enviar locatização</button>
      </form>
      <hr style="margin-top: 100px;border: 1px solid #272303;border-radius: 1px; width: 80%; margin-top:15%;">
      <h2>Jogadores perto de você!</h2>
      <table>
        <tr>
          <div class="list-users">
            <?php
            foreach ($listUsers as $value) { ?>
                <?php if ($value->name != "") { 
                ?>
                <form action="scripts/teste.php" method="POST">
                <div style="padding: 5px;font-size:25px;border: 1px solid #790000;border-radius: 10px;margin-top:10px;box-shadow: 2px 2px 2px;">  
                <strong style="color: #790000;">Nome no Reino:</strong> &nbsp;
                <input style="border:0px" name= "id_user" disabled type="text" id="<?php print_r($value->id_user); ?>" value="<?php print_r($value->name); ?>"></input>
                
                <?php if(!empty($value->Api->lol->name)) {?>
                &nbsp; |  &nbsp;<strong style="color: #790000;">Nick:</strong>
                <input style="border:0px" disabled type="text" id="<?php print_r($value->id_user); ?>" value="<?php print_r($value->Api->lol->name); ?>"></input>
                <?php } ?>
                
                <br>
                <button type="submit" class="btn" style="float:right;margin-top: -38px;color: white;">Ver perfil</button>
                </form>  
              </div>

            <?php  }
            }
            ?>
          </div>
        </tr>
      </table>
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