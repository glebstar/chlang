<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Назначить ученика учителю';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('rellearnerFormSubmitted')): ?>

    <div class="alert alert-success">
        Ученик назначен успешно.
    </div>
        
    <a href="<?= Url::toRoute('site/rellearner') ?>">Назначить еще</a>

    <?php else: ?>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'rellearner-form']); ?>

                    <?= $form->field($model, 'tname') ?>
                    <?= $form->field($model, 'lname') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Назначить', ['class' => 'btn btn-primary', 'name' => 'rellearner-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
