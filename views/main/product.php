<?php
use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => $category->name, 'url' => '/' . $category->url];
$this->params['breadcrumbs'][] = $product->name;

$this->registerJsFile('/web/js/carousel.js');
$this->registerCssFile('/web/css/carousel.css');

$mainImage = '/web/img/placeholder-image.png';

foreach ($images as $image) {

    if ($image->isMain) {
        $mainImage ='/web/uploads/store/item-'. $product->id .'/'. $image->fileName ;
    }
}

?>
<div class="row item_detail">
    <div class="col-xs-12 col-md-6">
        <div id="slider" class="slider">
            <div class="mainImage">

                <img src="<?= $mainImage ?>" alt="">
            </div>

            <?php if (!empty($images) && count($images) > 1): ?>

            <div id="carousel" class="carousel">
<!--                <button class="arrow prev">⇦</button>-->
                <div class="arrow prev"></div>
                <div class="gallery">
                    <ul class="images">
                        <?php foreach ($images as $image) { ?>
                            <li>
                                <img src="/web/uploads/store/item-<?= $product->id ?>/<?= $image->fileName ?>" alt="">
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="arrow next"></div>
            </div>
            <? endif; ?>
        </div>

    </div>
    <div class="col-xs-12 col-md-6">
        <h2><?= $product->name ?></h2>
        <p><?= $product->description ?></p>
    </div>
    <div class="col-xs-12 product-bottom-line">

        <div class="price">
            <p>Ціна: <b><?= $product->price ?></b> грн</p>
        </div>
        <div class="quantity">
            <label for="productQty">Кількість</label>
            <input id="productQty" type="number" value="1" min="1">
        </div>
        <div class="addToCart">
            <?= Html::a('Add to cart', ['/cart/add', 'id' => $product['id']], ['class' => 'add_to_cart btn btn-primary', 'data-id' => $product['id']]) ?>
        </div>

    </div>

</div>
