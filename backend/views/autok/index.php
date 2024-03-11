<?php

use common\models\Autok;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Autok';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autok-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'gyarto',
            'tipus',
            'rendszam',
            'gyartasi_ev',
            [
                'class' => ActionColumn::className(),'template'=>'{view} {update}',
                'urlCreator' => function ($action, Autok $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'auto_id' => $model->auto_id]);
                 }
            ],
        ],
    ]); ?>


</div>
