<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\ArticleEn;
use app\modules\admin\models\ArticleRu;
use Yii;
use app\modules\admin\models\Category;
use app\modules\admin\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param string $id
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();
        $article_en = new ArticleEn();
        $article_ru = new ArticleRu();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->gallery = UploadedFile::getInstances($model, 'gallery');
            if($model->gallery) {
                $model->uploadGallery();
            }
            $article_en->category_id=$model->id;
            $article_ru->category_id=$model->id;
            $article_en->save();
            $article_ru->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $count_pics= count($model->getImages());
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->gallery = UploadedFile::getInstances($model, 'gallery');
            $new_pics_count = count($model->gallery);
            if($count_pics + $new_pics_count <= Category::MAX_PICS) {
                if ($model->gallery) {
                    $model->uploadGallery();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->session->setFlash('danger', 'Превышено максимальное количество изображений на '.($count_pics+$new_pics_count-Category::MAX_PICS).' штук(и)!');

                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionSetMain(){
        $id = Yii::$app->request->get('id');
        $img = Yii::$app->request->get('img');
        $model = $this->findModel($id);

//        $model->attachImage($img, true); //will attach image and make it main

        foreach($model->getImages() as $pic){
            if($pic->id == $img){
                $model->setMainImage($pic);//will set current image main
            }
        }

        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionDelPic(){
        $id = Yii::$app->request->get('id');
        $img = Yii::$app->request->get('img');
        $model = $this->findModel($id);
        foreach($model->getImages() as $pic){
            if($pic->id == $img){
                $model->removeImage($pic);
            }
        }
        return $this->render('view', [
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->removeImages();
        $this->findModel($id)->delete();
        ArticleEn::find()->where(['category_id' => $id])->one()->delete();
        ArticleRu::find()->where(['category_id' => $id])->one()->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
