<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;

$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => '/admin/order/'];
$this->params['breadcrumbs'][] = 'Замовлення № ' . $model->id;

?>
<div class="order-view">

    <h1>Замовлення № <?= $model->id ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
//            'status',
            [
                'attribute' => 'status',
                'value' => function($data) {
                    return (!$data->status) ? '<span class="text-success">Активно</span>' : '<span class="text-danger">Заверно</span>';
                },
                'format' => 'html',
            ],

            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

    <?php $items = $model->orderItems;?>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($items as $item):?>



                <tr>
                    <td><a href="<?= \yii\helpers\Url::to(['/admin/product/view', 'id' => $item->product_id])?>"><?= $item['name']?></a></td>
                    <td><?= $item['qty_item']?></td>
                    <td><?= $item['price']?></td>
                    <td><?= $item['sum_item']?></td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>

</div>
