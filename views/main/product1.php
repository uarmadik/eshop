<?php
use yii\helpers\Html;
?>
<div class="row item_detail">
    <div class="col-xs-12 col-md-6">
        <div class="gallery">
            <div class="images">
                <?php foreach ($images as $image) { ?>
                    <div class="image <?= ($image['isMain']) ? 'active' : '' ?>">
                        <img src="/web/uploads/store/item-<?= $product->id ?>/<?= $image->fileName ?>" alt="">
                    </div>
                <?php } ?>
            </div>
            <div style="width: 100%; overflow-x: auto">
            <div class="thumbs">
                <?php foreach ($images as $image) { ?>
                    <div class="thumb <?= ($image['isMain']) ? 'active' : '' ?>">
                        <img src="/web/uploads/store/item-<?= $product->id ?>/<?= $image->fileName ?>" alt="">
                    </div>
                <?php } ?>
            </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <h2><?= $product->name ?></h2>
        <p><?= $product->description ?></p>
        <p><?= $product->price ?></p>
        <label for="productQty">Кількість одиниць</label>
        <input id="productQty" type="number" value="1" min="1">
        <?= Html::a('Add to cart', ['/cart/add', 'id' => $product['id']], ['class' => 'add_to_cart', 'data-id' => $product['id']]) ?>
    </div>
</div>
