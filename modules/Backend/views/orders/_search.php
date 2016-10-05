<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Backend\models\OrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'dt_create') ?>

    <?= $form->field($model, 'status_id') ?>

    <?= $form->field($model, 'dt_plan') ?>

    <?= $form->field($model, 'number_dogovor') ?>

    <?php // echo $form->field($model, 'manager_id') ?>

    <?php // echo $form->field($model, 'master_id') ?>

    <?php // echo $form->field($model, 'prise_base') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'fio') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
