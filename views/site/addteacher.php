<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Добавить учителя';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('addteacherFormSubmitted')): ?>

    <div class="alert alert-success">
        Учитель добавлен успешно.
    </div>
        
    <a href="<?= Url::toRoute('site/addteacher') ?>">Добавить еще</a>

    <?php else: ?>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'addteacher-form']); ?>

                    <?= $form->field($model, 'name') ?>

                    <?= $form->field($model, 'gender')->radioList(['m'=>'Мужчина', 'f'=>'Женщина']) ?>

                    <?= $form->field($model, 'phone') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'addteacher-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>

