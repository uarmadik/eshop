<?php

namespace app\controllers;


use app\models\Cart;
use app\models\Image;
use yii\web\Controller;
use app\models\Products;
use Yii;

class CartController extends Controller
{
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        //var_dump($id);
        $qty = (!$qty) ? 1 : $qty;

        $produt = Products::findOne($id);
        if (empty($produt)) {

            return false;
        }

        $image = Image::findOne(['item_id' => $id, 'isMain' => 1]);
        if (!empty($image)) {

            $produt->image = '/web/uploads/store/item-'. $id . '/' . $image->fileName;
        } else {
            $produt->image = '/web/img/placeholder-image.png';
        }

        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($produt, $qty);

        if (!Yii::$app->request->isAjax) {

            return $this->redirect(Yii::$app->request->referrer);
        }

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));


    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItem()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);


        $this->layout = false;
        return $this->render('cart-modal', compact('session'));

    }

    public function actionShow()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();


        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionGetCartQty()
    {
        $session = Yii::$app->session;
        $session->open();
        $cartQty = $session->get('cart.qty');
        return $cartQty;
    }
}