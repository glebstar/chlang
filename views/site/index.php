<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Выборка по учителям';
?>
<div class="site-index">
    <div class="body-content">
        <p><a href="<?= Url::toRoute('site/teachers') ?>">Список всех учителей с количеством занимающихся у них учеников</a></p>
        <p><a href="<?= Url::toRoute('site/april') ?>">Список учителей, с которыми занимаются только ученики, родившиеся в апреле</a></p>
        <p><a href="<?= Url::toRoute('site/twoteacher') ?>">Два учителя имеющие максимальное количество общих учеников</a></p>
    </div>
</div>
