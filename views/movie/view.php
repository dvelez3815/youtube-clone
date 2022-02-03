<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Movie */

$this->title=$model->name;
$this->params['breadcrumbs'][] = ['label' =>'Movies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
\yii\web\YiiAsset::register($this);
?>

<div class="movie-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">
        <small>
            Created at <?= Yii::$app->formatter->asRelativeTime($model->created_at) ?><br>
            Created by <?= Html::encode($model->createdBy->username) ?>
        </small>
    </p>
    <p>
        <?= Html::a('update',['update','slug' => $model->slug],['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete',['delete','slug' => $model->slug], ['class' => 'btn btn-danger',
            'data' => [
                    'confirm' => 'are you sure you want to delete the movie?',
                    'method' => 'post'
            ]]) ?>
    </p>
    <?php echo Html::encode($model->description) ?>
</div>


