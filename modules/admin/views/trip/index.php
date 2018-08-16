<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TripSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Экскурсии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Новая экскурсия', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'category_id',
            [
                'attribute' => 'category_id',
                'label' => 'Куда',
                'value' => function ($data) {
                    return $data->articleEn->title;
                },
                'format' => 'html',
            ],
//            'start',
            [
                'attribute' => 'start',

                'filter' => \yii\jui\DatePicker::widget(
                    [
                        'dateFormat' => 'yyyy-MM-dd',
                        'model' => $searchModel,
//                        'name' => 'PokazanieSearch[data_podachi]',
                        'attribute' => 'start',
                        'value' => $searchModel->start,
                        'options' => [
                            'class' => 'form-control',
                            'placeholder' => 'Выберите дату'
                        ],
                    ]
                ),
                'value' => function($data){
                    return $data->start;
                }
            ],
//            'end',
            [
                'attribute' => 'end',

                'filter' => \yii\jui\DatePicker::widget(
                    [
                        'dateFormat' => 'yyyy-MM-dd',
                        'model' => $searchModel,
//                        'name' => 'PokazanieSearch[data_podachi]',
                        'attribute' => 'end',
                        'value' => $searchModel->end,
                        'options' => [
                            'class' => 'form-control',
                            'placeholder' => 'Выберите дату'
                        ],
                    ]
                ),
                'value' => function($data){
                    return $data->end;
                }
            ],

//            'place',
            [
                'attribute' => 'place',
                'label' => 'Кол-во мест',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
