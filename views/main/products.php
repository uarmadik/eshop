<?php

use yii\helpers\Html;

?>

<div class="row">
    <?php if (!$products): ?>
        <h1>There are not items yet!</h1>
    <?php else: ?>
    <div class="col-xs-12 col-md-6">
        <?php foreach ($products as $product) { ?>





            <div class="item_card">
                <a href="/<?= $category .'/'. $product['id'] ?>">
                    <div class="item_card__img">
                        <?php

                            $image = $product->getImages()->where(['isMain' => 1])->one();
                            if ($image) {

                                $mainImagePath = '/web/uploads/store/item-'. $product['id'] . '/' . $image->fileName;
                                $alt = $product['name'];
                            } else {

                                $mainImagePath = '/web/img/placeholder-image.png';
                                $alt = 'image placeholder';
                            }
                        ?>


                        <img src="<?= $mainImagePath ?>" alt="<?= $alt ?>">
                    </div>
                </a>

                <a href="/<?= $category .'/'. $product['id'] ?>">
                    <h1><?= $product['name'] ?></h1>
                </a>
                <div class="item_card__price">
                    <p>Price: <b><?= $product['price'] ?></b></p>
                </div>
<!--                <a href="/cart/add" class="item_card__buy">Add to cart</a>-->
                <?= Html::a('Add to cart', ['/cart/add', 'id' => $product['id']], ['class' => 'add_to_cart', 'data-id' => $product['id']]) ?>
            </div>
        <?php } ?>
    </div>
    <?php endif; ?>

</div>




<!-- prototip  -->

<!---->
<!--    <div class="item_card">-->
<!--        <a href="#">-->
<!--            <div class="item_card__img">-->
<!--                <img src="/web/uploads/store/item-8/1516391564-vw-bulli-model-cars-leisure-hobby.jpg" alt="">-->
<!--            </div>-->
<!--        </a>-->
<!--        <h1>Product Name</h1>-->
<!--        <div class="item_card__price">-->
<!--            <p>Price: <b>123</b></p>-->
<!--        </div>-->
<!--        <a href="#" class="item_card__buy">Buy</a>-->
<!--    </div>-->


