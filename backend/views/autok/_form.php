<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Autok $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="autok-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gyarto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rendszam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gyartasi_ev')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
