<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoAviso */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Estado Aviso',
]) . $model->id_estado_aviso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estado Avisos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_estado_aviso, 'url' => ['view', 'id' => $model->id_estado_aviso]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estado-aviso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
