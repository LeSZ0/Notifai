<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InscripcionEvento */

$this->title = $model->id_inscripcion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inscripcion Eventos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-evento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_inscripcion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_inscripcion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_inscripcion',
            'id_usuario',
            'id_evento',
            'fecha_inicio',
            'fecha_fin',
        ],
    ]) ?>

</div>
