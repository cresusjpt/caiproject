<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Utilisateur */

$this->title = $model->id_client;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Utilisateurs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="utilisateur-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modifier'), ['update', 'id_user' => $model->id_user,'id_client' => $model->id_client], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Supprimer'), ['delete', 'id_user' => $model->id_user,'id_client' => $model->id_client], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Voulez vous vraiment supprimer cet élément ?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_client',
            'nom',
            'prenom',
            'categorie',
            'tel',
            'email:email',
            'identifiant',
            'motdepasse',
        ],
    ]) ?>

</div>
