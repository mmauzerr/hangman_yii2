<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'Gameplay Page';

?>
<div class="container" style="text-align: center;padding: 50px ">
<h1><?= Html::encode($this->title) ?></h1>
    <?php echo Html::img('@web/images/maxresdefault.jpg', [
        'height' => '150px',
        'width' => '250px',
        'alt' => 'hangman']);
    ?>
    <h2 style="color: #888;"><i>You must select category..</i></h2>
</div>