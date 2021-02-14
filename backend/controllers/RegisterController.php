<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegisterController implements the CRUD actions for User model.
 */
class RegisterController extends Controller
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

        if(isset($session['user_logintype'])){
        return $this->redirect(['site/index']);   
        }else{
        return parent::beforeAction($action);
        }    

    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect(['create']);

    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionCreate()
    {   
        $this->layout="blank";

        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            $username=trim(Yii::$app->request->post('User')['username']);
            $email=Yii::$app->request->post('User')['email'];
            $password_hash=Yii::$app->request->post('User')['password_hash'];
            $confirm_password=Yii::$app->request->post('User')['confirm_password'];
            $address=Yii::$app->request->post('User')['address'];
            $city=Yii::$app->request->post('User')['city'];
            $state=Yii::$app->request->post('User')['state'];
            $country=Yii::$app->request->post('User')['country'];

            if(!empty($username) && !empty($email) && !empty($password_hash) && !empty($confirm_password) && !empty($address)&& !empty($city) && !empty($state) && !empty($country)){

                $password_hash=$confirm_password=Yii::$app->security->generatePasswordHash($password_hash);
                
                $model->username=$username;
                $model->user_type="U";
                $model->auth_key=uniqid();
                $model->password_hash=$password_hash;
                $model->confirm_password=$confirm_password;

                if($model->save()){
                $session = Yii::$app->session;
                $session['user_logintype']="user"; 
                $session['__id']=$model->id; 
                Yii::$app->session->setFlash('success', "User registered sucessfully");  
                return $this->redirect(['site/index']);
                }

            }
            $model->password_hash="";
            $model->confirm_password="";
            Yii::$app->session->setFlash('failure', "Please check with your input");
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
/*    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }*/

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
/*    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
