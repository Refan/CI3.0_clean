<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()     //登入
    {
		$this->load->model("member_model");
		
        unset($_SESSION["ck_act"]);
        $this->form_validation->set_rules('account', '帳號', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('pwd', '密碼', 'trim|required|max_length[30]'); 
        if ($this->form_validation->run() == true){
            if(securimage_check()==false)
				page_back("驗證碼錯誤，請重新輸入",WEBAdmin."login/index","error");
            	
			$this->db->where('m.m_account',$_POST['account']);
			$this->db->where('m.m_password',md5($_POST['pwd']));
			$result = $this->member_model->MemberChk();
			
            if(!empty($result)){
				$_SESSION["ck_act"] = $result[0]["m_account"];
				header("Location: ".WEBAdmin."webmaster/main");exit;    //儀表板
            }else{
				page_back("帳號密碼錯誤，請重新輸入",WEBAdmin."login/index","error");
            }
        }
		
        $this->load->view('login_index');
    }
    public function out()     //登出
    {
        unset($_SESSION["ck_act"]);
        header("Location: ".WEBAdmin);exit;
    }
   
}
