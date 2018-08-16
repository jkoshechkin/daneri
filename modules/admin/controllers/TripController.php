<?php

namespace app\modules\admin\controllers;
use app\models\Appointment;
use yii\data\ActiveDataProvider;
use app\models\ArticleEn;
use app\models\Category;
use Yii;
use app\models\Trip;
use app\modules\admin\models\TripSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TripController implements the CRUD actions for Trip model.
 */
class TripController extends Controller
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
     * Lists all Trip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TripSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trip model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Appointment::find()->where(['trip_id' => $id]),
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Trip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $categories = Category::find()->where(['type' => Category::PLACE])->all();
        $i=0;
        foreach ($categories as $category){
            $article = ArticleEn::find()->where(['category_id' => $category->id])->select(['category_id', 'title'])->asArray()->one();
            $item[$i] = $article;
            $i++;
        }

        $items = ArrayHelper::map($item,'category_id', 'title');

        $model = new Trip();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'items' => $items
        ]);
    }

    /**
     * Updates an existing Trip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $categories = Category::find()->where(['type' => Category::PLACE])->all();
        $i=0;
        foreach ($categories as $category){
            $article = ArticleEn::find()->where(['category_id' => $category->id])->select(['category_id', 'title'])->asArray()->one();
            $item[$i] = $article;
            $i++;
        }

        $items = ArrayHelper::map($item,'category_id', 'title');

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'items' => $items
        ]);
    }

    /**
     * Deletes an existing Trip model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        foreach (Appointment::find()->where(['trip_id' => $id])->all() as $item) $item->delete();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Trip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trip::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
