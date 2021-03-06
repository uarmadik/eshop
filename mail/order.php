<?php
use yii\helpers\Html;
?>

<div class="info">
    <p>Доброго дня, <b><?= $order->name ?></b>!</p>
    <p>Ваше замовлення № <b><?= $order->id ?></b> прийняте, менеджер зв’яжеться з Вами найближчим часом.</p>
    <p>Гарного дня!</p>
</div>
<div class="table-wrap">
    <table cellspacing="0" width="100%">
        <thead>
        <tr style="background-color: #3a87ad; color: #fff;">
            <th>Наименование</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Сума</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($session['cart'] as $id => $item):?>
            <tr>
                <td><?= $item['name']?></td>
                <td><?= $item['qty']?></td>
                <td><?= $item['price']?> грн</td>
                <td><?= $item['qty'] * $item['price']?> грн</td>
            </tr>
        <?php endforeach?>
        <tr style="background-color: #b1dfbb">
            <td colspan="3">Итого: </td>
            <td><?= $session['cart.qty']?></td>
        </tr>
        <tr style="background-color: #8bdf9f">
            <td colspan="3">На сумму: </td>
            <td><?= $session['cart.sum']?> грн</td>
        </tr>
        </tbody>
    </table>
</div>