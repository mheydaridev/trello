<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use hesabro\trello\bundles\TeamAsset;

$asset = TeamAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="header">
        <div class="logo">
            <h3><?= Html::encode($this->title); ?></h3>
        </div>
        <?= $content ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
