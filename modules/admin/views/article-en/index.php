<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ArticleEnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Article Ens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-en-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Article En', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'title',
            'minicontent:html',
            'content:html',
            //'keywords',
            //'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
