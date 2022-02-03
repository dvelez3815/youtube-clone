<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MovieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Movies";
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="article-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(!Yii::$app->user->isGuest): ?>
    <p>
        <?= Html::a('Create movie',['create'],['class'=>'btn btn-success']) ?>
    </p>
    <?php endif; ?>
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'itemView' => '_movie_item'

    ]); ?>
</div>

