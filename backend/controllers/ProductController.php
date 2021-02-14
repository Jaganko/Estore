<?php

namespace backend\controllers;

use Yii;
use backend\models\Product;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\CommonSave;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product(['scenario' => Product::SCENARIO_CREATE]);

        if ($model->load(Yii::$app->request->post())) {
            /*echo "<pre>";
            print_r(Yii::$app->request->post());
            die;*/
            $product_array=Yii::$app->request->post('Product');
            $CommonSave = new CommonSave();
            if($CommonSave->ProductSave($product_array))
            {
                Yii::$app->session->setFlash('success', "Product saved successfully");
            }
            else
            {
                Yii::$app->session->setFlash('failure', "Please check the input"); 
            }
            return $this->redirect(['index']);
        }

        $category = $model->getCategorydata();

        return $this->render('create', [
            'model' => $model,
            'category' => $category,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Product::SCENARIO_UPDATE;
        if ($model->load(Yii::$app->request->post())) {
            $product_array=Yii::$app->request->post('Product');
            $product_array['id'] = $id;
            $CommonSave = new CommonSave();
           if($CommonSave->ProductSave($product_array))
            {
                Yii::$app->session->setFlash('success', "Product updated successfully");
            }
            else
            {
                Yii::$app->session->setFlash('failure', "Please check the input"); 
            }
            return $this->redirect(['index']);
        }

         $category = $model->getCategorydata();

        return $this->render('update', [
            'model' => $model,
            'category' => $category,
        ]);
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionChangeStatus($id){
        $model=$this->findModel($id);
        $model->scenario = Product::SCENARIO_UPDATE;
        if($model->status == "A"){
        $model->status="I";
        }else{
        $model->status="A";  
        }
       if($model->save())
        {
            Yii::$app->session->setFlash('success', "Status changed successfully");
        }
        else
        {
            Yii::$app->session->setFlash('failure', "Please check the input"); 
        }
        return $this->redirect(['index']);
    }
}
