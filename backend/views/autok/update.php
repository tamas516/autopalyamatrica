<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Autok $model */

$this->title = 'Update Autok: ' . $model->auto_id;
$this->params['breadcrumbs'][] = ['label' => 'Autok', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->auto_id, 'url' => ['view', 'auto_id' => $model->auto_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="autok-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
