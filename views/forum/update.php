<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Messageforum */

$this->title = Yii::t('app', 'Update Messageforum: {name}', [
    'name' => $model->id_message,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Messageforums'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_message, 'url' => ['view', 'id' => $model->id_message]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="messageforum-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
