<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Connexion';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <?php $form = ActiveForm::begin([
        'id' => 'contact',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'options' => [
                'tag' => false,
            ],
        ],
    ]); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Remplissez le formulaire pour vous connecter:</p>

    <fieldset>
        <?= Html::a('Acceuil',["/site/index"], ['class' => 'btn btn-primary']) ?>
    </fieldset>

    <fieldset>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    </fieldset>

    <fieldset>
        <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control']) ?>
    </fieldset>
    <fieldset>
        <?= Html::submitButton('Connexion', ['id' => 'contact-submit', 'class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </fieldset>

    <fieldset>
        <?= Html::a('Inscription',["/site/register"], ['class' => 'btn btn-primary']) ?>
    </fieldset>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->label('Rester connecté') ?>

    <?php ActiveForm::end(); ?>
</div>
