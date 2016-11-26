<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use kartik\sidenav\SideNav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!-- <link rel="stylesheet" type="text/css" href="../web/css/modified-styles.css"> -->
    </head>
    <body class="skin-blue sidebar-mini">
        <?php $this->beginBody() ?>

        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index.php?r=site" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>GAC</b>System</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>GAC </b>System</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                            </li>
                            <li class="dropdown messages-menu">
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <?php
                                if (Yii::$app->user->isGuest) {
                                    echo '<li><a href="' . Url::to(['/site/login']) . '">Login</a></li>';
                                } else {
                                    echo '<li><a href="' . Url::to(['/site/logout']) . '">Logout(' . Yii::$app->user->identity->username . ')</a></li>';
                                }
                                ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar" style="background-color:#F7F7F7">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <?php
                        echo SideNav::widget([
                            'type' => 'Primary',
                            'encodeLabels' => false,
                            'heading' => 'Main Menu',
                            'items' => [
                                [
                                    'label' => 'Home',
                                    'icon' => 'glyphicon glyphicon-home',
                                    'url' => Url::to(['/site/index']),
                                    'active' => (Yii::$app->controller->id == 'site'),
                                ],
                                [
                                    'label' => 'General Operation',
                                    'icon' => 'glyphicon glyphicon-briefcase',
                                    'url' => Url::to(['/gac-data-trxdet-u/index']),
                                    'active' => (Yii::$app->controller->id == 'gac-data-trxdet-u'),
//                                    'visible' => Yii::$app->user->can('admin'),
                                ],
                                [
                                    'label' => 'Consolidation',
                                    'icon' => 'glyphicon glyphicon-compressed',
                                    'url' => Url::to(['/gac-data-trx-v/index']),
                                    'active' => (Yii::$app->controller->id == 'gac-data-trx-v'),
                                    'visible' => Yii::$app->user->can('consolidator'),
                                ],
                                [
                                    'label' => 'Reports',
                                    'icon' => 'glyphicon glyphicon-signal',
//                                    'visible' => Yii::$app->user->can('admin'),
                                    'items' => [
                                        ['label' => 'Statement of Financial Performance', 'url' => Url::to(['/report/financial-performance']), 'active' => (yii::$app->controller->id == 'report'),
                                        ],
                                        ['label' => 'Statement of Financial Position', 'url' => Url::to(['/report/financial-position']), 'active' => ((yii::$app->controller->id) == 'report'),
                                        ],
                                        ['label' => 'Changes in Equity', 'url' => Url::to(['/report/changes-in-equity']), 'active' => (yii::$app->controller->id == 'report'),
                                        ],
                                        ['label' => 'Cashflow Statement', 'url' => Url::to(['/report/cash-flow-statement']), 'active' => ((yii::$app->controller->id) == 'report'),
                                        ],
                                        ['label' => 'Comparison of Budget vs Actual', 'url' => Url::to(['/report/budget-vs-actual']), 'active' => ((yii::$app->controller->id) == 'report'),
                                        ],
                                    ]
                                ],
                                [
                                    'label' => 'Setup',
                                    'icon' => 'glyphicon glyphicon-cog',
//                                    'visible' => Yii::$app->user->can('admin'),
                                    'items' => [
                                        ['label' => 'Global Period', 'url' => Url::to(['/gac-glob-period-u']), 'active' => (yii::$app->controller->id == 'gac-glob-period-u'),
                                        ],
                                        ['label' => 'GFS Management', 'url' => Url::to(['/gac-gfs-list-u']), 'active' => (yii::$app->controller->id == 'gac-gfs-list-u'),
                                        ],
                                        ['label' => 'Entity Management', 'url' => Url::to(['/gac-entity-list-u']), 'active' => (yii::$app->controller->id == 'gac-entity-list-u'),
                                        ],
                                        ['label' => 'Reports Management i.e Range', 'url' => Url::to(['/gac-note-itemranges-u']), 'active' => (yii::$app->controller->id == 'gac-note-itemranges-u'),
                                        ],
                                    ]],
                                [
                                    'label' => 'System Security',
                                    'icon' => 'glyphicon glyphicon-lock',
//                                    'visible' => Yii::$app->user->can('admin'),
                                    'items' => [
                                        ['label' => 'User Management', 'url' => Url::to(['/user/index']), 'active' => (yii::$app->controller->id == 'user'),
                                        ],
                                        ['label' => 'Roles', 'url' => Url::to(['/admin/role']), 'active' => ((yii::$app->controller->id) == 'role'),
                                        ],
                                        ['label' => 'Permission', 'url' => Url::to(['/admin/permission']), 'active' => ((yii::$app->controller->id) == 'permission'),
                                        ],
                                        ['label' => 'Routes', 'url' => Url::to(['/admin/route']), 'active' => ((yii::$app->controller->id) == 'route' ),
                                        ],
                                    ]],
                            ],
                        ]);
                        ?>
                    </ul>

                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>

                    <?= $content ?>
                </section>
            </div>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.0
            </div>
            <strong>Copyright &copy; <?= Date('Y') . '' ?> <a href="http://www.mof.go.tz">ACCGEN - Dev Unit</a>.</strong>
            All rights reserved.

        </footer>        
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>