<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Utilisateur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utilisateur-form">

    <?php $form = ActiveForm::begin([
        'id' => 'contact',
        'fieldConfig' => [
            'options' => [
                'tag' => false,
            ],
            /*'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],*/
        ],
    ]); ?>
    <div class="container">
        <h3>Inscription</h3>
        <h4>Remplissez le forrmulaire pour vous inscrire</h4>

        <fieldset>
            <?= Html::a('Acceuil',["/site/index"], ['class' => 'btn btn-primary']) ?>
        </fieldset>
        <fieldset>
            <?= $form->field($model, 'nom')->textInput(['maxlength' => true]) ?>
        </fieldset>
        <fieldset>
            <?= $form->field($model, 'prenom')->textInput(['maxlength' => true]) ?>
        </fieldset>
        <fieldset>
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        </fieldset>
        <fieldset>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </fieldset>
        <fieldset>
            <?= $form->field($model, 'identifiant')->textInput(['maxlength' => true])->label("Nom d'utilisateur") ?>
        </fieldset>
        <fieldset>
            <?= $form->field($model, 'motdepasse')->passwordInput(['maxlength' => true]) ?>
        </fieldset>
        <fieldset>
            <?= $form->field($model, 'rawpassword')->passwordInput(['maxlength' => true]) ?>
        </fieldset>
        <fieldset>
            <?= Html::submitButton(Yii::t('app', 'Enrégistrer'), ['class' => 'btn btn-success']) ?>
        </fieldset>

        <fieldset>
            <?= Html::a('Connexion',["/site/login"], ['class' => 'btn btn-primary']) ?>
        </fieldset>
    </div>

    <?php ActiveForm::end(); ?>

</div>
