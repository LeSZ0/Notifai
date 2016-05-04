<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoEvento */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Estado Evento',
]) . $model->id_estado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estado Eventos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_estado, 'url' => ['view', 'id' => $model->id_estado]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estado-evento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
