<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => '/admin/'];
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
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
            'status',
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

</div>
