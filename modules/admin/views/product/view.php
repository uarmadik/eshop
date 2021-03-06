<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'name',
//            'url:text',
//            'image',
            'description:raw',
            'price',
            [
                'attribute' => 'isHit',
                'value' => function($data) {
                    return ($data->isHit) ? '<span style="color: green">Yes</span>' : '<span style="color: red">No</span>';
                },
                'format' => 'html',
            ],
//            'category_id',
            [
                'label' => 'Category',
                'value' => $category,
            ],
            [
                'label' => 'Images',
                'value' => $images,
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
