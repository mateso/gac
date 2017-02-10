<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\LteAsset;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\GacEntityListU;
use yii\widgets\Breadcrumbs;

LteAsset::register($this);
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
    </head>
    <!--    <body class="skin-blue sidebar-mini">-->
    <body class="skin-blue sidebar-mini">
        <?php $this->beginBody() ?>

        <!-- Start of report parameters modal pop up -->
        <?php
        Modal::begin([
            'header' => '<h4>Report Parameters</h4>',
            'id' => 'modalReportParameters',
            'size' => 'modal-md'
        ]);
        Modal::end();

        Modal::begin([
            'header' => '<h4>Consolidation Status</h4>',
            'id' => 'modalConsolidationStatus',
            'size' => 'modal-md'
        ]);
        Modal::end();

        Modal::begin([
            'header' => '<h4>Entity List</h4>',
            'id' => 'modalEntityList',
            'size' => 'modal-md'
        ]);
        Modal::end();

        Modal::begin([
            'header' => '<h4>GFS List</h4>',
            'id' => 'modalGfsList',
            'size' => 'modal-md'
        ]);
        Modal::end();

        Modal::begin([
            'header' => '<h4>Report Parameters</h4>',
            'id' => 'modalSegmentedReports',
            'size' => 'modal-md'
        ]);
        Modal::end();
        ?>

        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index.php" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>GACS</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>GAC</b> System v2.1</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <?php
                            echo '<li><a href="../web/docs/About GACS v2.1.pdf" target="blank">About System</a></li>';
                            ?>
                            <?php
                            echo '<li><a href="../web/docs/GACS User Guide.pdf" target="blank">Help</a></li>';
                            ?>
                            <?php
                            echo '<li><a href="#">Institution: ' .
                            GacEntityListU::getEntityDesc(Yii::$app->user->identity->institutional_code)
                            . '</a></li>';
                            ?>
                            <?php
                            if (Yii::$app->user->isGuest) {
                                echo '<li><a href="' . Url::to(['/site/login']) . '">Login</a></li>';
                            } else {
                                echo '<li><a href="' . Url::to(['/site/logout']) . '">Logout(' . Yii::$app->user->identity->getFullName() . ')</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li>
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> 
                                <span>Home</span>
                            </a>
                        </li>
                        <?php
                        if (Yii::$app->user->can('user') || Yii::$app->user->can('developer')) {
                            echo '<li><a href="' . Url::to(['/gac-data-trxdet-u']) . '">'
                            . '<i class="fa fa-files-o"></i>'
                            . '<span>General Operation</span>'
                            . '</a></li>';
                        }
                        ?>

                        <?php
                        if (Yii::$app->user->can('consolidator') || Yii::$app->user->can('developer')) {
                            echo '<li><a href="' . Url::to(['/gac-data-trx-v']) . '">
                            <i class="fa fa-th"></i>
                            <span>Consolidation</span>
                            </a></li>';
                        }
                        ?>

                        <?php
                        if (Yii::$app->user->can('user') ||
                                Yii::$app->user->can('report viewer') ||
                                Yii::$app->user->can('consolidator') ||
                                Yii::$app->user->can('developer')) {
                            echo '<li class = "treeview">
                            <a href = "#">
                            <i class = "fa fa-pie-chart"></i>
                            <span>Reports</span>
                            <span class = "pull-right-container">
                            <i class = "fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class = "treeview-menu">
                            <li class="btnTrialBalance"><a href = "#"><i class = "fa fa-circle-o"></i>
                            Trial Balance</a></li> 
                            <li class="btnFinancialStmt"><a href = "#"><i class = "fa fa-circle-o"></i>
                            Financial Performance</a></li>
                            <li class="btnFinancialPosition"><a href = "#"><i class = "fa fa-circle-o"></i>
                            Financial Position</a></li>
                            <li class="btnCashFlowStmt"><a href = "#"><i class = "fa fa-circle-o"></i>
                            Cashflow Statement</a></li>
                            <li class="btnChangesInEquity"><a href = "#"><i class = "fa fa-circle-o"></i>
                            Changes in Equity</a></li>
                            <li class="btnBudgetVsActual"><a href = "#"><i class = "fa fa-circle-o"></i>
                            Budget vs Actual</a></li>                                                    
                            <li class="btnNotes"><a href = "#"><i class = "fa fa-circle-o"></i>
                            Notes</a></li>';

                            if (Yii::$app->user->can('consolidator') ||
                                    Yii::$app->user->can('developer')) {
                                echo '<li class="btnSegFinancialPerformance"><a href = "#"><i class = "fa fa-circle-o"></i>
                            Segmented Performance</a></li>
                            <li class="btnSegFinancialPosition"><a href = "#"><i class = "fa fa-circle-o"></i>
                            Segmented Position</a></li>
                            <li class="btnSegCashFlowStmt"><a href = "#"><i class = "fa fa-circle-o"></i>
                            Segmented Cash Flow</a></li>
                            <li class="btnConsoStatus"><a href = "#"><i class = "fa fa-circle-o"></i>
                            Consolidation Status</a></li>
                            <li class="btnEliminationEntries"><a href = "#"><i class = "fa fa-circle-o"></i>
                            Elimination Entries</a></li>
                            <li class="btnEntityList"><a href = "#"><i class = "fa fa-circle-o"></i>
                            Entity List</a></li>
                            <li class="btnGFSList"><a href = "#"><i class = "fa fa-circle-o"></i>
                            GFS List</a></li>';
                            }

                            echo '}';
                            echo '</ul>';
                            echo '</li>';
                        }
                        ?>


                        <?php
                        if (Yii::$app->user->can('admin') || Yii::$app->user->can('developer')) {
                            echo '<li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Setup</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?r=gac-glob-period-u"><i class="fa fa-circle-o"></i>
                                        Global Period</a></li>
                                <li><a href="index.php?r=gac-gfs-list-u"><i class="fa fa-circle-o"></i> 
                                        GFS Management</a></li>
                                <li><a href="index.php?r=gac-entity-list-u"><i class="fa fa-circle-o"></i>
                                        Entity Management</a></li>
                                <li><a href="index.php?r=gac-note-itemranges-u"><i class="fa fa-circle-o"></i>
                                        Reports Management i.e Range</a></li>                
                            </ul>
                        </li>';
                        }
                        ?>

                        <?php
                        if (Yii::$app->user->can('admin') || Yii::$app->user->can('developer')) {
                            echo '<li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>System Security</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?r=user/index"><i class="fa fa-circle-o"></i>
                                        User Management</a></li>
                                <li><a href="index.php?r=admin/role"><i class="fa fa-circle-o"></i> 
                                        Roles</a></li>
                                <li><a href="index.php?r=admin/permission"><i class="fa fa-circle-o"></i>
                                        Permission</a></li>
                                <li><a href="index.php?r=admin/route"><i class="fa fa-circle-o"></i>
                                        Routes</a></li>
                            </ul>
                        </li>';
                        }
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

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.1
                </div>
                <strong>Copyright &copy; <?= '2016' ?> <a href="http://www.mof.go.tz">SDU</a>.</strong>
                All rights reserved.          
            </footer>   
        </div>  

        <?php
//        JS Handler for Financial Statement Report
        $this->registerJs(
                "$('.btnFinancialStmt').click(function() {
    $.get(
        'index.php?r=report/financial-performance',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalReportParameters').modal();
        }  
    );
});
    "
        );

//        JS Handler for Financial Position Report
        $this->registerJs(
                "$('.btnFinancialPosition').click(function() {
    $.get(
        'index.php?r=report/financial-position',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalReportParameters').modal();
        }  
    );
});
    "
        );

//       JS Handler for Changes in Equity Report
        $this->registerJs(
                "$('.btnChangesInEquity').click(function() {
    $.get(
        'index.php?r=report/changes-in-equity',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalReportParameters').modal();
        }  
    );
});
    "
        );

        //       JS Handler for Cash Flow Statement Report
        $this->registerJs(
                "$('.btnCashFlowStmt').click(function() {
    $.get(
        'index.php?r=report/cash-flow-statement',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalReportParameters').modal();
        }  
    );
});
    "
        );

        //       JS Handler for Budget Vs Actual Report
        $this->registerJs(
                "$('.btnBudgetVsActual').click(function() {
    $.get(
        'index.php?r=report/budget-vs-actual',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalReportParameters').modal();
        }  
    );
});
    "
        );

        //       JS Handler for Segmented Financial Performance Report
        $this->registerJs(
                "$('.btnSegFinancialPerformance').click(function() {
    $.get(
        'index.php?r=report/segmented-financial-performance',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalSegmentedReports').modal();
        }  
    );
});
    "
        );

        //       JS Handler for Segmented Financial Position Report
        $this->registerJs(
                "$('.btnSegFinancialPosition').click(function() {
    $.get(
        'index.php?r=report/segmented-financial-position',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalSegmentedReports').modal();
        }  
    );
});
    "
        );

        //       JS Handler for Segmented Cash Flow Statement Report
        $this->registerJs(
                "$('.btnSegCashFlowStmt').click(function() {
    $.get(
        'index.php?r=report/segmented-cash-flow-statement',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalSegmentedReports').modal();
        }  
    );
});
    "
        );

        //       JS Handler for Trial Balance Report
        $this->registerJs(
                "$('.btnTrialBalance').click(function() {
    $.get(
        'index.php?r=report/trial-balance',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalReportParameters').modal();
        }  
    );
});
    "
        );

        //       JS Handler for Consolidation Status Report
        $this->registerJs(
                "$('.btnConsoStatus').click(function() {
    $.get(
        'index.php?r=report/consolidation-status',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalConsolidationStatus').modal();
        }  
    );
});
    "
        );

        //       JS Handler for Entity List Report
        $this->registerJs(
                "$('.btnEntityList').click(function() {
    $.get(
        'index.php?r=report/entity-list',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalEntityList').modal();
        }  
    );
});
    "
        );

        //       JS Handler for GFS List Report
        $this->registerJs(
                "$('.btnGFSList').click(function() {
    $.get(
        'index.php?r=report/gfs-list',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalGfsList').modal();
        }  
    );
});
    "
        );

        //       JS Handler for Notes Report
        $this->registerJs(
                "$('.btnNotes').click(function() {
    $.get(
        'index.php?r=report/notes',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalReportParameters').modal();
        }  
    );
});
    "
        );
        
                //       JS Handler for Elimination Entries Report
        $this->registerJs(
                "$('.btnEliminationEntries').click(function() {
//                    alert('shjas');
    $.get(
        'index.php?r=report/elimination-entries',         
        function (data) {
            $('.modal-body').html(data);
            $('#modalReportParameters').modal();
        }  
    );
});
    "
        );
        ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>