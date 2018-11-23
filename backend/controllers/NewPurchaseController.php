<?php

namespace backend\controllers;

use Yii;
use backend\models\NewPurchase;
use backend\models\Expense;
use backend\models\NewPurchaseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NewPurchaseController implements the CRUD actions for NewPurchase model.
 */
class NewPurchaseController extends Controller
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

    /**
     * Lists all NewPurchase models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewPurchaseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NewPurchase model.
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

    public function actionReport($id)
    {
        return $this->render('report', [
            'model' => $this->findModel($id),
        ]);
    }
            
    public function actionDailyReport()
    {  
        
        return $this->render('daily-report');
    }

    public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
    }

    public function actionMonthlyReport()
    {
        return $this->render('monthly-report');
    }

    /**
     * Creates a new NewPurchase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NewPurchase();
        $expense = new Expense();

        $query = (new \yii\db\Query())->from('expense');
        $id = $query->max('expense_id');
        
        $expenseData = Yii::$app->db->createCommand("SELECT * FROM expense where expense_id = $id")->queryAll();

        if ($model->load(Yii::$app->request->post()) && $expense->load(Yii::$app->request->post())) {
            //get the instance of the upload file
                $model->cnic_front_pic = UploadedFile::getInstance($model,'cnic_front_pic');
                if(!empty($model->cnic_front_pic)){
                    $imageName = $model->seller_name.'_CnicFrontPic'; 
                    $model->cnic_front_pic->saveAs('uploads/'.$imageName.'.'.$model->cnic_front_pic->extension);
                    //save the path in the db column
                    $model->cnic_front_pic = 'uploads/'.$imageName.'.'.$model->cnic_front_pic->extension;
                } else {
                   $model->cnic_front_pic = '0'; 
                }

                // 2nd pic.....
                $model->cnic_back_pic = UploadedFile::getInstance($model,'cnic_back_pic');
                if(!empty($model->cnic_back_pic)){
                    $imageName = $model->seller_name.'_CnicBackPic'; 
                    $model->cnic_back_pic->saveAs('uploads/'.$imageName.'.'.$model->cnic_back_pic->extension);
                    //save the path in the db column
                    $model->cnic_back_pic = 'uploads/'.$imageName.'.'.$model->cnic_back_pic->extension;
                } else {
                   $model->cnic_back_pic = '0'; 
                }
                // 3rd pic...
                $model->cell_phone_front_pic = UploadedFile::getInstance($model,'cell_phone_front_pic');
                if(!empty($model->cell_phone_front_pic)){
                    $imageName = $model->seller_name.'_CellFrontPic'; 
                    $model->cell_phone_front_pic->saveAs('uploads/'.$imageName.'.'.$model->cell_phone_front_pic->extension);
                    //save the path in the db column
                    $model->cell_phone_front_pic = 'uploads/'.$imageName.'.'.$model->cell_phone_front_pic->extension;
                } else {
                   $model->cell_phone_front_pic = '0'; 
                }
                // 4th pic...
                $model->cell_phone_back_pic = UploadedFile::getInstance($model,'cell_phone_back_pic');
                if(!empty($model->cell_phone_back_pic)){
                    $imageName = $model->seller_name.'_CellBackPic'; 
                    $model->cell_phone_back_pic->saveAs('uploads/'.$imageName.'.'.$model->cell_phone_back_pic->extension);
                    //save the path in the db column
                    $model->cell_phone_back_pic = 'uploads/'.$imageName.'.'.$model->cell_phone_back_pic->extension;
                } else {
                   $model->cell_phone_back_pic = '0'; 
                }

                $model->created_by = Yii::$app->user->identity->id; 
                $model->created_at = new \yii\db\Expression('NOW()');
                $model->updated_by = '0'; 
                $model->updated_at = '0'; 
                $model->save();

                //  expense...
                $expense->purchase_id   = $model->purchase_id;
                $expense->date          = $model->date_of_purchase;
                $expense->expense_name  = $model->cell_phone_brand.' '.$model->cell_phone_model;
                $expense->amount        = $model->purchase_price;
                $expense->total_amount  = $expenseData[0]['total_amount'] + $model->purchase_price;
                $expense->created_by    = Yii::$app->user->identity->id; 
                $expense->created_at    = new \yii\db\Expression('NOW()');
                $expense->updated_by    = '0'; 
                $expense->updated_at    = '0';
                $expense->save();

            return $this->redirect(['view', 'id' => $model->purchase_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'expense' => $expense,
        ]);
    }

    /**
     * Updates an existing NewPurchase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $newPurchase = Yii::$app->db->createCommand("SELECT * FROM new_purchase where purchase_id = $id")->queryAll();
        $model = $this->findModel($id);

        $expense = new Expense();

        $query = (new \yii\db\Query())->from('expense');
        $id = $query->max('expense_id');
        
        $expenseData = Yii::$app->db->createCommand("SELECT * FROM expense where expense_id = $id")->queryAll();

        if ($model->load(Yii::$app->request->post())) {
                //get the instance of the upload file
                $model->cnic_front_pic = UploadedFile::getInstance($model,'cnic_front_pic');
                if(!empty($model->cnic_front_pic)){
                    $imageName = $model->seller_name.'_CnicFrontPic'; 
                    $model->cnic_front_pic->saveAs('uploads/'.$imageName.'.'.$model->cnic_front_pic->extension);
                    //save the path in the db column
                    $model->cnic_front_pic = 'uploads/'.$imageName.'.'.$model->cnic_front_pic->extension;
                } else {
                   $model->cnic_front_pic = $newPurchase[0]['cnic_front_pic']; 
                }

                // 2nd pic.....
                $model->cnic_back_pic = UploadedFile::getInstance($model,'cnic_back_pic');
                if(!empty($model->cnic_back_pic)){
                    $imageName = $model->seller_name.'_CnicBackPic'; 
                    $model->cnic_back_pic->saveAs('uploads/'.$imageName.'.'.$model->cnic_back_pic->extension);
                    //save the path in the db column
                    $model->cnic_back_pic = 'uploads/'.$imageName.'.'.$model->cnic_back_pic->extension;
                } else {
                   $model->cnic_back_pic = $newPurchase[0]['cnic_back_pic'];  
                }
                // 3rd pic...
                $model->cell_phone_front_pic = UploadedFile::getInstance($model,'cell_phone_front_pic');
                if(!empty($model->cell_phone_front_pic)){
                    $imageName = $model->seller_name.'_CellFrontPic'; 
                    $model->cell_phone_front_pic->saveAs('uploads/'.$imageName.'.'.$model->cell_phone_front_pic->extension);
                    //save the path in the db column
                    $model->cell_phone_front_pic = 'uploads/'.$imageName.'.'.$model->cell_phone_front_pic->extension;
                } else {
                   $model->cell_phone_front_pic = $newPurchase[0]['cell_phone_front_pic']; 
                }
                // 4th pic...
                $model->cell_phone_back_pic = UploadedFile::getInstance($model,'cell_phone_back_pic');
                if(!empty($model->cell_phone_back_pic)){
                    $imageName = $model->seller_name.'_CellBackPic'; 
                    $model->cell_phone_back_pic->saveAs('uploads/'.$imageName.'.'.$model->cell_phone_back_pic->extension);
                    //save the path in the db column
                    $model->cell_phone_back_pic = 'uploads/'.$imageName.'.'.$model->cell_phone_back_pic->extension;
                } else {
                   $model->cell_phone_back_pic = $newPurchase[0]['cell_phone_back_pic'];
                }
            $model->updated_by = Yii::$app->user->identity->id;
            $model->updated_at = new \yii\db\Expression('NOW()');
            $model->created_by = $model->created_by;
            $model->created_at = $model->created_at;
            $model->save();

            $model->updated_by = Yii::$app->user->identity->id;
            $model->updated_at = new \yii\db\Expression('NOW()');
            $model->created_by = $model->created_by;
            $model->created_at = $model->created_at;
            $model->save();

            // expense update...
            //$date         = $model->date_of_sale;
            $amount       = $model->purchase_price;
            $total_amount = $expenseData[0]['total_amount'] + $model->purchase_price;
            $expense_name  = $model->cell_phone_brand.' '.$model->cell_phone_model;
            $updated_by   = Yii::$app->user->identity->id; 
            $updated_at   = new \yii\db\Expression('NOW()');

            $updateExpense = Yii::$app->db->createCommand()->update('expense', ['expense_name' => $expense_name,'amount' => $amount, 'total_amount' => $total_amount, 'updated_by' => $updated_by, 'updated_at' => $updated_at], ['expense_id' => $id])->execute();

            return $this->redirect(['view', 'id' => $model->purchase_id]);
        }    

        return $this->render('update', [
            'model' => $model,
            'expense' => $expense,
        ]);
    }

    /**
     * Deletes an existing NewPurchase model.
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
     * Finds the NewPurchase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NewPurchase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NewPurchase::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
