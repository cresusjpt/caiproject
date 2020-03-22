<?php

/* @var $this yii\web\View */
/* @var $contact \app\models\ContactForm */

use app\models\Image;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

if (!Yii::$app->user->isGuest && Yii::$app->user->identity->id_client == 0) {
    Yii::$app->response->redirect(Url::to(['site/admin'], true));
    return;
}

$this->title = 'Gestion Immobiliere';
?>

<div class="py-5 bg-light site-section how-it-works" id="howitworks-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-3">Comment ça marche ?</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="pr-5">
                    <span class="custom-icon flaticon-house text-primary"></span>
                    <h3 class="text-dark">Trouver l'immobilier</h3>
                    <p>A l'aide de la recherche par critère, trouvez la propriété de vos rêves.</p>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <div class="pr-5">
                    <span class="custom-icon flaticon-coin text-primary"></span>
                    <h3 class="text-dark">Acheter, Vendre ou Louer.</h3>
                    <p>Ensuite faites nous part de votre besoin.</p>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <div class="pr-5">
                    <span class="custom-icon flaticon-home text-primary"></span>
                    <h3 class="text-dark">On se charge du reste.</h3>
                    <p>Ensuite nous rentrons en jeu.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section" id="immobilier-section">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-md-7 text-left">
                <h2 class="section-title mb-3">Propriétes</h2>
            </div>
            <div class="col-md-5 text-left text-md-right">
                <div class="custom-nav1">
                    <a href="#" class="custom-prev1">Précedent</a><span class="mx-3">/</span><a href="#"
                                                                                                class="custom-next1">Suivant</a>
                </div>
            </div>
        </div>

        <div class="owl-carousel nonloop-block-13 mb-5">

            <?php
            foreach ($model as $oneModel) {

                $image = Image::findOne([
                    'id_bien' => $oneModel['id_bien']
                ]);
                ?>
                <div class="property">
                    <a href="<?= \yii\helpers\Url::to(['bien-immobilier/detail', 'id' => $oneModel->id_bien]) ?>">
                        <img src="<?= Url::to("@web/" . $image->chemin) ?>" alt="Image"
                             class="img-fluid">
                    </a>
                    <div class="prop-details p-3">
                        <div><strong class="price">€<?= $oneModel->prix ?></strong></div>
                        <div class="mb-2 d-flex justify-content-between">
                            <?= $oneModel->description ?>
                        </div>
                        <div><?= $oneModel->lieu ?></div>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="<?=Url::to(['bien-immobilier/liste'])?>" class="btn btn-primary btn-block">Voir la liste des immobiliers</a>
            </div>
        </div>
    </div>
</div>


<section class="site-section border-bottom" id="agents-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-7 text-left">
                <h2 class="section-title mb-3">Nos Agents</h2>
                <p class="lead">Quelques uns de nos agents qui se dévouent pourr vous faire plaisir.</p>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="team-member">
                    <figure>
                        <ul class="social">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                        <img src="<?= Url::to("@web/template_asset/images/person_5.jpg") ?>" alt="Image"
                             class="img-fluid">
                    </figure>
                    <div class="p-3">
                        <h3 class="mb-2">Mamadou Sow</h3>
                        <span class="position">Agent</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="team-member">
                    <figure>
                        <ul class="social">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                        <img src="<?= Url::to("@web/template_asset/images/person_6.jpg") ?>" alt="Image"
                             class="img-fluid">
                    </figure>
                    <div class="p-3">
                        <h3 class="mb-2">Alexandre de Coriolis</h3>
                        <span class="position">Agent</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="team-member">
                    <figure>
                        <ul class="social">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                        <img src="<?= Url::to("@web/template_asset/images/person_7.jpg") ?>" alt="Image"
                             class="img-fluid">
                    </figure>
                    <div class="p-3">
                        <h3 class="mb-2">Jeanpaul Tossou</h3>
                        <span class="position">Super Agent</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="site-section" id="apropos-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-6">

                <div class="owl-carousel slide-one-item-alt">
                    <img src="<?= Url::to("@web/template_asset/images/property_1.jpg") ?>" alt="Image"
                         class="img-fluid">
                    <img src="<?= Url::to("@web/template_asset/images/property_2.jpg") ?>" alt="Image"
                         class="img-fluid">
                    <img src="<?= Url::to("@web/template_asset/images/property_3.jpg") ?>" alt="Image"
                         class="img-fluid">
                    <img src="<?= Url::to("@web/template_asset/images/property_4.jpg") ?>" alt="Image"
                         class="img-fluid">
                </div>
                <div class="custom-direction">
                    <a href="#" class="custom-prev">Précedent</a><a href="#" class="custom-next">Suivant</a>
                </div>

            </div>
            <div class="col-lg-5 ml-auto">

                <h2 class="section-title mb-3">Nous sommes les meilleures dans le métier</h2>
                <p class="lead">Notre société : Gestion Immobilière est fondé depuis un millénaire.</p>
                <p>Nous avons obtenu pleins de prix internationaux et depuis 10 ans nous des experts recconnus en
                    France. Le taux de satisfaction de nos clients s'élévent à 95% l'année dernière.</p>

                <ul class="list-unstyled ul-check success">
                    <li>Meilleur bailleurs de l'europe</li>
                    <li>Meilleeurs ssatisfaction clientèle</li>
                    <li>Consectetur adipisicing</li>
                    <li>Lorem ipsum dolor</li>
                    <li>Placeat molestias animi</li>
                </ul>

            </div>
        </div>
    </div>
</section>


<section class="site-section border-bottom bg-light" id="services-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title mb-3">Services</h2>
            </div>
        </div>
        <div class="row align-items-stretch">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-house"></span></div>
                    <div>
                        <h3>Rechercher la propriété</h3>
                        <p>Une recherche plus aisée grace à nos critères plus facile.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-coin"></span></div>
                    <div>
                        <h3>Acheter</h3>
                        <p>L'une des options les plus utiliser. Moins de frais de transactions que par nos
                            conccurents.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-home"></span></div>
                    <div>
                        <h3>Acheter une maison ou un appart</h3>
                        <p>Les propriétaires nous ont fait confiance. les meilleures propriétés sont ici !</p>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-flat"></span></div>
                    <div>
                        <h3>Louer</h3>
                        <p>Faites Louer et venez louer chez nous. Que ce soit pour les vacances ou non, nous avons
                            pleins d'offres pour vous. Nos frais de gestion sont les plus accessibles du marché</p>
                        <p><a href="#">Learn More</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="500">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-mobile-phone"></span></div>
                    <div>
                        <h3>Application mobile</h3>
                        <p>Une application mobile multi plateforme pour vous tenir informé constamment dans votre
                            recherche de logement mais aussi pour faciliter vos échanges avec nos agents.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="site-section testimonial-wrap" id="testimonials-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title mb-3">Nos clients ont écrits ...</h2>
            </div>
        </div>
    </div>
    <div class="slide-one-item home-slider owl-carousel">
        <div>
            <div class="testimonial">

                <blockquote class="mb-5">
                    <p>&ldquo;Je joue tellement personnelle que mes équipiers m'ont voulu offrir une maison pour que j'aille en retraite. L'agene s'en est occupé trop bien!&rdquo;</p>
                </blockquote>

                <figure class="mb-4 d-flex align-items-center justify-content-center">
                    <div><img src="<?= Url::to("@web/template_asset/images/person_3.jpg") ?>" alt="Image"
                              class="w-50 img-fluid mb-3"></div>
                    <p>Tom Lailheugue</p>
                </figure>
            </div>
        </div>
        <div>
            <div class="testimonial">

                <blockquote class="mb-5">
                    <p>&ldquo;Simplement les meilleurs. J'ai acheté mon chateau de Biarritz sur la côte grace à eux&rdquo;</p>
                </blockquote>
                <figure class="mb-4 d-flex align-items-center justify-content-center">
                    <div><img src="<?= Url::to("@web/template_asset/images/person_2.jpg") ?>" alt="Image"
                              class="w-50 img-fluid mb-3"></div>
                    <p>Christine Lagarde</p>
                </figure>

            </div>
        </div>

        <div>
            <div class="testimonial">

                <blockquote class="mb-5">
                    <p>&ldquo;Lors de la crise du au virus chinois, je me suis réfugié dans une villa louée par ma femme brigitte avec eux. C'était simple le processus et ils ont été discrets!&rdquo;</p>
                </blockquote>
                <figure class="mb-4 d-flex align-items-center justify-content-center">
                    <div><img src="<?= Url::to("@web/template_asset/images/person_4.jpg") ?>" alt="Image"
                              class="w-50 img-fluid mb-3"></div>
                    <p>Emmanuel macron</p>
                </figure>


            </div>
        </div>

        <div>
            <div class="testimonial">

                <blockquote class="mb-5">
                    <p>&ldquo;La meilleure agence sur la côte basque.&rdquo;</p>
                </blockquote>
                <figure class="mb-4 d-flex align-items-center justify-content-center">
                    <div><img src="<?= Url::to("@web/template_asset/images/person_4.jpg") ?>" alt="Image"
                              class="w-50 img-fluid mb-3"></div>
                    <p>Bill gates</p>
                </figure>

            </div>
        </div>

    </div>
</section>

<section class="site-section bg-light bg-image" id="contact-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-12 text-center">
                <!-- <h3 class="section-sub-title">Get</h3> -->
                <h2 class="section-title mb-3">Nous contacter</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mb-5">

                <?php $form = ActiveForm::begin([
                    'action' => ['site/contacter'],
                    'id' => 'contact',
                    'options' => [
                        'class' => 'p-5 bg-white',
                    ],
                    'fieldConfig' => [
                        'options' => [
                            /*'tag' => false,*/
                        ],
                    ],
                ]); ?>

                <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                    <div class="alert alert-success">
                        Merci pour votre messsage. Nous allons vous répondre aussitôt que possible.
                    </div>

                <?php endif; ?>

                <h2 class="h4 text-black mb-5">Formulaire de Contact</h2>

                <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <?= $form->field($contact, 'nom')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($contact, 'prenom')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-md-12">
                        <?= $form->field($contact, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-md-12">
                        <?= $form->field($contact, 'objet')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <?= $form->field($contact, 'message')->textarea(['rows' => 7, 'cols' => 30]) ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <?= $form->field($contact, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]) ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="submit" value="Envoyer" class="btn btn-primary btn-md text-white">
                    </div>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
            <div class="col-md-5">

                <div class="p-4 mb-3 bg-white">
                    <p class="mb-0 font-weight-bold">Adresse</p>
                    <p class="mb-4">143 Avenue de verdun Biarritz, FRANCE</p>

                    <p class="mb-0 font-weight-bold">Tel</p>
                    <p class="mb-4"><a href="#">+33 06 06 06 06</a></p>

                    <p class="mb-0 font-weight-bold">Email</p>
                    <p class="mb-0"><a href="#">info@univ-uppa.fr</a></p>

                </div>

            </div>
        </div>
    </div>
</section>
