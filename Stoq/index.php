<?php
  session_start();
?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>STOQ4U</title>
  <link rel="shortcut icon" type="imagex/ico" href="assets/img/ico.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="assets/css/LoginStyle.css" />
</head>
<body>
  
<div class="login-page">

    <div class="form">
      <form class="login-form" action="login.php" method="POST">
        <img src="assets/img/logo.png" alt="" width=200 height=200><br>
        <input type="text" name="usuario" placeholder="Usuário"/>
        <input type="password" name="senha" placeholder="Senha"/>
        <button type="submit">login</button>

        <?php
          if(isset($_SESSION['nao_autenticado'])):
        ?>
        <br><br><a style='color: red'>Login ou Senha Invalidos!</a>

        <?php
          endif;
          unset($_SESSION['nao_autenticado']);
        ?>
      </form>
    </div>
  </div>
    
</body>
<?php
include 'footer.php';
?>
</html>
