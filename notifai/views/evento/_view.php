<?php
use yii\helpers\Html;
/* @var $this EventoController */
/* @var $model Evento */
?>
<div class="col-md-12 ">
<h3><?php echo Html::encode($model->nombre); ?></h3>
<p><?php echo Html::encode($model->descripcion); ?></p>
<?php echo Html::a(Html::encode('ver mas...'), ['view', 'id'=>$model->id_evento]);
?>
<hr></hr>
</div>