<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Noticia */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Noticia',
]) . $model->id_noticia;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Noticias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_noticia, 'url' => ['view', 'id' => $model->id_noticia]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="noticia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
