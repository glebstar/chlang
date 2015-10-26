<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Все учителя';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">
    <div class="body-content">
        <h1><?= Html::encode($this->title) ?></h1>
        <table class="table table-striped">
            <tr>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Пол</th>
                <th>Учеников</th>
            </tr>
            <?php foreach ($teachers as $_t): ?>
            <tr>
                <td><?= $_t['name'] ?></td>
                <td><?= $_t['phone'] ?></td>
                <td><?= $_t['gender'] == 'm'? 'М' : 'Ж' ?></td>
                <td><?= $_t['learners'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        
        <?php
        echo LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>
    </div>
</div>

