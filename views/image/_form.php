<?php

use app\models\BienImmobilier;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Image */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="image-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'file',['options'=>['tag'=>'span']])->fileInput() ?>

    <?= $form->field($model, 'id_bien')->widget(Select2::class, [
        'data' => ArrayHelper::map(BienImmobilier::find()->all(), 'id_bien', 'detail'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner le client ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Enrégistrer'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
