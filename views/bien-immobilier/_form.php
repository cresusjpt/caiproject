<?php

use app\models\Utilisateur;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BienImmobilier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bien-immobilier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lieu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prix')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vitrine')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_client')->widget(Select2::class, [
        'data' => ArrayHelper::map(Utilisateur::find()->all(), 'id_user', 'civilite'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner le client ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    $form->field($model, 'id_client')->textInput() ?>

    <?= $form->field($model, 'categorie')->radioList(['Appartement' => "Appartement", 'Maison' => "Maison", "Chambre" => "Chambre"]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Enrégistrer'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
