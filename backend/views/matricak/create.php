<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Matricak $model */

$this->title = 'Create Matricak';
$this->params['breadcrumbs'][] = ['label' => 'Matricak', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matricak-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
