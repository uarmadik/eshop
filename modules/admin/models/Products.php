<?php

namespace app\modules\admin\models;

use app\models\Image;
use Yii;
use yii\base\Exception;

use yii\helpers\FileHelper;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $image
 * @property string $description
 * @property int $price
 * @property int $category_id
 */
class Products extends \yii\db\ActiveRecord
{
    public $imageFiles;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['price', 'category_id', 'isHit'], 'integer'],
            [['name', 'url', 'image'], 'string', 'max' => 255],
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'image' => 'Image',
            'description' => 'Description',
            'price' => 'Price',
            'category_id' => 'Category ID',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function upload($itemId)
    {


        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $path = 'uploads/store/item-' . $itemId;
                FileHelper::createDirectory($path);
                $fileName = mktime() .'-'. $file->baseName;
                $file->saveAs($path .'/'.  $fileName . '.' . $file->extension);

                // write to db

                $imageModel = new Image();
                $imageModel->fileName = $fileName . '.' . $file->extension;
                $imageModel->item_id = $itemId;
                $imageModel->save();
            }
            return true;
        } else {
            return false;
        }
    }
}
