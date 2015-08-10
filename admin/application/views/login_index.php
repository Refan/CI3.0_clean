<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign in</title>
	
    <script src="<?=DIRScript?>jquery-1.11.2.min.js"></script>
    <link href="<?=DIRScript?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=DIRScript?>bootstrap/signin.css" rel="stylesheet">
	
    <!-- sweet-alert -->
    <link href="<?=DIRScript?>sweet-alert/sweet-alert.css" rel="stylesheet">
    <script type="text/javascript" src="<?=DIRScript?>sweet-alert/sweet-alert.js"></script>
	
  </head>

  <body>

    <div class="container">
		<div class="row">
			<div class="col-md-2">
			&nbsp;
			</div>
			<div class="col-md-8">
				<h2><img src="<?=DIRADMIN?>images/login.jpg" class="img-responsive"></h2>
				<div class="jumbotron">	
				  <form class="form-signin" role="form" method="post" action="">
					  <?php echo validation_errors(); ?>
					
					<div class="row">
						<div class="col-md-3 text-center">
							<h4><label for="account" >Account</label></h4>
						</div>
						<div class="col-md-6">
							<input type="text" name="account" id="account" class="form-control" maxlength="20" placeholder="請輸入帳號" required autofocus>
						</div>
					</div>	
					
					<div class="row">
						<div class="col-md-3 text-center">
							<h4><label for="pwd">Password</label></h4>
						</div>
						<div class="col-md-6">
							<input type="password" name="pwd" id="pwd" class="form-control" maxlength="30" placeholder="請輸入密碼" required>
						</div>
					</div>	
					
					<div class="row">
						<div class="col-md-3 text-center">
							<h4><label for="pwd">Verification</label></h4>
						</div>
						<div class="col-md-6">
							<?=securimage_print();?>
						</div>
					</div>	
					
					<div class="row">
						<div class="col-md-3">
							&nbsp;
						</div>
						<div class="col-md-6">
							<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
						</div>
					</div>
					
				  </form>
				</div>
			</div>
		</div>
    </div> <!-- /container -->

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
});

$("#sianchor").click(function(){
	$("#siimage").prop("src","<?=DIRPackages?>securimage/securimage_show.php?sid="+Math.random());
});

function setCookie(c_name,value,expiredays,path)
{
    var exdate=new Date()
    exdate.setDate(exdate.getDate()+expiredays)
    document.cookie=c_name+ "=" +escape(value)+
    ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())+
	((path==null) ? ";path=/" : ";path="+path)
}
function getCookie(c_name)
{
    if (document.cookie.length>0)
    {
        c_start=document.cookie.indexOf(c_name + "=")
        if (c_start!=-1)
        { 
            c_start=c_start + c_name.length+1 
            c_end=document.cookie.indexOf(";",c_start)
            if (c_end==-1) c_end=document.cookie.length
            return decodeURI(document.cookie.substring(c_start,c_end))
        } 
    }
    return ""
}
</script>