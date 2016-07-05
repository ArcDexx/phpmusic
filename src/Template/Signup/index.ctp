<div class="col-md-4 col-md-offset-4 conteneur-tete" >
  <h2 style="text-align: center">Inscription</h2>
</div>

<div class="col-md-4 col-md-offset-4 conteneur-corp">
  <h5>Bienvenue sur Quizzr Inscrivez vous pour entrer dans la compétition !</h5>
  <?php
  echo $this->Form->create('User', array('url' => array('controller' => 'Users', 'action' => 'add')));
  echo $this->Form->input('login', array(
    'label' => array(
        'text' => 'Login'
    )
  ));
  echo $this->Form->input('image', array(
    'label' => array(
        'text' => 'URL de l\'image de profil'
    )
  ));
  echo $this->Form->input('password', array(
    'label' => array(
        'text' => 'Mot de passe',
    ),
    'type' => 'password'
  ));
  echo $this->Form->input('password_confirm', array(
    'label' => array(
        'text' => 'Confirmation du mot de passe'
    ),
    'type' => 'password'
  ));
  echo $this->Form->input('email', array(
    'label' => array(
        'text' => 'Adresse e-mail'
    ),
    'type' => 'email'
  ));
  echo $this->Form->input('email_confirm', array(
    'label' => array(
        'text' => 'Confirmation de l\'adresse e-mail'
    ),
    'type' => 'email'
  ));
  echo $this->Form->button('Valider', array(
    'type' => 'submit',
    'class' => 'btn btn-primary pull-right'));
  echo $this->Form->end();
  ?>
</div>
