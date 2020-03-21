<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BienImmobilier */

$this->title = Yii::t('app', 'Ajouter un Bien Immobilier');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bien Immobiliers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bien-immobilier-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
