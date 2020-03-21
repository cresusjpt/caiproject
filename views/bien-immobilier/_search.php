<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BienImmobilierSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bien-immobilier-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_bien') ?>

    <?= $form->field($model, 'nom') ?>

    <?= $form->field($model, 'lieu') ?>

    <?= $form->field($model, 'prix') ?>

    <?= $form->field($model, 'categorie') ?>

    <?php // echo $form->field($model, 'id_client') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Rechercher'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Annuler'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
