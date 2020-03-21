<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bien_immobilier".
 *
 * @property int $id_bien
 * @property string $nom
 * @property string $lieu
 * @property float $prix
 * @property string $categorie
 * @property string $description
 * @property int $id_client
 *
 * @property Utilisateur $client
 * @property Image[] $images
 */
class BienImmobilier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bien_immobilier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom', 'lieu', 'prix', 'categorie', 'id_client'], 'required'],
            [['prix'], 'number'],
            [['id_client'], 'integer'],
            [['nom', 'lieu', 'categorie'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Utilisateur::class, 'targetAttribute' => ['id_client' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bien' => Yii::t('app', 'Id Bien'),
            'nom' => Yii::t('app', 'Nom'),
            'lieu' => Yii::t('app', 'Lieu'),
            'prix' => Yii::t('app', 'Prix'),
            'categorie' => Yii::t('app', 'Categorie'),
            'id_client' => Yii::t('app', 'Client'),
            'description' => Yii::t('app', 'Description du bien'),
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery|UtilisateurQuery
     */
    public function getClient()
    {
        return $this->hasOne(Utilisateur::className(), ['id_user' => 'id_client']);
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery|ImageQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['id_bien' => 'id_bien']);
    }

    /**
     * {@inheritdoc}
     * @return BienImmobilierQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BienImmobilierQuery(get_called_class());
    }

    public function getDetail(){
        return $this->nom." ".$this->lieu." ".$this->description;
    }
}
