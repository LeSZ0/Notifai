<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InscripcionEvento */

$this->title = Yii::t('app', 'Create Inscripcion Evento');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inscripcion Eventos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-evento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
