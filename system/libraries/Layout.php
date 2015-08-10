<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class CI_Layout
{
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->script = "";
		$this->layout = $this->CI->config->item('Layout');
		//session_start();
	}

	function setLayout($layout)
	{
		$this->layout = $layout;
	}

	function view($view, &$data=null, $return=false)
	{
		$view = $this->CI->router->directory.$view;
		$jsview = explode("/",$view); 	//view分資料夾所以讀js要處理
		if (count($jsview)>1)
			$this->js(array($jsview[1]));
		else
			$this->js(array($view));
		
		$data["layout"]["content"] = $this->CI->load->view($view,$data,true);
		$data["layout"]["script"] = $this->script;
		$data["layout"]["title"] = empty($data["title"])? "" : $data["title"]." - ";

		if($return)
		{
			$content = $this->CI->load->view($this->layout, $data["layout"], true);
			return $content;
		}
		else
		{
			$this->CI->load->view($this->layout, $data["layout"], false);
		}
	}
	
	function jquery($jquery="")
	{
		if($jquery=="ckeditor")
		{
			$this->script .= "<script type='text/javascript' src='".DIRPackages."ckeditor/ckeditor.js'></script>";
		}
	}
	
	function js($js=NULL)
	{
		foreach($js as $file)
		{		
			$this->load($this->CI->config->item('AppDir')."js/".$file);
		}
	}
	
	function load($file=NULL)
	{
		if(file_exists($file.".js"))
		$this->script .= '<script type="text/javascript" src="'.WEBNAME.$file.'.js"></script>';
	}
}

?>