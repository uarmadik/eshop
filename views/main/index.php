<?php
use app\components\MenuWidget;
use yii\db\ActiveRecord;

?>

<div class="row">
    <div class="col-xs-12 col-md-3">
<!--        <aside class="sidebar">-->
<!--            <div id="leftside-navigation" class="nano">-->
<!--                <ul class="nano-content">-->
<!--                    --><?//= MenuWidget::widget(['tpl' => 'menu']) ?>
<!--                </ul>-->
<!--            </div>-->
<!--        </aside>-->
    </div>
    <div class="col-xs-12 col-md-9">
        <?php if (!$products): ?>
            <h1>There are not items yet!</h1>
        <?php else: ?>
            <?php foreach ($products as $product) { ?>
                <h1><?= $product['name']?></h1>
            <?php } ?>
        <?php endif; ?>
    </div>
</div>



<?php //foreach ($products as $product) { ?>
<!--    <div>-->
<!--        <h2>--><?php //echo $product['name'] ?><!--</h2>-->
<!--        <p>--><?php //echo $product['description'] ?><!--</p>-->
<!--        <p><b>--><?php //echo $product['price'] ?><!--</b></p>-->
<!--    </div>-->
<?php //} ?>



<div style="width: 320px">

    <p>Slider - 2</p>


<!--<div class="gallery">-->
    <!--    <div class="images">-->
    <!--        --><?php //foreach ($images as $image) { ?>
    <!--            <div class="image --><?//= ($image['isMain']) ? 'active' : '' ?><!--">-->
    <!--                <img src="/web/uploads/store/item-8/--><?//= $image['fileName'] ?><!--"  alt="">-->
    <!--            </div>-->
    <!--        --><?php //} ?>
    <!--    </div>-->
    <!--    <div style="width: 100%; overflow-x: auto">-->
    <!--    <div class="thumbs">-->
    <!--        --><?php //foreach ($images as $image) { ?>
    <!--            <div class="thumb --><?//= ($image['isMain']) ? 'active' : '' ?><!--">-->
    <!--                <img src="/web/uploads/store/item-8/--><?//= $image['fileName'] ?><!--" alt="">-->
    <!--            </div>-->
    <!--        --><?php //} ?>
    <!--    </div>-->
    <!--    </div>-->
    <!--</div>-->