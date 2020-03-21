<?php


namespace app\controllers;


use Yii;
use yii\web\Controller;

class PController extends Controller
{

    /**
     * @param \yii\base\Action $action
     * @return bool
     * @throws \yii\web\ForbiddenHttpException
     */
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest && Yii::$app->controller->action->id != 'login' && Yii::$app->controller->action->id != 'register' ){
            Yii::$app->user->loginRequired();
        }
        return true;
    }


}