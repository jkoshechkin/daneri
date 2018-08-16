<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

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

    <?php $images = $model->getImages(); $main = $model->getImage(); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
        ],
    ]) ?>

    <?php
    foreach ($images as $image):
        if($image->getPathToOrigin()!=$main->getPathToOrigin()):?>
            <div class="admin-gallery">
                <a href="<?=\yii\helpers\Url::to(['/admin/category/set-main', 'id' => $model->id, 'img' => $image->id])?>"><img src="<?=$image->getUrl('x150')?>"></a>
                <a class="admin-img" href="<?=\yii\helpers\Url::to(['/admin/category/del-pic', 'id' => $model->id, 'img' => $image->id])?>"><span class="glyphicon glyphicon-remove-sign"></span></a>
            </div>
        <?php else:?>
            <div class="admin-gallery">
                <img style="border: 5px solid black" src="<?=$image->getUrl('x140')?>">
                <!--                <a class="admin-img" href="--><?//=\yii\helpers\Url::to(['/admin/photo-album/del-pic', 'id' => $model->id, 'img' => $image->id])?><!--"><span class="glyphicon glyphicon-remove-sign"></span></a>-->
            </div>
        <?php endif;?>
    <?php endforeach; ?>

</div>
