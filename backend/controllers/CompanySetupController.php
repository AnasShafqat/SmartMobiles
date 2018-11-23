<?php

namespace backend\controllers;

use Yii;
use backend\models\CompanySetup;
use backend\models\CompanySetupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CompanySetupController implements the CRUD actions for CompanySetup model.
 */
class CompanySetupController extends Controller
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
     * Lists all CompanySetup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanySetupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CompanySetup model.
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

    /**
     * Creates a new CompanySetup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CompanySetup();

        if ($model->load(Yii::$app->request->post())) {
            //get the instance of the upload file
            $model->photo = UploadedFile::getInstance($model,'photo');
            if(!empty($model->photo)){
                $imageName = $model->shop_name.'_photo'; 
                $model->photo->saveAs('uploads/'.$imageName.'.'.$model->photo->extension);
                //save the path in the db column
                $model->photo = 'uploads/'.$imageName.'.'.$model->photo->extension;
            } else {
               $model->photo = '0'; 
            }

            $model->created_by = Yii::$app->user->identity->id; 
            $model->created_at = new \yii\db\Expression('NOW()');
            $model->updated_by = '0'; 
            $model->updated_at = '0'; 
            $model->save();

            return $this->redirect(['view', 'id' => $model->company_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CompanySetup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $companySetup = Yii::$app->db->createCommand("SELECT * FROM company_setup where company_id = $id")->queryAll();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
                //get the instance of the upload file
                $model->photo = UploadedFile::getInstance($model,'photo');
                if(!empty($model->photo)){
                    $imageName = $model->shop_name.'_photo'; 
                    $model->photo->saveAs('uploads/'.$imageName.'.'.$model->photo->extension);
                    //save the path in the db column
                    $model->photo = 'uploads/'.$imageName.'.'.$model->photo->extension;
                } else {
                   $model->photo = $companySetup[0]['photo']; 
                }
            $model->updated_by = Yii::$app->user->identity->id;
            $model->updated_at = new \yii\db\Expression('NOW()');
            $model->created_by = $model->created_by;
            $model->created_at = $model->created_at;
            $model->save();
            return $this->redirect(['view', 'id' => $model->company_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CompanySetup model.
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
     * Finds the CompanySetup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CompanySetup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CompanySetup::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
}
