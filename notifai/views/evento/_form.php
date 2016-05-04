<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use kartik\datetime\DateTimePicker;
use app\models\EstadoEvento;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textArea(['maxlength' => true, 'rows' => 4]) ?>

    <?= $form->field($model, 'fecha_inicio')->widget(DateTimePicker::classname(), 
                                                    [
                                                        'options' => ['placeholder' => 'Fecha de inicio del evento'],
                                                        'pickerButton' => ['icon' => 'time'],
                                                        'pluginOptions' => [
                                                            'autoclose' => true,
                                                            'format' => 'yyyy-dd-mm hh:ii:ss',
                                                        ]
                                                    ]); ?>

    <?= $form->field($model, 'fecha_fin')->widget(DateTimePicker::classname(), 
                                                    [
                                                        'options' => ['placeholder' => 'Fecha de inicio del evento'],
                                                        'pickerButton' => ['icon' => 'time'],
                                                        'pluginOptions' => [
                                                            'autoclose' => true,
                                                            'format' => 'yyyy-dd-mm hh:ii:ss',
                                                        ]
                                                    ]); ?>

    <?= $form->field($model, 'id_estado')->textInput(['value' => 1,'readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear el evento') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
