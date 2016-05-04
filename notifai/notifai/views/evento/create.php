<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Evento */

$this->title = Yii::t('app', 'Nuevo evento');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Eventos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-create">

    <h1 class='page-head-line'><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
