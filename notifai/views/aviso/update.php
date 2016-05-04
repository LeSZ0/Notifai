<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aviso */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Aviso',
]) . $model->id_aviso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Avisos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_aviso, 'url' => ['view', 'id' => $model->id_aviso]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="aviso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
