<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seccion */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Seccion',
]) . $model->id_seccion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Seccions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_seccion, 'url' => ['view', 'id' => $model->id_seccion]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="seccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
