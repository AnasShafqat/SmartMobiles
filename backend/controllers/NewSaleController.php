<?php

namespace backend\controllers;

use Yii;
use backend\models\NewSale;
use backend\models\Income;
use backend\models\NewPurchase;
use backend\models\NewSaleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewSaleController implements the CRUD actions for NewSale model.
 */
class NewSaleController extends Controller
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
     * Lists all NewSale models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewSaleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NewSale model.
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

    public function actionAjaxRequestNewpurchase()
    {
        return $this->render('ajax-request-newpurchase');
    }

    /**
     * Creates a new NewSale model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NewSale();
        $income = new Income();
        
        $query = (new \yii\db\Query())->from('income');
        $id = $query->max('income_id');
        
        $incomedata = Yii::$app->db->createCommand("SELECT * FROM income where income_id = $id")->queryAll();

        if ($model->load(Yii::$app->request->post()) && $income->load(Yii::$app->request->post())) {

            $model->created_by = Yii::$app->user->identity->id; 
            $model->created_at = new \yii\db\Expression('NOW()');
            $model->updated_by = '0'; 
            $model->updated_at = '0'; 
            $model->save();

            // update purchase inactive after sale...
            $status = 'Inactive';
            $updatePurchase = Yii::$app->db->createCommand()->update('new_purchase', ['status' => $status])->execute();

            // income...
            $income->sale_id      = $model->sale_id;
            $income->date         = $model->date_of_sale;
            $income->income_name  = $model->cell_phone_brand.' '.$model->cell_phone_model;
            $income->amount       = $model->sale_price;
            $income->total_amount = $incomedata[0]['total_amount'] + $model->sale_price;
            $income->created_by   = Yii::$app->user->identity->id; 
            $income->created_at   = new \yii\db\Expression('NOW()');
            $income->updated_by   = '0'; 
            $income->updated_at   = '0';
            $income->save();

            return $this->redirect(['view', 'id' => $model->sale_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'income' => $income,
        ]);
    }

    /**
     * Updates an existing NewSale model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $income = new Income();

        $query = (new \yii\db\Query())->from('income');
        $id = $query->max('income_id');
        
        $incomedata = Yii::$app->db->createCommand("SELECT * FROM income where income_id = $id")->queryAll();


        if ($model->load(Yii::$app->request->post())) {
            $model->updated_by = Yii::$app->user->identity->id;
            $model->updated_at = new \yii\db\Expression('NOW()');
            $model->created_by = $model->created_by;
            $model->created_at = $model->created_at;
            $model->save();

            // income update...
            //$date         = $model->date_of_sale;
            $amount       = $model->sale_price;
            $total_amount = $incomedata[0]['total_amount'] + $model->sale_price;
            //$income_name  = $model->cell_phone_brand.' '.$model->cell_phone_model;
            $updated_by   = Yii::$app->user->identity->id;; 
            $updated_at   = new \yii\db\Expression('NOW()');;

            $updateIncome = Yii::$app->db->createCommand()->update('income', ['amount' => $amount, 'total_amount' => $total_amount, 'updated_by' => $updated_by, 'updated_at' => $updated_at], ['income_id' => $id])->execute();

            return $this->redirect(['view', 'id' => $model->sale_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'income' => $income,
        ]);
    }

    /**
     * Deletes an existing NewSale model.
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
     * Finds the NewSale model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NewSale the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NewSale::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
