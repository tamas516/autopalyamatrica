<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Matricak $model */

$this->title = $model->matrica_id;
$this->params['breadcrumbs'][] = ['label' => 'Matricak', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="matricak-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'matrica_id' => $model->matrica_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'matrica_id',
            'auto_id',
            'lejarat',
            'matrica_tipus',
        ],
    ]) ?>

</div>
