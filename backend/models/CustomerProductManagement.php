<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "customer_product_management".
 *
 * @property int $id
 * @property int $customer_id
 * @property resource $product_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class CustomerProductManagement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_product_management';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'product_id'], 'required'],
            [['customer_id'], 'integer'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customers',
            'product_id' => 'Products',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getCustomer(){

        return $this->hasOne(User::className(),['id'=>'customer_id']);
    }

    public function getProducts($product_id){
        
        $prodcut_array=unserialize($product_id);
        $prodcut_array_map=ArrayHelper::map(Product::find()->Where(['IN','id',$prodcut_array])->andWhere(['status'=>'A'])->asArray()->all(),'id','product_name');
        $product_implode=implode("~", $prodcut_array_map);

        return $product_implode;
    }

    public function getCustomerdata(){

        $relationcustomer_map=ArrayHelper::map(CustomerProductManagement::find()->Where(['status'=>"A"])->asArray()->all(),'id','customer_id');
        return ArrayHelper::map(User::find()->select('id,username')->Where(['user_type'=>"U"])->andWhere(['NOT IN','id', $relationcustomer_map])->orderBy(['id'=>SORT_ASC])->asArray()->all(), 'id','username');
    }

    public function getupdatedCustomerdata(){
        return ArrayHelper::map(User::find()->select('id,username')->Where(['user_type'=>"U"])->orderBy(['id'=>SORT_ASC])->asArray()->all(), 'id','username');
    }

    public function getProductdata(){

        return ArrayHelper::map(Product::find()->select('id,product_name')->Where(['status'=>"A"])->orderBy(['id'=>SORT_ASC])->asArray()->all(), 'id','product_name');
    }

}
