<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Noticia */

$this->title = Yii::t('app', 'Nueva noticia');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Noticias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noticia-create">

    <h1 class='page-head-line'><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
