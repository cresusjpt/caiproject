<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<?php $this->beginBody() ?>
<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-xl-2">
                    <h1 class="mb-0 site-logo m-0 p-0"><a href="<?=Url::to(['site/index'])?>" class="mb-0">Gestion Immobilière.</a></h1>
                </div>

                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="#acceuil-section" class="nav-link">Acceuil</a></li>
                            <li><a href="#immobilier-section" class="nav-link">Immobilier</a></li>
                            <li><a href="#agents-section" class="nav-link">Agents</a></li>
                            <li><a href="#apropos-section" class="nav-link">A propos</a></li>
                            <?php
                            if (!Yii::$app->user->isGuest) {
                                ?>
                                <li><a href="<?=Url::toRoute(['forum/post'])?>" class="nav-link">Forum</a></li>
                                <?php
                            }
                            ?>

                            <?php
                            if (Yii::$app->user->isGuest) {
                                ?>
                                <li><a href="<?= Url::toRoute(['site/login']) ?>" class="nav-link">Connexion</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="<?=Url::toRoute(['site/logout'])?>">Deconnexion</a></li>
                                <?php
                            }
                            ?>
                            <li><a href="#contact-section" class="nav-link">Contact</a></li>
                        </ul>
                    </nav>
                </div>


                <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#"
                                                                            class="site-menu-toggle js-menu-toggle text-black float-right"><span
                                class="icon-menu h3"></span></a></div>

            </div>
        </div>

    </header>

    <div class="site-blocks-cover overlay"
         style="background-image: url(<?= Url::to('@web/template_asset/images/hero_1.jpg') ?>);" data-aos="fade"
         id="acceuil-section">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 mt-lg-5 text-center">
                    <h1>Acheter, Vendre et Louer des immobiliers</h1>
                    <p class="mb-5">Si c'est ce que vous cherchez, et bien vous êtes sur le bon site. Nous sommes les
                        meilleurs dans notre métier.</p>

                </div>
            </div>
        </div>

        <a href="#howitworks-section" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>


    <?= $content ?>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-5">
                            <h2 class="footer-heading mb-4">A Propos</h2>
                            <p>Le sujet de notre devoir etait la réalisation d'un site web minimaliste de gestion
                                immobilière.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="follow">
                        <h2 class="footer-heading mb-4">Nous suivre</h2>
                        <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        <a href="https://www.linkedin.com/in/jean-paul-tossou/" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                    </div>


                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="border-top pt-5">
                        <p>
                            &copy;<?= date('Y') ?>Projet de Conception d'application Internet 2019 - 2020 <i
                                    class="icon-heart" aria-hidden="true"></i> par le groupe De coriolis, Mamadou et
                            Tossou
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
