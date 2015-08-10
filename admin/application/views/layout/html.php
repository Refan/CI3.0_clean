<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin</title>
    
    <!-- jQuery -->
    <script src="<?=DIRScript?>jquery-1.11.2.min.js"></script>
    <script src="<?=DIRScript?>jquery-ui/jquery-ui.js"></script>
    <link href="<?=DIRScript?>jquery-ui/jquery-ui.css" rel="stylesheet">
    <link href="<?=DIRScript?>jquery-ui/jquery-ui.theme.css" rel="stylesheet">
    <link href="<?=DIRScript?>jquery-ui/jquery-ui.structure.css" rel="stylesheet">
    
    <!-- Bootstrap Core CSS -->
    <link href="<?=DIRScript?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?=DIRScript?>bootstrap/js/bootstrap.min.js"></script>
    <link href="<?=DIRScript?>bootstrap/breadcrumbs.css" rel="stylesheet"><!--列表麵包屑-->
    <link href="<?=DIRScript?>bootstrap/InputValidation.css" rel="stylesheet"><!--輸入驗證-->
    
	<!-- Bootstrap-Editable -->
    <link href="<?=DIRScript?>bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
    <script src="<?=DIRScript?>bootstrap-editable/js/bootstrap-editable.js"></script>
	
    <!-- bootstrap-datepicker -->
    <link href="<?=DIRScript?>bootstrap-datepicker/bootstrap-datepicker3.css" rel="stylesheet">
    <script src="<?=DIRScript?>bootstrap-datepicker/bootstrap-datepicker.js"></script>
    
    <!-- MetisMenu -->
    <link href="<?=DIRScript?>metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <script src="<?=DIRScript?>metisMenu/dist/metisMenu.min.js"></script>
    
    <!-- sb-admin -->
    <link href="<?=DIRScript?>sb-admin/css/timeline.css" rel="stylesheet">
    <link href="<?=DIRScript?>sb-admin/css/sb-admin-2.css" rel="stylesheet">
    <script src="<?=DIRScript?>sb-admin/js/sb-admin-2.js"></script>
    
    <!-- Custom Fonts -->
    <link href="<?=DIRScript?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- sweet-alert -->
    <!--
    <link href="<?=DIRScript?>sweet-alert/sweet-alert.css" rel="stylesheet">
    <script type="text/javascript" src="<?=DIRScript?>sweet-alert/sweet-alert.js"></script>
    -->
    <link href="<?=DIRScript?>sweet-alert/sweetalert.css" rel="stylesheet">
    <script type="text/javascript" src="<?=DIRScript?>sweet-alert/sweetalert-dev.js"></script>
    
	<!-- responsive-tables -->
    <link href="<?=DIRScript?>responsive-tables/css/rwd-table.css" rel="stylesheet">
    <script type="text/javascript" src="<?=DIRScript?>responsive-tables/js/rwd-table.js"></script>
	
    <!--other-->
    <link href="<?=DIRADMIN?>css/style.css" rel="stylesheet">
    <script type="text/javascript" src="<?=DIRADMIN?>js/all.js"></script>
    
    <?=$script?>
  </head>

  <body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;min-height: 100px;">
            <div class="navbar-header">
                <!--下選單bar-->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="<?=DIRADMIN?>images/header.png" class="img-responsive" style="float: left;">
                <a class="navbar-brand" href="/">Admin v2.0</a>
            </div><!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" href="<?=WEBAdmin?>login/out">
                        <i class="fa fa-sign-out fa-fw"></i>  登出
                    </a>
                </li>
            </ul><!-- /.navbar-top-links -->

            <?PHP $this->load->view("layout/tool");?>
        </nav>
		
            <?=$content?>
        
        <div id="page-wrapper2" class="footer">
            <div class="row"><div class="col-md-12">&nbsp;</div></div>
            <div class="row">
                <div class="col-md-12">
                    <img src="<?=DIRADMIN?>images/footer.jpg" class="img-responsive">
                </div>
            </div>
			<!--
            <div class="row">
                <div class="col-md-12">
                    建議使用：Google Chrome 或 IE8以上版本 等其他瀏覽器
                </div>
            </div>
			-->
        </div>
        
        
    </div><!-- /#wrapper -->
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
    if (getCookie("error")!=""){
        swal({
          title: "Error!",
          text: getCookie("error"),
          type: "error",
          confirmButtonText: "Ok"
        });
        setCookie("error","",0);
    }

    if (getCookie("msg")!=""){
        swal({
          title: "Success!",
          text: getCookie("msg"),
          type: "success",
          confirmButtonText: "Ok"
        });
        setCookie("msg","",0);
    }
});
</script>