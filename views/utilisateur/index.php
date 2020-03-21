<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UtilisateurSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Utilisateurs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilisateur-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Ajouter Utilisateur'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="col-md-12">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nom',
                'prenom',
                'categorie',
                'tel',
                'email:email',
                //'identifiant',
                //'motdepasse',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>


    <?php Pjax::end(); ?>

</div>
