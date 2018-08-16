<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'type',
            [
                'attribute' => 'name',
                'label' => 'Название',
                'value' => function ($data) {
                    return $data->articleEn->title;
                },
                'format' => 'html',
            ],
        [
            'attribute' => 'type',
            'value' => function ($data) {
                if($data->type==1) return 'Место отдыха (Trip)';
                if($data->type==2) return 'Тип отдыха (Offer)';
                if($data->type==0) return 'Главная страница';
                if($data->type==3) return 'Бронирование';
                if($data->type==4) return 'Контакты';
            },
            'format' => 'html',
        ],

            [
                'attribute' => 'image',
//                'value' => "<img width='200px' src='{$img->getUrl()}'>",
                'value' => function ($data) {
                    $img=$data->getImage();
                    $url=$img->getUrl();
                    return Html::img($url, ['alt' => '', 'height' => '100']);
                },
                'format' => 'html',

            ],
            [
                'attribute' => 'buttons',
                'label' => 'Статьи',
                'value' => function ($data) {
//                    if($data->articleEn->id)
                    return Html::a('English',['/admin/article-en/view', 'id' => $data->articleEn->id],  ['class' => 'btn btn-primary']);

                },
                'format' => 'html',
            ],
            [
                'attribute' => 'buttons',
                'label' => 'Статьи',
                'value' => function ($data) {
//                    if($data->articleEn->id)
                    return Html::a('Русский',['/admin/article-ru/view', 'id' => $data->articleRu->id],  ['class' => 'btn btn-primary']);

                },
                'format' => 'html',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
