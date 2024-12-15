<?php
use hesabro\trello\models\ProjectStatus;
use hesabro\trello\Module;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\bootstrap\Html;
use backend\models\User;
use hesabro\trello\models\Label;
use hesabro\trello\models\TaskLabel;

$creatorIds = ProjectStatus::find()
    ->select('creator_id')
    ->andFilterWhere(['project_id' => $project->id])
    ->column();

$creatorData = User::find()
    ->select(['id', 'CONCAT(first_name, " " ,last_name) AS full_name'])
    ->where(['id' => $creatorIds])
    ->indexBy('id')
    ->asArray()
    ->all();

$creatorData = array_map(fn($item) => $item['full_name'], $creatorData);

$labelIds = TaskLabel::find()
    ->select('label_id')
    // ->andFilterWhere(['project_id' => $project->id])
    ->column();

$labelData = Label::find()
    ->select(['id', 'label_name', 'color_code'])
    ->where(['id' => $labelIds])
    ->indexBy('id')
    ->asArray()
    ->all();

$labelData = array_map(fn($item) => $item['label_name'], $labelData);
?>

<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLongTitle"><?= Module::t('module', 'Filter') ?></h5>
            </div>
             
            <?php $form = ActiveForm::Begin([
                'method' => 'post',
            ]) ?>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'creator_id')->widget(Select2::class, [
                                'options' => ['placeholder' => Module::t('module', 'Filter')],
                                'data' => $creatorData,
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'multiple' => true
                                ], 
                            ]);?>    
                        </div>
                        <div class="col-md-12">
                            <?php
                            echo '<label class="control-label">' . Module::t("module", "Labels") . '</label>';
                            echo Select2::widget([
                                'name' => 'label_select',
                                'data' => $labelData,
                                'options' => [
                                    'placeholder' => Module::t('module', 'Label'),
                                    'multiple' => true
                                ],
                            ]);    
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <?= Html::submitButton(Module::t('module', 'Filter'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton(Module::t('module', 'Reset'), ['class' => 'btn btn-dark']) ?>
                    <button type="button" class="btn btn-light" data-dismiss="modal"><?= Module::t('module', 'Close') ?></button>
                </div>

            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>