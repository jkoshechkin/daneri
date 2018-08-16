<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Appointments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Appointment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'trip_id',
            [
                'attribute' => 'trip_id',
//                'label' => 'Куда',
                'value' => function ($data) {
                    return Html::a($data->trip_id, ['trip/view', 'id' => $data->trip_id], ['class' => 'btn btn-primary']);
                },
                'format' => 'html',
            ],
            'fio',
//            'date',
//            'citizenship',
            //'passport',
            'contacts',
            //'count',
            //'comments:ntext',
//            'code',
            [
                'attribute' => 'code',
//                'label' => 'Куда',
                'value' => function ($data) {
                    if($data->code)
                        if($data->hotel->name)
                            return $data->hotel->name;
                    return $data->code;
                },
                'format' => 'html',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
