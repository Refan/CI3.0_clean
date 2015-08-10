<?php	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Checkpermit
{
	public function __construct()
	{
		$this->CI =& get_instance();
                      //ck_act空值 登出 && controllers 不等於 login 用於登入登出
		if(empty($_SESSION["ck_act"]) && !isset($_SESSION["ck_act"]) && $this->CI->router->fetch_class()!="login" )
		{
			unset($_SESSION["ck_act"]);
			header("Location:/admin.php/login/out");exit;
		}
	}
}
?>