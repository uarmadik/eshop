<?php

namespace app\controllers;

use app\models\Category;
use app\models\Image;
use app\models\Products;
use yii\data\Pagination;
use yii\web\Controller;
use Yii;

class MainController extends Controller
{
    public $layout = 'custom';

    public function actionIndex()
    {
        $products = Yii::$app->cache->get('hitProducts');
        if ($products) {

            return $this->render('index', ['products' => $products]);
        }

        $products = Products::find()->where(['isHit' => '1'])->all();
        Yii::$app->cache->set('hitProducts', $products, 60*60);

        return $this->render('index', ['products' => $products]);
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

        foreach ($products as $product) {

            $mainImage = Image::findOne(['item_id' => $product->id, 'isMain' => 1]);
            if (!empty($mainImage)) {

                $product->mainImage = $mainImage->fileName;
            }
        }

        return $this->render('products', ['products' => $products , 'category' => $categoryModel]);
    }

    public function actionSearch()
    {
        $searchQuery = trim(Yii::$app->request->get('query'));
        if (empty($searchQuery)) {

            return $this->render('search');
        }

        $query = Products::find()->where(['like', 'name', $searchQuery]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', compact('products', 'pages', 'searchQuery'));
    }

}