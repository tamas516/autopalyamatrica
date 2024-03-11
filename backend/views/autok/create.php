<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Autok $model */

$this->title = 'Create Autok';
$this->params['breadcrumbs'][] = ['label' => 'Autok', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autok-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
