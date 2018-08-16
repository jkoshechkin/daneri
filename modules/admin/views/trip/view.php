<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Trip */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'category_id',
            [
                'attribute' => 'name',
                'label' => 'Куда',
                'value' => function ($model) {
                    return $model->articleEn->title;
                },
                'format' => 'html',
            ],
            'start',
            'end',
//            'place',
            [
                'attribute' => 'place',
                'label' => 'Кол-во мест',
            ],

        ],
    ]) ?>
    <br><br>

    <h1>Записи на эту экскурсию</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'trip_id',
            'fio',
//            'date',
            'citizenship',
            //'passport',
            'contacts',
            'count',
            //'comments:ntext',
            'code',

            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to(['appointment/'.$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>
