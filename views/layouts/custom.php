<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\CustomAsset;
use yii\helpers\Url;

use app\components\MenuWidget;
use yii\bootstrap\Modal;

CustomAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>

<?php $this->beginBody() ?>
<div class="wrap">

    <div class="header-wrap">
        <header>
            <div class="logo">
                <a href="/">
                    <img src="/web/img/logo_placeholder.png" alt="logo placeholder" height="50px">
                </a>
            </div>
            <div class="header_cart-search">
                <div class="search">
                    <form action="/search" type="GET">
                        <input type="search" name="query" placeholder="Search" />
                        <button></button>
                    </form>
                </div>
                <div class="shoppingCart">
                    <a href="#" id="openCart"><img src="/web/img/shopping-cart.png" alt="shopping cart" title="Корзина"><span></span></a>
                </div>
            </div>

        </header>
    </div>

    <div class="container">
        <div class="row">
            <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'Головна', 'url' => '/'],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <aside class="sidebar">
                    <div id="leftside-navigation" class="nano">
                        <ul class="nano-content">
                            <?= MenuWidget::widget(['tpl' => 'menu']) ?>
                        </ul>
                    </div>
                </aside>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><a href="https://www.work.ua/ua/resumes/3965513/" target="_blank">Ihor Harmider</a></p>
    </div>
</footer>


<?php

    Modal::begin([
        'header' => '<h2>Корзина</h2>',
        'id' => 'cart',
        'size' => 'modal-lg',
        'footer' => '<button id="cart_clear" type="button" class="btn btn-danger">Очистить корзину</button>
                     <button type="button" class="btn btn-primary" data-dismiss="modal">Продовжити</button>
                     <a href="'. Url::to(['cart/view']) .'" type="button" class="btn btn-success">Оформити</a>',
    ]);
    Modal::end();
?>



<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
