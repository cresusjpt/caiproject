<?php

/* @var $this yii\web\View */

use yii\widgets\ActiveForm;

/* @var $models app\models\Messageforum */
/* @var $post app\models\Messageforum */

$this->title = Yii::t('app', 'Forum');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-content">
                    <div class="pt-5">
                        <h3 class="mb-5"><?= sizeof($models) ?> Messages</h3>
                        <ul class="comment-list">
                            <?php foreach ($models as $model): ?>
                                <li class="comment">
                                    <div class="vcard bio">
                                        <?= \yii\helpers\Html::img(\yii\helpers\Url::to('@web/template_asset/images/john_doe.png'), [
                                            'options' => [
                                                'alt' => 'placeholder'
                                            ]
                                        ]) ?>
                                    </div>
                                    <div class="comment-body">
                                        <h3><?= $model->client->prenom . " " . $model->client->nom ?></h3>
                                        <div class="meta"><?= Yii::$app->formatter->asDatetime($model->date_message) ?></div>
                                        <p><?= $model->message ?></p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <?php if (!Yii::$app->user->isGuest): ?>
                                <h3 class="mb-5">Ecrire sur le forum</h3>
                                <?php $form = ActiveForm::begin([
                                    'action' => ['forum/add'],
                                    'options' => [
                                        'class' => 'p-5 bg-light',
                                    ],
                                    'fieldConfig' => [
                                        'options' => [
                                            /*'tag' => false,*/
                                        ],
                                    ],
                                ]); ?>
                                <form action="#" class="p-5 bg-light">
                                    <div class="form-group">
                                        <?= $form->field($post, 'message')->textarea(['rows' => 10,'cols'=>30]) ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Envoyer" class="btn btn-primary">
                                    </div>

                                </form>
                                <?php ActiveForm::end(); ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
