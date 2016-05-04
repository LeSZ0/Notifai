<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InscripcionEvento */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Inscripcion Evento',
]) . $model->id_inscripcion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inscripcion Eventos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_inscripcion, 'url' => ['view', 'id' => $model->id_inscripcion]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="inscripcion-evento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
