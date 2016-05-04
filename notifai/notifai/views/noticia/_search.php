<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NoticiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="noticia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_noticia') ?>

    <?= $form->field($model, 'id_seccion') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'copete') ?>

    <?php // echo $form->field($model, 'contenido') ?>

    <?php // echo $form->field($model, 'id_usuario') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
