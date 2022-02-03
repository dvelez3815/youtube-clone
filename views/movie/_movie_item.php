<?php
/**
 * @var $model app\models\Movie
 */
?>

<div>
    <a href="<?php echo \yii\helpers\Url::to(['/movie/view','slug'=> $model->slug]) ?>">
        <h3><?= \yii\helpers\Html::encode($model->name) ?></h3>
    </a>

    <div>
        <?php echo \yii\helpers\StringHelper::truncateWords(\yii\helpers\Html::encode($model->description),25 )?>
    </div>
    <p class="text-muted text-right">
        <small>Created At: <b><?php echo Yii::$app->formatter->asRelativeTime($model->created_at)?></b></small>
    </p>
    <hr>
</div>
