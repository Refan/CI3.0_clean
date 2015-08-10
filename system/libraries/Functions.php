<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class CI_Functions
{
    public function __construct()
    {
        $this->CI =& get_instance();
		
		require_once 'config/config.php';
    }
}
function remoteIP() {
	global $_SERVER;
	if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), '')) {
		$ip = getenv('HTTP_CLIENT_IP');
	} else
		if (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), '')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		} else
			if (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), '')) {
				$ip = getenv('REMOTE_ADDR');
			} else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], '')) {
					$ip = $_SERVER['REMOTE_ADDR'];
				} else {
					$ip = 'unkown';
				}
	return $ip;
}
function page_back($msg="error", $header=NULL, $key="msg")
{
	setcookie($key, $msg, time()+60, '/'); //(60秒)
	if(empty($header)){
		header("Location:".$_SERVER['HTTP_REFERER']);exit;  //回上一頁
	}else if($header!="this"){
		header("Location:".$header);exit;
	}
}
function securimage_print()		//替換，使用lib 到時砍掉
{
    echo '<input type="text" name="securimages" class="form-control" maxlength="4" value="" placeholder="請輸入驗證碼" required>&nbsp;';
    echo '<img id="siimage" style="vertical-align:middle;" src="'.DIRPackages.'securimage/securimage_show.php?sid='.md5(time()).'" />&nbsp;';
    echo '<a id="sianchor" href="javascript:void(0);" title="change"><img style="vertical-align:middle;" src="'.DIRPackages.'securimage/images/refresh.gif"></a>';
}
function securimage_check()		//替換，使用lib 到時砍掉
{
    require_once( "packages/securimage/securimage.php");
    $securimage = new Securimage();
    $sickrs = $securimage->check($_POST['securimages']);
    unset($_POST['securimage']);
    if(!$sickrs){
        return false;
    }else{
        return true;
    }
}
function debug($str)
{
    print '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
    print '<div style="border:1px solid #F00;padding:5px;margin:5px;">';
    print '<p style="font-weight:bold;margin-bottom:10px;">Debug專區 :: </p>';
    print '<pre>'.print_r($str, true).'</pre>';
    print '</div>';
}
function LimitStr($str, $strlen) 
{
	$str=preg_replace("/<[^<]+>/","",$str);      
	$str = str_replace(' ', ' ', $str);
	$output_str_len = 0; 
	$output_str = ''; 
	for($i=0; $i<=$strlen;$i++){ 
		$str_bit = ord(substr($str, $i, 1));
		if($str_bit < 128) {
			$output_str_len += 1;
			$output_str .= substr($str, $i, 1); 
		}elseif($str_bit > 191 && $str_bit < 224) {
			$output_str_len += 2;
			$output_str .= substr($str, $i, 2); 
			$i++;
		}elseif($str_bit > 223 && $str_bit < 240) { 
			$output_str_len += 2; 
			$output_str .= substr($str, $i, 3);
			$i+=2;
		}elseif($str_bit > 239 && $str_bit < 248) { 
			$output_str_len += 2;
			$output_str .= substr($str, $i, 4); 
			$i+=3;
		}
	}
	return ($output_str == '') ? $str : $output_str.'...';
}
function page_suffix()	//pagination
{
	$hrefTextSuffix = "";
	$QUERY_STRING = explode("&",$_SERVER["QUERY_STRING"]);		//擷取後面變數
	foreach ($QUERY_STRING as $key => $val){		//略過page
		if (substr($val,0,4)!="page"){
			$hrefTextSuffix .= "&".$val;
		}
	}
	return $hrefTextSuffix;
}
function FindChildren($self, $arrCategory, $Separate = "─") {		//Category層級列出
	$returnValue = "";
	for ($index = $arrCategory[$self]["c_level"]; $index>=0; $index--) {
		$returnValue = $arrCategory[$self]["c_name"] . $returnValue;
		$self = $arrCategory[$self]["c_parent"];
		if ($self == 0) {
			return $returnValue;
		}
		$returnValue = $Separate . $returnValue;
	}
}
function check_identity($id){	//身分證字號驗證
	$id = strtoupper($id);
	//建立字母分數陣列  
	$head = array('A'=>1,'I'=>39,'O'=>48,'B'=>10,'C'=>19,'D'=>28,  
				  'E'=>37,'F'=>46,'G'=>55,'H'=>64,'J'=>73,'K'=>82,  
				  'L'=>2,'M'=>11,'N'=>20,'P'=>29,'Q'=>38,'R'=>47,  
				  'S'=>56,'T'=>65,'U'=>74,'V'=>83,'W'=>21,'X'=>3,  
				  'Y'=>12,'Z'=>30);  
	//建立加權基數陣列  
	$multiply = array(8,7,6,5,4,3,2,1);  
	//檢查身份字格式是否正確  
	if (preg_match("/^[a-zA-Z][1-2][0-9]+\$/",$id) && strlen($id) == 10){  
		//切開字串  
		$len = strlen($id);  
		for($i=0; $i<$len; $i++){  
			$stringArray[$i] = substr($id,$i,1);  
		}  
		//取得字母分數  
		$total = $head[array_shift($stringArray)];
		//取得比對碼  
		$point = array_pop($stringArray);  
		//取得數字分數  
		$len = count($stringArray);
		for ($j=0; $j<$len; $j++){  
			$total += $stringArray[$j]*$multiply[$j];  
		}  
		//檢查比對碼  
		if (($total%10 == 0 )?0:10-$total%10 != $point) {  
			return false;  
		} else {  
			return true;  
		}  
	}else{  
	   return false;  
	}  
}
function checkID($sid) 	//統編驗證
{
   $tbNum = array(1,2,1,2,1,2,4,1); 
   if(strlen($sid)!=8 || !preg_match("/^[0-9*]{8}/",$sid)) 
   { 
	  return false;
   }	   
   $intSum = 0; 
   for ($i = 0; $i < count($tbNum); $i++) 
   { 
	  $intMultiply=substr($sid,$i,1)*$tbNum[$i]; 
	  $intAddition=(floor($intMultiply / 10) + ($intMultiply % 10)); 
	  $intSum+=$intAddition; 
   } 
   
   if(($intSum % 10 == 0 ) || ($intSum%10==9 && substr($sid,6,1)==7)) 
   {
	   return true; 
   } 
   else 
   { 
	   return false; 
   } 
}
?>