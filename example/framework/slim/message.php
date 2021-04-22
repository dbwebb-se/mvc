<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Message';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-message">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= $message ?>
    </p>

    <code><?= __FILE__ ?></code>
</div>
