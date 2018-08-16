<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ArticleRu */

$this->title = 'Create Article Ru';
$this->params['breadcrumbs'][] = ['label' => 'Article Rus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-ru-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
