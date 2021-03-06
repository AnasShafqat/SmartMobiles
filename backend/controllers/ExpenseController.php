<?php

namespace backend\controllers;

use Yii;
use backend\models\Expense;
use backend\models\ExpenseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExpenseController implements the CRUD actions for Expense model.
 */
class ExpenseController extends Controller
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
     * Lists all Expense models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExpenseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Expense model.
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
     * Creates a new Expense model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new Expense();
        
        $query = (new \yii\db\Query())->from('expense');
        $id = $query->max('expense_id');
        
        $exp = Yii::$app->db->createCommand("SELECT * FROM expense where expense_id = $id")->queryAll();

        if ($model->load(Yii::$app->request->post())) {
            $model->purchase_id = 11;

            $model->total_amount = $exp[0]['total_amount'] + $model->amount;
            
            $model->created_by = Yii::$app->user->identity->id; 
            $model->created_at = new \yii\db\Expression('NOW()');
            $model->updated_by = '0'; 
            $model->updated_at = '0'; 
            $model->save();
            return $this->redirect(['view', 'id' => $model->expense_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Expense model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $income = Yii::$app->db->createCommand("SELECT * FROM expense where expense_id = $id")->queryAll();

        if ($model->load(Yii::$app->request->post())) {
            $model->total_amount = ($model->total_amount - $income[0]['amount'] )+ $model->amount;
            $model->updated_by = Yii::$app->user->identity->id;
            $model->updated_at = new \yii\db\Expression('NOW()');
            $model->created_by = $model->created_by;
            $model->created_at = $model->created_at;
            $model->save();
            return $this->redirect(['view', 'id' => $model->expense_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Expense model.
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
     * Finds the Expense model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Expense the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Expense::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
