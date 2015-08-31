<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Neshin Hangman';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1 style="margin-top: 50px">Neshin Hangman</h1>

        <p class="lead">Welcome to my Yii2 hangman application.</p>

        <p><a class="btn btn-lg btn-info" href="<?= Url::toRoute('game');?>">Start Game</a></p>
    </div>

</div>
