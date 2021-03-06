<?php

namespace app\controllers;

use Yii;
use app\models\BienImmobilier;
use app\models\BienImmobilierSearch;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BienImmobilierController implements the CRUD actions for BienImmobilier model.
 */
class BienImmobilierController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BienImmobilier models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BienImmobilierSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all BienImmobilier models.
     * @return mixed
     */
    public function actionListe()
    {
        $searchModel = new BienImmobilierSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = $dataProvider->query;
        $countquery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countquery->count(),
        ]);

        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('list', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }

    public function actionDetail($id){

        $model = BienImmobilier::findOne($id);

       return $this->render('detail',[
           'model'=>$model
       ]);
    }

    /**
     * Displays a single BienImmobilier model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BienImmobilier model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BienImmobilier();

        if ($model->load(Yii::$app->request->post())) {
            $model->date_modif = date('Y-m-d');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_bien]);

            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BienImmobilier model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->date_modif = date('Y-m-d');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_bien]);

            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BienImmobilier model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BienImmobilier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BienImmobilier the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BienImmobilier::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
