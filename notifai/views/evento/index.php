<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Eventos más recientes');
$titleAdmin = Yii::t('app', 'Todos los eventos');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-index">

    <?php if (!Yii::$app->user->isGuest): ?>

    <h1 class='page-head-line'><?= Html::encode($titleAdmin) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear un evento'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_evento',
            'nombre',
            'descripcion',
            'fecha_inicio',
            'fecha_fin',
            'id_estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>
<?php endif; ?>
<?php if (Yii::$app->user->isGuest): ?>
    <h1 class='page-head-line'><?= Html::encode($this->title) ?></h1>
    <?= 
    ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView'=>'_view',
    ]); 
    ?>
<?php endif; ?>
</div>
