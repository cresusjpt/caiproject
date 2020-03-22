<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $nom;
    public $prenom;
    public $email;
    public $objet;
    public $message;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['nom', 'prenom', 'email', 'objet', 'message'], 'required'],
            // name, email, subject and body are required
            //[['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Code de vérification',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email,$model=null)
    {
        if ($this->validate()) {

            if ($model != null){
                $view = Yii::$app->mailer->compose('email', ['model' => $model]);
            }else{
                $view = Yii::$app->mailer->compose();
            }
                $view->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->nom." ".$this->prenom])
                ->setSubject($this->objet)
                ->setTextBody($this->message)
                ->send();

            return true;
        }
        return false;
    }
}
