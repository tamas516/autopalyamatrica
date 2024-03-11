<?php

use common\models\Matricak;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Matricak';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matricak-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'auto_id',
            'lejarat',
            'matrica_tipus',
            [
                'class' => ActionColumn::className(),'template'=>'{view} {update}',
                'urlCreator' => function ($action, Matricak $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'matrica_id' => $model->matrica_id]);
                 }
            ],
        ],
    ]); ?>


</div>
