<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper">
    <div class="container">
        <div class="row">
                <div class="col-md-3">
                    <div class="login-lo">
                        <h3 align="center" style="color: #449D44">Smart Mobile Web App</h3>
                    </div>
                </div>
            </div>        
        
        <div class="row">
            <div class="col-md-3 center">
                <img class="img-responsive" src="dist/img/logo.jpg" width="250px"> 
            </div>
        </div>    
        
        <div class="row row-centered">
            <div class="col-md-3">
                <p class="login-box-msg text-center" style="color: #449D44"><b>Sign in to start your session</b></p>
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
            <div class="col-md-3">
                <?= $form->field($model, 'password', ['options'=>[
                    'tag'=>'div',
                    'class'=>'form-group field-loginform-username has-feedback required'
                ],
                    'template'=>'{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}{hint}'
                ])->passwordInput(['placeholder'=>'Password','autofocus' => true]) ?>  
            </div>
        </div>

        <div class="row row-centered">
            <div class="col-md-3">      
                <?= $form->field($model, 'rememberMe')->checkbox() ?>  
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
            </div>
        </div>
    </div>          
</div>
      
    <?php ActiveForm::end(); ?>        

</div>