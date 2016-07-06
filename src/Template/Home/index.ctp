<div class="col-md-8 col-md-offset-2 ">
    <div class="conteneur-tete">
    <h2 style="text-align: center"> Bienvenue sur Quizzr</h2>
    </div>
</div>

<div class="col-md-6 col-md-offset-2">
    <div class="conteneur-corp">
    <h4 class="center"> Choisissez une partie à rejoindre</h4>
    <hr>
    <table class="table">
    <thead>
      <tr>
        <th>Catégorie</th>
        <th>Joueurs</th>
        <th>Manche</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach ($allgames as $game )
    {
        echo("<tr>");
        echo ( '<td>'.$game->genre.'</td>');
        echo ( '<td>'.$game->nb_players.'</td>');
        echo ( '<td>'.$game->current_sample.'</td>');
        echo("</tr>");
    }

    ?>

    </tbody>

  </table>
  <a href="games"> <button class="btn btn-primary pull-right">Rejoindre</button></a>
   <br>
</div>
</div>
<div class="col-md-2 col-md-offset-0">
    <div class="conteneur-droit">
    <h4 class="center">Classement</h4>
    <hr>
     <table class="table table-striped">
    <thead>
      <tr>
        <th>Rang</th>
        <th>Pseudo</th>
      </tr>
    </thead>
    <tbody>

    <?php
    foreach ($allusers as $user )
    {
      echo("<tr>");
        echo ( '<td>'.$user->total_score.'</td>');
        echo ( '<td>'.$user->login.'</td>');
        echo("</tr>");
    }

    ?>
    </tbody>
     </table>
    </div>
</div>
