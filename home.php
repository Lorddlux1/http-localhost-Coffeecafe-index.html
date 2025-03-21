<?php
@ob_start();
@session_start();

@chmod("upload", 0777);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Coffee Cafe</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="css/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/bower_components/font-awesome/css/fontawesome-all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="css/bower_components/Ionicons/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="css/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Theme style -->        
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
              folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css" />
        <link rel="stylesheet" href="css/alertify.css" />
        <link rel="stylesheet" href="css/themes/bootstrap.css" />
        <link rel="stylesheet" href="css/bootstrap-datepicker.min.css" />
        <link rel="stylesheet" href="css/upload-file.css" />
        <link rel="stylesheet" href="css/print.min.css" />
        <link rel="stylesheet" href="css/sweetalert.css" />
        <link rel="stylesheet" href="css/auto-complete.css" />
        <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.3.custom.css" />
        <style type="text/css">
            .modal { overflow: auto !important; }
        </style>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
        <style>
            * {
                font-family: 'Prompt';
            }
            .table {
                margin-top: 10px;
            }
            .table tbody tr td {
                border-bottom: #dfdfdf 1px solid;
            }
            .table thead tr th {
                border-bottom: #dfdfdf 3px double;
                font-weight: bold;
            }
            .dropdown-menu {
                background: #434a54;
            }
            .dropdown-menu li a {
                color: #efefef;
            }
            .modal-body {
                background: #ecf0f5;
            }
            .datepicker-days * {
                color: #808080;
            }
            .main-header .sidebar-toggle:before {
                content: none;
            }
        </style>

        <!-- jQuery 3 -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src='js/auto-complete.js'></script>
        <script src="angular-1.6.7/angular.min.js"></script>
        <script src="angular-1.6.7/angular-route.js"></script>
        <script src="js/angular-locale.js"></script>
        <script src="angular-1.6.7/angular-resource.js"></script>
        <script src="angular-1.6.7/angular-messages.js"></script>
        <script src="angular-1.6.7/angular-loader.js"></script>
        <script src="js/alertify.js"></script>
        <script src="js/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="js/print.min.js"></script>
        <script src='js/sweetalert.js'></script>
        <script src='js/jquery-upload.js'></script>
        <script src='js/jquery-form.js'></script>
        <script src="js/jquery-ui.js"></script>
        <script src='js/moment.min.js'></script>
        <script src='js/Chart.min.js'></script>
        <script src='js/chart-bundle.js'></script>
        <script src='js/chart-utils.js'></script>
        <!-- <script src='js/jsPDF.js'></script> -->
        
        <script src='controllers/script.js?rand=<?php echo rand(100000, 1000000); ?>'></script>
        <script src='controllers/DashboardController.js?rand=<?php echo rand(100000, 1000000); ?>'></script>
        <script src='controllers/UserController.js?rand=<?php echo rand(100000, 1000000); ?>'></script>
        <script src='controllers/OrgController.js?rand=<?php echo rand(100000, 1000000); ?>'></script>
        <script src='controllers/CoffeeTypeController.js?rand=<?php echo rand(100000, 1000000); ?>'></script>
        <script src='controllers/CoffeeSizeController.js?rand=<?php echo rand(100000, 1000000); ?>'></script>
        <script src='controllers/ToppingController.js?rand=<?php echo rand(100000, 1000000); ?>'></script>
        <script src='controllers/CoffeeController.js?rand=<?php echo rand(100000, 1000000); ?>'></script>
        <script src='controllers/ManageController.js?rand=<?php echo rand(100000, 1000000); ?>'></script>
        <script src='controllers/ReportSalePerDayController.js?rand=<?php echo rand(100000, 1000000); ?>'></script>
        <script src='controllers/ReportSumSalePerDayController.js?rand=<?php echo rand(100000, 1000000); ?>'></script>
        <script src='controllers/ReportByMenuController.js?rand=<?php echo rand(100000, 1000000); ?>'></script>
        
        <script type="text/javascript" src="js/export-table/xlsx.core.min.js"></script>
        <script type="text/javascript" src="js/export-table/Blob.min.js"></script>
        <script type="text/javascript" src="js/export-table/FileSaver.min.js"></script>
        <script type="text/javascript" src="js/export-table/tableexport.min.js"></script>

        <link href="js/export-table/tableexport.min.css" rel="stylesheet">
    </head>
    <body ng-app="myApp" ng-controller="MainController" ng-init="startPage()" class="hold-transition skin-blue sidebar-mini {{ showMessage }}">
    <div class="wrapper" style="height: auto; min-height: 100%;" >
            <div class="modal" id="modalForEditUser" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-aqua-active">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">
                                <i class="fa fa-pencil-alt"></i>
                                แก้ไขข้อมูลส่วนตัว
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="box box-success">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>ชื่อ</label>
                                        <input class="form-control" ng-model="user.user_name" />
                                    </div>
                                    <div class="form-group">
                                        <label>เบอร์โทร</label>
                                        <input class="form-control" ng-model="user.user_tel" />
                                    </div>

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" ng-model="user.user_username" />
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" ng-model="user.password" type="password" placeholder="หากไม่ต้องการเปลี่ยน ไม่ต้องป้อนข้อมูล" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label>ยืนยัน Password ใหม่</label>
                                                <input class="form-control" ng-model="user.password_confirm" type="password" placeholder="หากไม่ต้องการเปลี่ยน ไม่ต้องป้อนข้อมูล" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <a class="btn btn-primary" ng-click="saveChangeProfile()">
                                            <i class="fa fa-check"></i>
                                            บันทึกข้อมูล
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <header class="main-header">
                <!-- Logo -->
                    <a href="#" onclick="return false;" class="logo" >
                        <span class="logo-mini ">
                        </span>
                        <span class="logo-lg "><strong>Coffee Cafe</strong></span>
                    </a>
                   
                
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top bg-primary">
                    <!-- Sidebar toggle button-->
                    <div class="pull-left">
                        <a class="sidebar-toggle" id='push_menu' data-toggle="push-menu" role="button">
                            <span class="fa fa-bars"></span>
                        </a>
                    </div>
                    <div class="pull-right" style="margin-right: 10px; margin-top: 8px;">
                        <a class="btn btn-primary active" data-toggle="modal" data-target="#modalForEditUser" ng-show="org.num_expire_day > 0">
                            <i class="fa fa-pencil-alt"></i>
                        </a>

                        <a href="http://line.me/ti/p/%40dir7307j" class="btn btn-primary active">
                        LINE
                        </a>

                        <a class="btn btn-primary active" ng-click="help()">
                           ติดต่อ<i class="fa fa-question"></i>
                        </a>
                        
                        <a class="btn btn-primary active" ng-click="showHideMessage()">
                            <i class="fa fa-comment-alt"></i>
                        </a>

                        <a class="btn btn-danger" ng-click="logout()">
                            <i class="fa fa-power-off"></i>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </nav>
            </header>

            <aside class="main-sidebar">
                <div class="" style="overflow: auto; width: auto; height: auto">
                    <section class="sidebar">
                        <div class="user-panel">
                            <div class="pull-left image">
                                <i class="fa fa-circle text-success"></i>
                                <span class="text-white info" style="color: white">{{ user.name}} : {{ user.level}}</span>
                            </div>
                            <div class="pull-left info">
                                
                            </div>
                        </div>
                        <ul class="sidebar-menu tree" data-widget="tree">
                            <li class="treeview ng-scope menu-open">
                                <a href="#">
                                    <i class="fa fa-book"></i> 
                                    <span class="ng-binding">บันทึกประจำวัน</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu" style="display: block;">
                                    <!-- <li class="ng-scope">
                                        <a href="#!sale" class="ng-binding">
                                            <i class="far fa-circle text-aqua"></i>
                                            ขายเครื่องดื่ม
                                        </a>
                                    </li> -->
                                    <li class="ng-scope" ng-show ="user.level == 'admin'">
                                        <a href="#!manage" class="ng-binding">
                                            <i class="far fa-circle text-aqua" style="font-size : 10px"></i>
                                            จัดการออเดอร์
                                        </a>
                                    </li>
                                    <!-- <li class="ng-scope">
                                        <a href="#!outofuse" class="ng-binding">
                                            <i class="far fa-circle text-aqua"></i>
                                            บันทึกครุภัณฑ์เสียหาย
                                        </a>
                                    </li> -->
                                </ul>
                            </li>
                            <li class="treeview ng-scope" ng-show ="user.level == 'admin'">
                                <a href="#">
                                    <i class="fa fa-file"></i> 
                                    <span class="ng-binding">รายงาน</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <!-- <li class="ng-scope">
                                        <a href="#!dashboard" class="ng-binding">
                                            <i class="far fa-circle text-aqua"></i>
                                            ภาพรวมของร้าน
                                        </a>
                                    </li> -->
                                    <li class="ng-scope">
                                        <a href="#!reportSlaePerDay" class="ng-binding">
                                            <i class="far fa-circle text-aqua" style="font-size : 10px"></i>
                                            ยอดขายรายวัน
                                        </a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="#!reportSumSalePerDay" class="ng-binding">
                                            <i class="far fa-circle text-aqua" style="font-size : 10px"></i>
                                            สรุปยอดขายรายวัน
                                        </a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="#!reportByMenu" class="ng-binding">
                                            <i class="far fa-circle text-aqua" style="font-size : 10px"></i>
                                            สรุปยอดขายตามเมนู
                                        </a>
                                    </li>
                                  
                                    <!-- <li class="ng-scope">
                                        <a href="#!" class="ng-binding">
                                            <i class="far fa-circle text-aqua"></i>
                                            สรุปยอดขายรายเดือน
                                        </a>
                                    </li> -->
                                    <!-- <li class="ng-scope">
                                        <a href="#!outofuse" class="ng-binding">
                                            <i class="far fa-circle text-aqua"></i>
                                            บันทึกครุภัณฑ์เสียหาย
                                        </a>
                                    </li> -->
                                </ul>
                            </li>
                            <li class="treeview ng-scope" ng-show = "user.level == 'admin'">
                                <a href="#">
                                    <i class="fa fa-cog"></i> 
                                    <span class="ng-binding">ตั้งค่าพื้นฐาน</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="ng-scope">
                                        <a href="#!organization" class="ng-binding">
                                            <i class="far fa-circle text-aqua" style="font-size : 10px"></i>
                                            ข้อมูลร้าน
                                        </a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="#!coffeeType" class="ng-binding">
                                            <i class="far fa-circle text-aqua" style="font-size : 10px"></i>
                                            ประเภทกาแฟ
                                        </a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="#!coffeeSize" class="ng-binding">
                                            <i class="far fa-circle text-aqua" style="font-size : 10px"></i>
                                            ขนาดกาแฟ
                                        </a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="#!topping" class="ng-binding">
                                            <i class="far fa-circle text-aqua" style="font-size : 10px"></i>
                                            Topping
                                        </a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="#!product" class="ng-binding">
                                            <i class="far fa-circle text-aqua" style="font-size : 10px"></i>
                                            สินค้า
                                        </a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="#!coffee" class="ng-binding">
                                            <i class="far fa-circle text-aqua" style="font-size : 10px"></i>
                                            เครื่องดื่ม
                                        </a>
                                    </li>
                                    <li class="ng-scope">
                                        <a href="#!users" class="ng-binding">
                                            <i class="far fa-circle text-aqua" style="font-size : 10px"></i>
                                            ผู้ใช้งานระบบ
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </section>
                </div>
            </aside>

            <div class="content-wrapper" style="padding: 20px ">
                <section class="content">
                    <div ng-view></div>
                </section>
            </div>
           
            
            <!-- FastClick -->
            <script src="css/bower_components/fastclick/lib/fastclick.js"></script>
            <!-- AdminLTE App -->
            <script src="dist/js/adminlte.min.js"></script>
            <!-- Sparkline -->
            <script src="js/jquery.sparkline.min.js"></script>
            <!-- jvectormap  -->
            <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    </body>
</html>
