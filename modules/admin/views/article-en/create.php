<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArticleEn */

$this->title = 'Create Article En';
$this->params['breadcrumbs'][] = ['label' => 'Article Ens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-en-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
