<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

$bundle = yiister\gentelella\assets\Asset::register($this);

?>
<?php $this->beginPage(); ?>
<?= Html::csrfMetaTags() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title>MOBIDEX</title>
    <link rel="shortcut icon" href="dist/img/logo.jpg" type="image/jpg">
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
<?php $this->beginBody(); ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title"> 
                    <div class="profile">
                        <a href="home" target="_blank" class="site_title">
                            <div class="image">
                                <span>Smart Mobile!</span>
                            </div>
                        </a>    
                    </div>
                    
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="images/logo1.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,<br><b style="color:#ffffff;"><?= Yii::$app->user->identity->username ?></b></span>
                            <span style="color:white"></span><br>
                        <span style="color:#0DC143">* Online</span>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>
                            ------------------------------------------------
                        </h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Home", "url" => ["/home"], "icon" => "home"],
                                    ["label" => "Company Setup", "url" => ["/company-setup"], "icon" => "fas fa-cogs"],
                                    // ["label" => "New Sale", "url" => ["/new-sale"], "icon" => "fab fa-stumbleupon-circle"],
                                    [
                                        "label" => "Sales",
                                        "url" => "#",
                                        "icon" => "fab fa-stumbleupon-circle",
                                        "items" => [
                                            [
                                                "label" => "New Sale",
                                                "url" => ["/new-sale"],
                                            ],
                                            [
                                                "label" => "Daily Sale",
                                                "url" => ["/daily-sale-report"],
                                            ],
                                            [
                                                "label" => "Montly Sale",
                                                "url" => ["/monthly-sale-report"],
                                            ],
                                        ],
                                    ],
                                    // ["label" => "New Purchase", "url" => ["/new-purchase"], "icon" => "fab fa-product-hunt"],
                                    [
                                        "label" => "Purchase",
                                        "url" => "#",
                                        "icon" => "fab fa-product-hunt",
                                        "items" => [
                                            [
                                                "label" => "New Purchase",
                                                "url" => ["/new-purchase"],
                                            ],
                                            [
                                                "label" => "Daily Purchase",
                                                "url" => ["/daily-purchase-report"],
                                            ],
                                            [
                                                "label" => "Montly Purchase",
                                                "url" => ["/monthly-purchase-report"],
                                            ],
                                        ],
                                    ],
                                    // ["label" => "Expense", "url" => ["/expense"], "icon" => "fab fa-etsy"],
                                    [
                                        "label" => "Expense",
                                        "url" => "#",
                                        "icon" => "fab fa-etsy",
                                        "items" => [
                                            [
                                                "label" => "New Expense",
                                                "url" => ["/expense"],
                                            ],
                                            [
                                                "label" => "Daily Expense",
                                                "url" => ["/daily-expense-report"],
                                            ],
                                            [
                                                "label" => "Montly Expense",
                                                "url" => ["/monthly-expense-report"],
                                            ],
                                        ],
                                    ],
                                    // ["label" => "Income", "url" => ["/income"], "icon" => "fas fa-info-circle"],
                                    [
                                        "label" => "Income",
                                        "url" => "#",
                                        "icon" => "fas fa-info-circle",
                                        "items" => [
                                            [
                                                "label" => "New Income",
                                                "url" => ["/income"],
                                            ],
                                            [
                                                "label" => "Daily Income",
                                                "url" => ["/daily-income-report"],
                                            ],
                                            [
                                                "label" => "Montly Income",
                                                "url" => ["/monthly-income-report"],
                                            ],
                                        ],
                                    ],
                                    ["label" => "Balance Sheet", "url" => ["/balance-sheet/create"], "icon" => "fas fa-balance-scale"],
                                ],
                            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small invisible">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">

                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><b><?= Yii::$app->user->identity->username ?></b>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="home">Home</a>
                                </li>
                                <!-- <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li> -->
                               <!--  <li><a href="index.php?r=site/login"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li> -->

                                <?php
                                    // NavBar::begin([
                                    //     'brandLabel' => Yii::$app->name,
                                    //     'brandUrl' => Yii::$app->homeUrl,
                                    //     // 'options' => [
                                    //     //     'class' => 'navbar',
                                    //     // ],
                                    // ]);
                                    // $menuItems = [
                                    //     ['label' => 'Home', 'url' => ['/site/index']],
                                    // ];
                                    if (Yii::$app->user->isGuest) {
                                        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                                    } else {
                                        $menuItems[] = '<li>'
                                            . Html::beginForm(['/site/logout'], 'post')
                                            . Html::submitButton(
                                                'Logout(' . Yii::$app->user->identity->username . ')',
                                                ['class' => 'btn btn-danger btn-flat']
                                            )
                                            .'<i class="fa fa-sign-out pull-right" style="padding:10px;"></i>'
                                            . Html::endForm()
                                            . '</li>';
                                    }
                                    echo Nav::widget([
                                        'options' => ['class' => 'navbar-nav'],
                                        'items' => $menuItems,
                                    ]);
                                    // NavBar::end();
                                    ?>
                            </ul>
                        </li>



                        <!-- <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="dist/img/user8-128x128.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="dist/img/user7-128x128.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="dist/img/user3-128x128.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="dist/img/user5-128x128.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a href="/">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li> -->

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>

            <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) 
            ?>

        <?= Alert::widget() ?>

            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer class="footer">
            <div class="container">
                <p align="center">Copyright &copy; <?php echo  date("Y");?> All Rights Reserved <a href="#" target="_blank" style="color:#449D44"><b>Smart Mobile</b></a>
                </p>
            </div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
