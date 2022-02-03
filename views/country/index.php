<?php

/* @var $this yii\web\View */
/* @var $countries app\controllers\CountryController */
/* @var $pagination app\controllers\CountryController */

use \yii\helpers\Html;
use \yii\widgets\LinkPager;

$this->title = "Countries";

?>
<h1><?= Html::encode($this->title)?></h1>
<ul>
    <?php foreach ($countries as $country):?>
        <li>
            <?= Html::encode("{$country->name} ({$country->code})")?>:
            <?= $country->population ?>
        </li>
    <?php endforeach;?>
</ul>
<?= LinkPager::widget(['pagination' => $pagination]) ?>



