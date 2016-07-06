<div class="container">
  <?php
  if (isset($_GET['success']))
  {
    ?>
    <div class="alert alert-success col-md-8 col-md-offset-2 conteneur-corps">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Modification effectuée !</strong> Compte modifié avec succès
    </div>
    <?php
  }
    ?>
    <div class="col-md-8 col-md-offset-2 conteneur-tete" >
			<h2 style="text-align: center">
				Mon compte
			</h2>
		</div>

		<div class="col-md-8 col-md-offset-2 conteneur-corp">
			<h4>Statistiques</h4>
			<hr>
			<label for="nbGame">Nombre de parties jouées :</label>
			<p><?php echo $this->request->session()->read('games_played') ?></p>
			<label for="nbWin">Nombre de parties gagnées :</label>
			<p><?php echo $this->request->session()->read('games_won') ?></p>
			<label for="score">Score total :</label>
			<p><?php echo $this->request->session()->read('total_score') ?></p>
    </div>

		<div class="col-md-8 col-md-offset-2 conteneur-corp">
		<h4>Changement d'informations lié au compte</h4>
			<hr>
      <?php
      echo $this->Form->create('User', array('url' => array('controller' => 'Users', 'action' => 'edit')));
      echo $this->Form->input('password', array(
        'label' => array(
            'text' => 'Changer de mot de passe'
        ),
        'type' => 'password'
      ));
      echo $this->Form->button('Mettre à jour', array(
        'type' => 'submit',
        'class' => 'btn btn-primary'));
      echo $this->Form->end();
      ?>
      <hr>
      <?php
      echo $this->Form->create('User', array('url' => array('controller' => 'Users', 'action' => 'edit')));
      echo $this->Form->input('image', array(
        'label' => array(
            'text' => 'Changer d\'image de profil'
        )
      ));
      echo $this->Form->button('Mettre à jour', array(
        'type' => 'submit',
        'class' => 'btn btn-primary'));
      echo $this->Form->end();
      ?>
		</div>
</div>
