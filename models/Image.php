<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id_image
 * @property string $chemin
 * @property string $file
 * @property int $id_bien
 *
 * @property BienImmobilier $bien
 */
class Image extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chemin', 'id_bien'], 'required'],
            [['id_bien'], 'integer'],
            [['file'], 'file'],
            [['chemin'], 'string', 'max' => 100],
            [['id_bien'], 'exist', 'skipOnError' => true, 'targetClass' => BienImmobilier::className(), 'targetAttribute' => ['id_bien' => 'id_bien']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_image' => Yii::t('app', 'Id Image'),
            'file' => Yii::t('app', 'Fichier'),
            'chemin' => Yii::t('app', 'Chemin'),
            'id_bien' => Yii::t('app', 'Id Bien'),
        ];
    }

    /**
     * Gets query for [[Bien]].
     *
     * @return \yii\db\ActiveQuery|BienImmobilierQuery
     */
    public function getBien()
    {
        return $this->hasOne(BienImmobilier::className(), ['id_bien' => 'id_bien']);
    }

    /**
     * {@inheritdoc}
     * @return ImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImageQuery(get_called_class());
    }
}
