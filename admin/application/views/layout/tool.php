<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <!--
            <li><a href="<?=WEBAdmin?>admin/main"><i class="fa fa-dashboard fa-fw"></i> 總覽</a></li>
			-->
			<li id="tool_webmaster"><a href="#"><i class="fa fa-database fa-fw"></i> 系統管理<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?=WEBAdmin?>webmaster/account">帳戶管理</a></li>
                    <li><a href="<?=WEBAdmin?>webmaster/main">首頁公佈欄</a></li>
                    <li><a href="<?=WEBNAME?>" target="_blank">前台首頁</a></li>
                </ul><!-- /.nav-second-level -->
            </li>
			<li id="tool_webmaster"><a href="#"><i class="fa fa-users fa-fw"></i> 會員管理<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?=WEBAdmin?>webmaster/member">會員管理</a></li>
                </ul><!-- /.nav-second-level -->
            </li>
           
        </ul>
    </div><!-- /.sidebar-collapse -->
</div><!-- /.navbar-static-side -->

<script>
$(document).ready(function(){
    /* //metisMenu
    var router_c = '<?=$this->router->fetch_class()?>';
    if (router_c!=""){
        $("#tool_"+router_c).addClass("active");
        $("#tool_"+router_c+">ul").addClass("in");
    } */
}); 
</script>