<?php

namespace app\controllers;

use app\models\Category;
use app\models\Products;
use yii\web\Controller;

class MainController extends Controller
{
    public $layout = 'custom';

    public function actionIndex()
    {
        $products = Products::find()->asArray()->all();
//        var_dump($products);
        return $this->render('index', ['products' => $products]);

    }

}