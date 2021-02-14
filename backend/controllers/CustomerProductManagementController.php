<?php

namespace backend\controllers;

use Yii;
use backend\models\CustomerProductManagement;
use backend\models\CustomerProductManagementSearch;
use backend\models\Product;
use backend\models\Category;
use backend\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\CommonSave;

/**
 * CustomerProductManagementController implements the CRUD actions for CustomerProductManagement model.
 */
class CustomerProductManagementController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        $session = Yii::$app->session;

        if(isset($session['user_logintype']) && $session['user_logintype'] == "admin"){
        return parent::beforeAction($action);
        }else{
        return $this->redirect(['site/index']);   
        }    

    }
    
    /**
     * Lists all CustomerProductManagement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerProductManagementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CustomerProductManagement model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CustomerProductManagement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CustomerProductManagement();

        if ($model->load(Yii::$app->request->post())) {

            $customerproduct_array=Yii::$app->request->post('CustomerProductManagement');

            $CommonSave = new CommonSave();
            if($CommonSave->CustomerProductSave($customerproduct_array))
            {
                Yii::$app->session->setFlash('success', "Relation saved successfully");
            }
            else
            {
                Yii::$app->session->setFlash('failure', "Please check the input"); 
            }
            return $this->redirect(['index']);
        }

        $customer=$model->getCustomerdata();
        $product=$model->getProductdata();
       
        return $this->render('create', [
            'model' => $model,
            'customer'=>$customer,
            'product'=>$product,
        ]);
    }

    /**
     * Updates an existing CustomerProductManagement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $customerproduct_array=Yii::$app->request->post('CustomerProductManagement');
            $customerproduct_array['id']=$id;
            $CommonSave = new CommonSave();
            if($CommonSave->CustomerProductSave($customerproduct_array))
            {
                Yii::$app->session->setFlash('success', "Relation saved successfully");
            }
            else
            {
                Yii::$app->session->setFlash('failure', "Please check the input"); 
            }

            return $this->redirect(['index']);
        }

        $customer=$model->getupdatedCustomerdata();
        $product=$model->getProductdata();

        $model->product_id=unserialize($model->product_id);

        return $this->render('update', [
            'model' => $model,
            'customer'=>$customer,
            'product'=>$product,
        ]);
    }

    /**
     * Deletes an existing CustomerProductManagement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CustomerProductManagement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CustomerProductManagement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CustomerProductManagement::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
