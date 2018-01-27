<?php

namespace app\controllers;

use app\models\Category;
use app\models\Image;
use app\models\Products;
use yii\web\Controller;
use Yii;

class MainController extends Controller
{
    public $layout = 'custom';

    public function actionIndex()
    {
		        $products = Products::find()->asArray()->all();
//        var_dump($products);



        $images = Image::find()->where(['item_id' => '8'])->asArray()->all();


		
        return $this->render('index', [
                                                'products' => $products,
                                                'images' => $images,
                                            ]);

    }

    public function actionProduct($category = null, $productId = null)
    {
        $categoryModel = Category::findOne(['url' => $category]);

        if (empty($categoryModel)) {
            Yii::$app->session->setFlash('error', 'There are not category - ' . $category);
            return $this->render('products');
        }

        if (!empty($productId) && is_numeric($productId)) {

            $product = Products::findOne($productId);
//            $product = Products::find($productId)->asArray()->one();
            $images = $product->images;
//            var_dump($images);
//            exit;

            return $this->render('product', [
                                                    'product' => $product,
                                                    'images' => $images,
                                                    'category' => $categoryModel,
                                                  ]);


        }

//        $products = Products::find()->where(['category_id' => $categoryModel->id])->asArray()->all();
        $products = Products::find()->where(['category_id' => $categoryModel->id])->all();


        return $this->render('products', ['products' => $products , 'category' => $categoryModel]);
    }

}