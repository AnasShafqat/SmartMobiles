<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class=""></div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-lo">
                        <h3 align="center" style="color: #449D44">Smart Mobiles Web Application</h3>
                    </div>
                </div>
            </div>        
        
        <div class="row">
            <div class="col-md-4 center col-md-offset-4">
                <img class="img-responsive img-thumbnail" src="images/logo1.jpg" width="390px" height="200px" style="border-radius: 10px 60px"> 
            </div>
        </div>    
        
        <div class="row row-centered">
            <div class="col-md-4 col-md-offset-4">
                <p class="login-box-msg text-center" style="color: #449D44; padding-top: 10px"><b>Sign in to start using the application</b></p>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <?= $form->field($model, 'username', ['options'=>[
                        'tag'=>'div',
                        'class'=>'form-group field-loginform-username has-feedback required'
                    ],
                        'template'=>'{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}{hint}'
                    ])->textInput(['placeholder'=>'Username','autofocus' => true]) ?>
            </div>
        </div>
     
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?= $form->field($model, 'password', ['options'=>[
                    'tag'=>'div',
                    'class'=>'form-group field-loginform-username has-feedback required'
                ],
                    'template'=>'{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}{hint}'
                ])->passwordInput(['placeholder'=>'Password','autofocus' => true]) ?>  
            </div>
        </div>

        <div class="row row-centered">
            <div class="col-md-4 col-md-offset-4">      
                <?= $form->field($model, 'rememberMe')->checkbox() ?>  
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
            </div>
        </div>
    </div>          
</div>
      
    <?php ActiveForm::end(); ?>        

</div>