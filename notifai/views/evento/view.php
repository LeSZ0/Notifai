<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */

$this->title = $model->nombre;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Eventos'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-view">

    <h1 class='page-head-line'><?= Html::encode($this->title) ?></h1>
    
    <?php if (!Yii::$app->user->isGuest): ?>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_evento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_evento], [
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
            'id_evento',
            'nombre',
            'descripcion',
            'fecha_inicio',
            'fecha_fin',
            'id_estado',
        ],
    ]) ?>

    <?php endif; ?>
    <p><?= Html::encode($model->descripcion) ?></p>
</div>
