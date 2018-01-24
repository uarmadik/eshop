<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


?>

<div class="container">
    <?php if(!empty($session['cart'])): ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($session['cart'] as $id => $item):?>
                    <tr>
                        <td><?= Html::img($item['image'], ['alt' => $item['name'], 'height' => 50]) ?></td>
                        <td><a href="<?= Url::to($item['product_url']) ?>"><?= $item['name']?></a></td>
                        <td><?= $item['qty']?></td>
                        <td><?= $item['price']?></td>
                        <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                    </tr>
                <?php endforeach?>
                <tr>
                    <td colspan="4">Итого: </td>
                    <td><?= $session['cart.qty']?></td>
                </tr>
                <tr>
                    <td colspan="4">На сумму: </td>
                    <td><?= $session['cart.sum']?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <hr/>
        <?php $form = ActiveForm::begin() ?>
            <?= $form->field($order, 'name')->textInput() ?>
            <?= $form->field($order, 'email') ?>
            <?= $form->field($order, 'phone') ?>
            <?= $form->field($order, 'address') ?>
            <?= Html::submitButton('Замовити', ['class' => 'btn btn-success']) ?>
        <?php $form = ActiveForm::end() ?>


    <?php else: ?>
        <h3>Корзина пуста</h3>
    <?php endif;?>

</div>
