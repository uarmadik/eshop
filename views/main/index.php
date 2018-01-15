<?php
use app\components\MenuWidget;
use yii\db\ActiveRecord;
?>

<h1>Index view</h1>

<div style="width: 250px; background-color: yellowgreen">
    menu
    <ul>
        <?= MenuWidget::widget(['tpl' => 'menu']) ?>
    </ul>
</div>

<?php foreach ($products as $product) { ?>
    <div>
        <h2><?php echo $product['name'] ?></h2>
        <p><?php echo $product['description'] ?></p>
        <p><b><?php echo $product['price'] ?></b></p>
    </div>
<?php } ?>
