<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Category;
use Yii;
use app\modules\admin\models\Products;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Image;
use yii\web\UploadedFile;
use yii\data\ArrayDataProvider;


/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends AppAdminController
{
    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $images = Image::find()->all();
//        var_dump($images);
//        exit;

        $categoryId = Yii::$app->request->get('category_id');
        if (!empty($categoryId) && is_numeric($categoryId)) {

            $dataProvider = new ActiveDataProvider([
                'query' => Products::find()->where(['category_id' => $categoryId]),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);

        }

        $dataProvider = new ActiveDataProvider([
            'query' => Products::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $category = Category::findOne($model->category_id);

        $images = Image::find()->where(['item_id' => $id])->asArray()->all();
        $str = '';
        foreach ($images as $image) {

            $str .= '<img src="/web/uploads/store/item-'. $id .'/'. $image['fileName'] .'" width="180px"> ';
        }


        return $this->render('view', [
            'model' => $model,
            'category' => $category->name,
            'images' => $str,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {

            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');

            if (!$model->upload($model->id)) {

                throw new Exception('Files did not uploaded.');
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $images = Image::find()->asArray()->where(['item_id' => $model->id])->all();

//        $categories = Category::


        return $this->render('update', [
            'model'  => $model,
            'images' => $images,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDeleteImage()
    {
        $imageId = Yii::$app->request->get('imageId');
        if (!is_numeric($imageId)) {

            throw new Exception('Incorrect parameter imageId');
        }
        $image = Image::findOne($imageId);

        if (!$image) {

            throw New Exception('There are not file with id = ' . $imageId);
        }

        $image->delete();

        $imagePath = Yii::$app->basePath . '/web/uploads/store/item-' . $image->item_id . '/' . $image->fileName;
        if (!is_file($imagePath)) {
            throw new Exception('There are not file ' . $imagePath);
        }

        if (!unlink($imagePath)) {
            throw new Exception('Error. File: '. $imagePath .' did not remove!');
        }

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);


    }

    public function actionSetMainStatus()
    {
        $imageId = Yii::$app->request->get('imageId');
        $itemId = Yii::$app->request->get('itemId');
        if (!is_numeric($imageId) && !is_numeric($itemId)) {

            throw new Exception('Incorrect parameter $imageId or $imageId');
        }

        $images = Image::findAll(['item_id' => $itemId]);

        foreach ($images as $image) {

            if ($image->id == $imageId) {

                $image->isMain = 1;
                $image->save();

            } elseif($image->isMain == 1) {

                $image->isMain = 0;
                $image->save();
            }

        }

        return $this->redirect(['/admin/product/update', 'id' => $itemId]);
    }

    public function actionTest()
    {
        return 'TEST Ajax';
    }
}
