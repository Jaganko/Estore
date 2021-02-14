<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\Session;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use backend\models\Product;
use backend\models\CustomerProductManagement;
use yii\web\UploadedFile;

/**
 * Login form
 */
class CommonSave extends Model
{

    public function ProductSave($product=array())
    {   

         /*echo "<pre>";
        print_r($model->file);
        die;*/
        $model = (isset($product['id'])) ? Product::findOne($product['id']) : new Product();
        if(isset($product['id']))
        {
            $model->scenario = Product::SCENARIO_UPDATE;
        }else
        {
            $model->scenario = Product::SCENARIO_CREATE;
        }

        $connection = \Yii::$app->db;        
        $transaction = $connection->beginTransaction();
        $session = Yii::$app->session;
        try 
        {
            if(!empty($product))
            {
                $model->category_id = $product['category_id'];
                $model->product_name = $product['product_name'];
                $model->product_sdesc = $product['product_sdesc'];
                $model->product_desc = $product['product_desc'];

                $model->file = UploadedFile::getInstances($model, 'images');
                if (!empty($model->file)) {
                    $image_attr=array();
                    foreach ($model->file as $file) {
                        $image_name= 'img/' . $file->basename .'.'. $file->extension;
                        $file->saveAs($image_name);
                        $image_attr[]=$image_name;
                    }
                    $groupimage=implode("~",$image_attr);
                    
                    $model->images=$groupimage;
                }
                if($model->save())
                {    
                    $transaction->commit();
                    return true;    
                }
                else
                {
                    $transaction->rollback();
                    return true;    
                }
            }
            else
            {
                $transaction->rollback();
                return true;
            }   
        } 
        catch(Exception $e) 
        {
            $transaction->rollback();
            return true;
        }
    }

    public function CustomerProductSave($customerproduct=array()){
        
        /*echo "<pre>";
        print_r($customerproduct);
        die;*/

        $model = (isset($customerproduct['id'])) ? CustomerProductManagement::findOne($customerproduct['id']) : new CustomerProductManagement();
        $connection = \Yii::$app->db;        
        $transaction = $connection->beginTransaction();
        $session = Yii::$app->session;

        try 
        {
            if(!empty($customerproduct))
            {

                $model->customer_id = (isset($customerproduct['id'])) ? $model->customer_id : $customerproduct['customer_id'];
                $model->product_id=serialize($customerproduct['product_id']);

                if($model->save())
                {    
                    $transaction->commit();
                    return true;    
                }
                else
                {
                    $transaction->rollback();
                    return true;    
                }
            }
            else
            {
                $transaction->rollback();
                return true;
            }   
        } 
        catch(Exception $e) 
        {
            $transaction->rollback();
            return true;
        }
    }
    
}
