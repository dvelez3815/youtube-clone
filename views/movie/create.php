<?php

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Create Movie';
$this->params['breadcrumbs'][] = ['label' => 'Movies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="movie-create">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
