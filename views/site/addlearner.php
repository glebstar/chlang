<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Добавить ученика';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('addlearnerFormSubmitted')): ?>

    <div class="alert alert-success">
        Ученик добавлен успешно.
    </div>
        
    <a href="<?= Url::toRoute('site/addlearner') ?>">Добавить еще</a>

    <?php else: ?>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'addlearner-form']); ?>

                    <?= $form->field($model, 'name') ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'birthday') ?>
                    <?= $form->field($model, 'level')->dropDownList([
                        '1' => 'A1',
                        '2' => 'A2',
                        '3' => 'B1',
                        '4' => 'B2',
                        '5' => 'C1',
                        '6' => 'C2'
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'addlearner-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>

