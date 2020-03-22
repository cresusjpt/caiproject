<?php

use justinvoelker\separatedpager\LinkPager;

/* @var $this yii\web\View */
/* @var $models app\models\BienImmobilier */
/* @var $pages \yii\widgets\LinkPager */

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

    <div class="site-section" id="listings-section">
        <div class="container">

            <div class="row">
                <div class="col-md-3 order-1 order-md-2">
                    <div class="mb-5">
                        <h3 class="text-black mb-4 h5 font-family-2">Filtre</h3>
                        <form action="#">
                            <div class="form-group">
                                <div class="select-wrap">
                                    <span class="icon icon-keyboard_arrow_down"></span>
                                    <select class="form-control px-3">
                                        <option value="">Par date</option>
                                        <option value="">Par description</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select-wrap">
                                    <span class="icon icon-keyboard_arrow_down"></span>
                                    <select class="form-control px-3">
                                        <option value="">1 Chambre</option>
                                        <option value="">2 Chambres</option>
                                        <option value="">2+ Chambres</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select-wrap">
                                    <span class="icon icon-keyboard_arrow_down"></span>
                                    <select class="form-control px-3">
                                        <option value="">A vendre</option>
                                        <option value="">A louer</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="mb-5">
                        <h3 class="text-black mb-4 h5 font-family-2">Filtre par Prix</h3>
                        <div id="slider-range" class="border-primary"></div>
                        <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white"
                               disabled=""/>
                    </div>
                </div>
                <div class="col-md-9 order-2 order-md-1">
                    <?php foreach ($models as $model): ?>
                        <?php $image = \app\models\Image::findOne([
                            'id_bien' => $model->id_bien
                        ]); ?>

                        <div class="property horizontal d-flex">
                            <div class="mr-3 img-entry">
                                <a href="<?= \yii\helpers\Url::to(['bien-immobilier/detail', 'id' => $model->id_bien]) ?>"
                                <?= \yii\helpers\Html::img(\yii\helpers\Url::to('@web/' . $image->chemin), [
                                    'options' => [
                                        'class' => 'img-fluid'
                                    ]
                                ]) ?>
                                <img src="<?= \yii\helpers\Url::toRoute('@web/' . $image->chemin) ?>" alt="Image"
                                     class="img-fluid">
                                </a>
                            </div>
                            <div class="prop-details p-3">
                                <div>
                                    <a href="<?= \yii\helpers\Url::to(['bien-immobilier/detail', 'id' => $model->id_bien]) ?>"><strong
                                                class="price">€ <?= $model->prix ?></strong></a></div>
                                <div class="mb-2 d-flex justify-content-between">
                                    <span class="w border-r"><?= $model->description ?></span>
                                </div>
                                <div><?= $model->lieu ?></div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-9">
                    <div class="custom-pagination text-center">
                        <?=
                        LinkPager::widget([
                            'pagination' => $pages,
                            'pagination' => $pages,
                            //'activePageCssClass' => 'active-page' ,
                            'prevPageLabel' => false,
                            'nextPageLabel' => false,
                            'maxButtonCount' => 5,
                            'options' => [
                                'class' => 'custom-pagination text-center'
                            ]
                        ]);
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
