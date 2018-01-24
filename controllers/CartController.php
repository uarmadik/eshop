<?php

namespace app\controllers;


use app\models\Cart;
use app\models\Category;
use app\models\Image;
use yii\web\Controller;
use app\models\Products;
use Yii;

use app\models\OrderItems;
use app\models\Order;

class CartController extends Controller
{
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        //var_dump($id);
        $qty = (!$qty) ? 1 : $qty;

        $product = Products::findOne($id);
        if (empty($product)) {

            return false;
        }

        $category = Category::findOne($product->category_id)->url;
        $product->url = '/' . $category . '/' . $product->id;

        $image = Image::findOne(['item_id' => $id, 'isMain' => 1]);
        if (!empty($image)) {

            $product->image = '/web/uploads/store/item-'. $id . '/' . $image->fileName;
        } else {
            $product->image = '/web/img/placeholder-image.png';
        }

        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);

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
        $session = Yii::$app->session;
        $session->open();

        $order = new Order();

        if ($order->load(Yii::$app->request->post())) {
            //var_dump(Yii::$app->request->post());
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];

            if ($order->save()) {

                $this->saveOrderItems($session['cart'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваше замовлення прийнято, менеджер зв’яжеться з вами у найближчий час');

                Yii::$app->mailer->compose('order', ['session' => $session])
                    ->setFrom(['igor_ok1989@ukr.net' => 'eshop.loc'])
                    ->setTo($order->email)
                    ->setSubject('Заказ...')
                    ->send();

                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');

                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'помилка оформлення замовлення');
                return $this->refresh();
            }

        }


        return $this->render('view', ['session' => $session, 'order' => $order]);
    }

    public function actionGetCartQty()
    {
        $session = Yii::$app->session;
        $session->open();
        $cartQty = $session->get('cart.qty');
        return $cartQty;
    }

    protected function saveOrderItems($items, $order_id)
    {
        foreach ($items as $id => $item) {

            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();
        }
    }
}