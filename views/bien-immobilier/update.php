<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BienImmobilier */

$this->title = Yii::t('app', 'Modifier Bien Immobilier: {name}', [
    'name' => $model->id_bien,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bien Immobiliers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bien, 'url' => ['view', 'id' => $model->id_bien]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Modifier');
?>
<div class="bien-immobilier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
