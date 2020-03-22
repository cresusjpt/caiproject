<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messageforum".
 *
 * @property int $id_message
 * @property string $date_message
 * @property string $message
 * @property int $id_client
 *
 * @property Utilisateur $client
 */
class Messageforum extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messageforum';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_message', 'message', 'id_client'], 'required'],
            [['date_message'], 'safe'],
            [['message'], 'string'],
            [['id_client'], 'integer'],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Utilisateur::className(), 'targetAttribute' => ['id_client' => 'id_client']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_message' => Yii::t('app', 'Id Message'),
            'date_message' => Yii::t('app', 'Date Message'),
            'message' => Yii::t('app', 'Message'),
            'id_client' => Yii::t('app', 'Id Client'),
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
     * {@inheritdoc}
     * @return MessageforumQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageforumQuery(get_called_class());
    }
}
