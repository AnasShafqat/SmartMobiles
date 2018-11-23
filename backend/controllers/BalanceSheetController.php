<?php

namespace backend\controllers;

use Yii;
use backend\models\BalanceSheet;
use backend\models\BalanceSheetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BalanceSheetController implements the CRUD actions for BalanceSheet model.
 */
class BalanceSheetController extends Controller
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
     * Lists all BalanceSheet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BalanceSheetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BalanceSheet model.
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
     * Creates a new BalanceSheet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BalanceSheet();
        $query = (new \yii\db\Query())->from('income');
        $id = $query->max('income_id');
        
        $income = Yii::$app->db->createCommand("SELECT * FROM income where income_id = $id")->queryAll();
        $query = (new \yii\db\Query())->from('expense');
        $id = $query->max('expense_id');
        
        $exp = Yii::$app->db->createCommand("SELECT * FROM expense where expense_id = $id")->queryAll();
        

            if ($model->load(Yii::$app->request->post())) {
                if($model->user_name == Yii::$app->user->identity->username){
                    $model->date = date('Y-m-d h:m:s');
                    $model->total_income =  $income[0]['total_amount'];
                    $model->total_expense = $exp[0]['total_amount'];
                    $model->current_balance = $model->total_income - $model->total_expense;
                    if($model->current_balance > 0){
                        $model->status = 'Profit';
                    }
                    else {
                        $model->status = 'Loss';
                    }
                    
                    $model->save();

                    return $this->redirect(['view', 'id' => $model->bal_sheet_id]);
                }
            }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BalanceSheet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bal_sheet_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BalanceSheet model.
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
     * Finds the BalanceSheet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BalanceSheet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BalanceSheet::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
