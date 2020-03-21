<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "utilisateur".
 *
 * @property int $id_user
 * @property int $id_client
 * @property string $nom
 * @property string $prenom
 * @property string|null $categorie
 * @property string $tel
 * @property string $email
 * @property string $identifiant
 * @property string $motdepasse
 * @property string $rawpassword
 * @property string $token
 * @property string $authkey
 *
 * @property BienImmobilier[] $bienImmobiliers
 * @property Messageforum[] $messageforums
 */
class Utilisateur extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $rawpassword;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'utilisateur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom', 'prenom', 'tel', 'email', 'identifiant', 'motdepasse','rawpassword'], 'required'],
            ['identifiant','unique','targetClass'=>'app\models\Utilisateur','message'=>'L\'identifiant est déja pris'],
            [['id_client'], 'integer'],
            [['email'], 'email'],
            [['motdepasse'], 'string', 'min' => 8,'message'=>'le mot de passe doit être supérieur ou égale à 8'],
            [['rawpassword'], 'string', 'min' => 8,'message'=>'le mot de passe doit être supérieur ou égale à 8'],
            [['nom', 'prenom', 'categorie', 'email', 'identifiant'], 'string', 'max' => 50],
            [['token', 'authkey'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => Yii::t('app', 'Utilisateur'),
            'id_client' => Yii::t('app', 'Client'),
            'nom' => Yii::t('app', 'Nom'),
            'prenom' => Yii::t('app', 'Prenom'),
            'categorie' => Yii::t('app', 'Catégorie'),
            'tel' => Yii::t('app', 'Téléphone'),
            'email' => Yii::t('app', 'Email'),
            'identifiant' => Yii::t('app', 'Identifiant'),
            'motdepasse' => Yii::t('app', 'Mot de passe'),
            'rawpassword' => Yii::t('app', 'Confirmation'),
        ];
    }

    /**
     * Gets query for [[BienImmobiliers]].
     *
     * @return \yii\db\ActiveQuery|BienImmobilierQuery
     */
    public function getBienImmobiliers()
    {
        return $this->hasMany(BienImmobilier::class, ['id_user' => 'id_user']);
    }

    /**
     * Gets query for [[Messageforums]].
     *
     * @return \yii\db\ActiveQuery|MessageforumQuery
     */
    public function getMessageforums()
    {
        return $this->hasMany(Messageforum::class, ['id_user' => 'id_user']);
    }

    /**
     * {@inheritdoc}
     * @return UtilisateurQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UtilisateurQuery(get_called_class());
    }

    /**
     * @inheritDoc
     */
    public static function findIdentity($id)
    {
        return static::findOne([
            'id_user'=>$id
        ]);
    }

    /**
     * @inheritDoc
     */
    public static function findByUsername($username)
    {
        return static::findOne([
            'identifiant'=>$username
        ]);
    }

    /**
     * @inheritDoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne([
            'token'=>$token
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * @inheritDoc
     */
    public function getAuthKey()
    {
        return $this->authkey;
    }

    /**
     * @inheritDoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authkey = $authKey;
    }

    /**
     * @param $password
     * @throws \yii\base\Exception
     */
    public function setPassword($password){
        $this->motdepasse = Yii::$app->security->generatePasswordHash($password);
    }

    public function isSamePassword($password1, $password2){
        if ($password1 == $password2){
            return true;
        }
        return false;
    }

    public function validatePassword($password){
        return Yii::$app->security->validatePassword($password,$this->motdepasse);
    }

    /**
     * @throws \yii\base\Exception
     */
    public function generateAuthKey(){
        $this->authkey = Yii::$app->security->generateRandomString();
    }

    /**
     * @throws \yii\base\Exception
     */
    public function generateToken(){
        $this->token = Yii::$app->security->generateRandomString();
    }

    public function getCivilite(){
        return $this->nom ." ".$this->prenom;
    }
}
