<?php

namespace app\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord
{
    public $mainImage;

    public static function tableName()
    {
        return 'products';
    }

    public function getImages()
    {
        return $this->hasMany(Image::className(), ['item_id' => 'id']);
    }
}