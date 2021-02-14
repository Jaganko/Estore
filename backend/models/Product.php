<?php

namespace backend\models;


use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $product_name
 * @property string $product_sdesc
 * @property string $product_desc
 * @property string $images
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Product extends \yii\db\ActiveRecord
{   
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'product_name', 'product_sdesc', 'product_desc','images'], 'required','on' => self::SCENARIO_CREATE],
            [['category_id', 'product_name', 'product_sdesc', 'product_desc'], 'required','on' => self::SCENARIO_UPDATE],
            [['images'], 'file', 'extensions' => 'jpg, png, jpeg', 'mimeTypes' => 'image/jpg, image/jpeg, image/png','maxFiles' => 10,'on' => self::SCENARIO_CREATE],
            [['images'], 'file', 'extensions' => 'jpg, png, jpeg', 'mimeTypes' => 'image/jpg, image/jpeg, image/png','maxFiles' => 10,'on' => self::SCENARIO_UPDATE],
            [['category_id'], 'integer'],
            [['product_sdesc', 'product_desc', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_name'], 'string', 'max' => 255],
            [['product_name'], 'unique'],
        ];
    }

    public function scenarios()
    {
        return [
             self::SCENARIO_CREATE => ['category_id', 'product_name', 'product_sdesc', 'product_desc','images'],
             self::SCENARIO_UPDATE => ['category_id', 'product_name', 'product_sdesc', 'product_desc','images'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'product_name' => 'Product Name',
            'product_sdesc' => 'Product Short Description',
            'product_desc' => 'Product Description',
            'images' => 'Images',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCategorydata(){
        return ArrayHelper::map(Category::find()->select('id,category_name')->orderBy(['id'=>SORT_ASC])->asArray()->all(),'id','category_name');
    }
}
