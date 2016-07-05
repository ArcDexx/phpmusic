<html>
<head><title>420px</title>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">420px</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="explore.php">Explore</a></li
    </ul>
  </div>
</nav>
<div class="container" align="center">
  <?php
  if (isset($unmatchingPasswords))
  {
  ?>
  <div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Les mots de passe ne correspondent pas
  </div>
  <?php
  }
  else if (isset($loginAlreadyExists))
  {
  ?>
  <div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Impossible !</strong> Le login sélectionné n'est pas disponible
  </div>
  <?php
  }
  else if (isset($failLogin))
  {
  ?>
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Pas si vite !</strong> Ce compte n'existe pas
  </div>
  <?php
  }
  ?>
  <h1>Bienvenue sur 420px</h1><br/><br/>
  <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <h2>Connexion</h2>
        <form class="form-signin" name="connexion" method="post" action="login.php">
        <input type="text" class="form-control" placeholder="Login" name="login"/><br/>
        <input type="password" class="form-control" placeholder="Mot de passe" name="password"/><br/>
        <input type="submit" name="valider" class="btn btn-lg btn-primary btn-block" value="Connexion"/>
        </form>
    </div>
  </div>
  <br/><hr>
  <div class="row" >
    <div class="col-md-offset-3 col-md-6">
      <h2>Inscription</h2>
      <form name="inscription" class="form-signin" method="post" action="login.php">
      <input type="text" class="form-control" placeholder="Login" name="login_new"/>
      <input type="password" class="form-control" placeholder="Choisissez votre mot de passe" name="password_new"/>
      <input type="password" class="form-control" placeholder="Entrez à nouveau le mot de passe" name="password_new_confirm"/><br/>
      <input type="submit" name="valider" class="btn btn-lg btn-primary btn-block" value="Inscription"/>
      </form>
    </div>
  </div>
</div>
</body>
</html>
