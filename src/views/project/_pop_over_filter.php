<?php
use yii\widgets\ActiveForm;
use hesabro\trello\Module;
?>

<div id="pop-menu-filter" class="pop-over">
    <div class="pop-over-header js-pop-over-header">
        <span class="pop-over-header-title"><?= Module::t("module", "Filter") ?></span>
        <a href="#" class="pop-over-header-close-btn" onclick="return closePopOver(this);"><i class="fa fa-times"></i> </a>
    </div>
    <div class="pop-over-content">

        <?php
        $form = ActiveForm::begin([
            'method' => 'get',
        ]);
        ?>

        <div class="row">
            <div class="col-md-12">
                <?= $form() ?>
            </div>
        </div>
    </div>
</div>