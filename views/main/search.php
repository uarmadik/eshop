<?php

use yii\helpers\Html;
$this->title = 'eshop | search "' . Html::encode($searchQuery) . '"';

$this->params['breadcrumbs'][] = 'Search: "' . Html::encode($searchQuery) . '"';
?>

<div class="row">
    <?php if (!$products): ?>
        <div class="alert alert-info" role="alert">
            <p>Нічого не знайдено по запиту: "<b><?= Html::encode($searchQuery) ?></b>"</p>
        </div>

    <?php else: ?>

        <?php foreach ($products as $product) { ?>

            <?php
            $category = \app\models\Category::findOne($product->category_id);

            ?>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <div class="item_card">
                    <a href="/<?= $category->url .'/'. $product['id'] ?>">
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

                    <a href="/<?= $category->url .'/'. $product->id ?>">
                        <h1><?= $product->name ?></h1>
                    </a>
                    <div class="item_card__price">
                        <p>Price: <b><?= ($product->price) ? $product->price : 'ціна уточнюється...' ?></b></p>
                    </div>
                    <!--                <a href="/cart/add" class="item_card__buy">Add to cart</a>-->
                    <?= Html::a('Add to cart', ['/cart/add', 'id' => $product->id], ['class' => 'item_card__buy', 'data-id' => $product['id']]) ?>
                </div>
            </div>
        <?php } ?>


<div class="row">
    <div class="col-xs-12" style="text-align: center">
        <?php
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>
    </div>
</div>

<?php endif; ?>

</div>
