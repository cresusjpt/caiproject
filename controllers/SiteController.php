<?php

namespace app\controllers;

use app\models\BienImmobilierSearch;
use app\models\Utilisateur;
use phpDocumentor\Reflection\Types\This;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $searchModel = new BienImmobilierSearch();
        $dataProvider = $searchModel->searchIndexData(Yii::$app->request->queryParams);

        return $this->render('index', [
            'model' => $dataProvider
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionAdmin()
    {
        $this->layout = 'adminlayout';
        return $this->render('inde');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {

        $this->layout = 'loginmain';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * @return string|Response
     * @throws \yii\base\Exception
     */
    public function actionRegister(){


        $this->layout = 'loginmain';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Utilisateur();

        if ($model->load(Yii::$app->request->post())){
            if ($model->isSamePassword($model->motdepasse,$model->rawpassword)){
                $model->setPassword($model->rawpassword);
                $model->generateAuthKey();
                $model->id_client = 1;
                $model->generateToken();



                if ($model->validate() && $model->save() ){
                    Yii::$app->session->setFlash('success','Inscription réussie');
                    return $this->redirect(Url::toRoute(['site/login']));
                }else{
                    var_dump($model->getErrors() );
                    die();
                }
            }
        }

        return $this->render('register',[
            'model'=>$model
        ]);
    }
}
