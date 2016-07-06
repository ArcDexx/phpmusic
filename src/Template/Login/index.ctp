<?php
if (isset($_GET['fail']))
{
  ?>
  <div class="alert alert-danger col-md-4 col-md-offset-4 conteneur-corps">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Aucun compte trouvé pour ces identifiants
  </div>
  <?php
}
  ?>
<div class="col-md-4 col-md-offset-4 conteneur-tete">
    <h2 style="text-align: center">Connexion</h2>
</div>
<div class="col-md-4 col-md-offset-4 conteneur-corp">
    <h5>Bienvenue sur Quizzr, connectez-vous pour entrer dans la compétition !</h5>
    <?php
    echo $this->Form->create('User', array('url' => array('controller' => 'Users', 'action' => 'login')));
    echo $this->Form->input('login', array(
      'label' => array(
          'text' => 'Login'
      )
    ));
    echo $this->Form->input('password', array(
      'label' => array(
          'text' => 'Mot de passe',
      ),
      'type' => 'password'
    ));

    echo $this->Form->button('Se connecter', array(
      'type' => 'submit',
      'class' => 'btn btn-primary pull-right'));
    echo $this->Form->end();
    ?>

  </br>

</br>
    <p style="text-align: right"><a href="#">Mot de passe oublié ?</a></p>
    <hr>
    <a class="btn btn-primary center-block" href="/signup">Pas encore inscrit ?</a>

</div>
