<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstadoEvento */

$this->title = Yii::t('app', 'Create Estado Evento');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estado Eventos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-evento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
