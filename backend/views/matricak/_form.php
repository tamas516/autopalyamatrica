<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;


/** @var yii\web\View $this */
/** @var common\models\Matricak $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="matricak-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        $auto = \common\models\Autok::find()->all(); 
        $listData=ArrayHelper::map($auto,'auto_id','rendszam','gyarto'); 
    ?>    
    <?= $form->field($model, 'auto_id')->dropDownList($listData,['prompt'=>'Válassz autót...']) ?>

    <?= $form->field($model, 'lejarat')->widget(\yii\jui\DatePicker::className(),
    [ 'dateFormat' => 'php:Y/m/d',
      'clientOptions' => [
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '+0:+10',
        'altFormat' => 'yy-mm-dd',
      ]],['placeholder' => 'yyyy/mm/dd'])
    ->textInput(['placeholder' => \Yii::t('app', 'yyyy/mm/dd')]) ;?>

    <?= $form->field($model, 'matrica_tipus')->dropdownList([
        '10 napos' => '10 napos',
        '1 hónapos' => '1 hónapos',
        '1 éves' => '1 éves'
        ], 
        ['prompt' => 'Válassz matrica típust...']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
