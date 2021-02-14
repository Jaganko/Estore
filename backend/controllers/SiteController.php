<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Product;
use backend\models\ProductSearch;
use backend\models\CustomerProductManagement;
use backend\models\CustomerProductManagementSearch;
use backend\models\Category;
use backend\models\CategorySearch;
use yii\helpers\ArrayHelper;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage for both admin and user
     *
     * @return string
     */
    public function actionIndex()
    {   

        //$this->layout='dashboard';
        $session = Yii::$app->session;
        if(isset($session['user_logintype'])){
            if($session['user_logintype'] == "admin"){

            $category=Category::find()->asArray()->count();
            $product=Product::find()->asArray()->all();

            $active=$inactive=0;
            foreach ($product as $key => $oneproduct) {
                if($oneproduct['status']=='A'){
                    $active++;
                }else if($oneproduct['status']=='I'){
                    $inactive++;
                }
            }

            return $this->render('adminindex',['category'=>$category, 'active'=>$active, 'inactive'=>$inactive]);
            }
            else if($session['user_logintype'] == "user"){

            $model=new CustomerProductManagement();
            $searchModel = new CustomerProductManagementSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $customer_relation=CustomerProductManagement::find()->Where(['customer_id'=>$session['__id']])->asArray()->one();

            $prodcut_array=unserialize($customer_relation['product_id']);
            $prodcut_array_map=Product::find()->Where(['IN','id',$prodcut_array])->andWhere(['status'=>"A"])->asArray()->all();
            
            $category_map=ArrayHelper::map($prodcut_array_map,'id','category_id');
            $category=Category::find()->Where(['IN','id',$category_map])->asArray()->all();
            $category_index=ArrayHelper::index($category,'id');

            return $this->render('index', ['model'=>$model,'prodcut_array_map'=>$prodcut_array_map, 'category_index'=>$category_index,'dataProvider'=>$dataProvider,'searchModel' => $searchModel,]);
            }
        }else{
        Yii::$app->user->logout();
        return $this->goHome();
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {   
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {   
        $session = Yii::$app->session;
        $session->destroy();
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
