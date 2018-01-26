<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */

$this->title = 'Update Product: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<!--<div>-->
<!--    images-->
<!--    --><?php //foreach ($images as $image) { ?>
<!--        <div>-->
<!--            id: <h1>--><?//= $image['id']?><!--</h1>-->
<!--            path: <p>--><?//= $image['filePath'] ?><!--</p>-->
<!--            --><?php
//                $imagePath = '/web/uploads/store/item-' . $model->id . '/' . $image['filePath'];
//                echo Html::img($imagePath, ['alt' => 'image name']);
//
//                echo Html::a('Delete image', ['/admin/product/delete-image', 'imageId' => $image['id']]);
//            ?>
<!--        </div>-->
<!--    --><?php //} ?>
<!--</div>-->


<div>
    <table class="table table-bordered">
        <tr>
            <th>Image id</th>
            <th>Image name</th>
            <th>Is main</th>
            <th>Image</th>
            <th></th>
        </tr>
    <?php foreach ($images as $image) { ?>
        <tr>
            <td><?=$image['id']?></td>
            <td><?=$image['fileName']?></td>
            <td><?= ($image['isMain']) ? '<span style="color: green;">Yes</span>' : '<span style="color: red;">No</span>' ?></td>
            <td><?= Html::img('/web/uploads/store/item-'. $model->id .'/' . $image['fileName'], ['width' => '200px']) ?></td>
            <td>
<!--                --><?php
//                     echo Html::a('Make it main image', ['/admin/product/delete-image', 'imageId' => $image['id']], ['class' => 'btn btn-warning']);
//                    echo Html::a('Delete', ['/admin/product/delete-image', 'imageId' => $image['id']], ['class' => 'btn btn-danger']);
//                ?>
                <div><?= Html::a('Make it main image', ['/admin/product/set-main-status', 'imageId' => $image['id'], 'itemId' => $image['item_id']], ['class' => 'btn btn-warning']); ?></div>
                <div><?= Html::a('Delete', ['/admin/product/delete-image', 'imageId' => $image['id']], ['class' => 'btn btn-danger']); ?></div>
            </td>
        </tr>
    <?php } ?>
    </table>
</div>
