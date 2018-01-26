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
    <?php $this->registerCssFile('/web/css/admin.css'); ?>

</head>
<body>
<?php $this->beginBody() ?>


        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name . ' (Admin Panel)',
            'brandUrl' => Yii::$app->homeUrl . 'admin/',
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Categories', 'url' => ['/admin/category']],
                ['label' => 'Products', 'url' => ['/admin/product']],
                ['label' => 'Orders', 'url' => ['/admin/order']],
                Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        NavBar::end();
        ?>


ADMIN PANEL
<div class="wrap">


    <div class="container">
        <div class="row">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
        </div>

            <div class="col-xs-12 col-sm-6 col-md-8">
                <?= $content ?>








    </div>
</div>

<footer class="footer fixed-bottom">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>


<?php

Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Продовжити</button>
                    <a href="'. Url::to(['cart/view']) .'" type="button" class="btn btn-success">Оформити</a>
                    <button id="cart_clear" type="button" class="btn btn-danger">Очистить корзину</button>',
]);
Modal::end();
?>



<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
