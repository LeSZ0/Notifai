<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AvisoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Avisos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aviso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Aviso'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_aviso',
            'nombre',
            'descripcion',
            'fecha_inicio',
            'fecha_fin',
            // 'creado_por_id',
            // 'modificado_por_id',
            // 'estado_id',
            // 'rubro_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
