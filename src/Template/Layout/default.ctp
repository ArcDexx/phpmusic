<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('design.css')?>
    <?= $this->Html->css('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')?>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js')?>
    <?= $this->Html->script('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js')?>

    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js') ?>

    <?= $this->Html->script('/js/app/quizzr.js') ?>
    <?= $this->Html->script('/js/app/quizzr.routes.js') ?>
    <?= $this->Html->script('/js/app/quizzr.config.js') ?>

    <?= $this->Html->script('/js/app/game/game.module.js') ?>
    <?= $this->Html->script('/js/app/game/services/game.service.js') ?>
    <?= $this->Html->script('/js/app/game/directives/game.directive.js') ?>
    <?= $this->Html->script('/js/app/game/controllers/game.controller.js') ?>

    <?= $this->Html->script('/js/app/nav/nav.module.js') ?>
    <?= $this->Html->script('/js/app/nav/services/nav.service.js') ?>
    <?= $this->Html->script('/js/app/nav/directives/nav.directive.js') ?>
    <?= $this->Html->script('/js/app/nav/controllers/nav.controller.js') ?>

    <?= $this->Html->script('/js/app/login/login.module.js') ?>
    <?= $this->Html->script('/js/app/login/services/login.service.js') ?>
    <?= $this->Html->script('/js/app/login/directives/login.directive.js') ?>
    <?= $this->Html->script('/js/app/login/controllers/login.controller.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <title>Quizz</title>
    <meta charset="UTF-8">

</head>
<body>
      <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Quizzr</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Link</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <?=$this->fetch('content') ?>

    <footer>
    </footer>
</body>
</html>
