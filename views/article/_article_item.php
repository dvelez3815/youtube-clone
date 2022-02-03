<?php
/**
 * @var $model \app\models\Article
 */
?>

<div>
    <a href="<?php echo \yii\helpers\Url::to(['/article/view','slug' => $model->slug]) ?>">
        <h3>
            <?php echo \yii\helpers\Html::encode($model->title) ?>
        </h3>
    </a>
    <div>
        <?php echo \yii\helpers\StringHelper::truncateWords($model->getEncodeBody(),25 )?>
    </div>
    <hr>
</div>
