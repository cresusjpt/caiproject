<?php

/* @var $this yii\web\View */
/* @var $model app\models\BienImmobilier */

$this->title = Yii::t('app', 'Bien Immobiliers');
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

    <div class="site-section" id="property-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="owl-carousel slide-one-item with-dots">
                        <?php foreach ($model->images as $image): ?>
                            <div><?= \yii\helpers\Html::img(\yii\helpers\Url::to('@web/' . $image->chemin), [
                                    'options' => [
                                        'class' => 'img-fluid'
                                    ]
                                ]) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-5 pl-lg-5 ml-auto">
                    <div class="mb-5">
                        <h3 class="text-black mb-4"><?=$model->categorie." ".$model->nom." ".$model->lieu?></h3>
                        <p><?=$model->vitrine?></p>
                    </div>

                    <div class="mb-5">
                        <div class="mt-5">
                            <p><a href="<?=\yii\helpers\Url::to(['site/index'])?>#contact-section" class="btn btn-primary btn-sm">Nous contacter</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>