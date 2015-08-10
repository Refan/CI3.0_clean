<?php

class Member_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
		$this->per = 10;
    }
	
	public function set_per($per = 10)
	{
		$this->per = $per;
	}
	public function setLimit($query)
	{	
		if (count($_GET) > 0) $config['suffix'] = page_suffix();
		$config['per_page'] = $this->per;
		$config['base_url'] = site_url($this->router->uri->uri_string);
		$config['total_rows'] = $query->num_rows;
		$this->pagination->initialize($config); 
	}
	
	public function MemberChk(){	//管理者登入
		$this->db->where('m.m_level',7);
		$this->db->where('m.m_status',1);
		$this->db->from('member AS m');
		$this->db->join('webmaster_main AS wm','m.m_id=wm.m_id','left');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function MemberAll($where = null, $page = null){
			$this->db->order_by("m.m_id", "desc"); 
			$query = $this->db->get("member AS m");
		
		if (!empty($page)){
			$this->setLimit($query);
			$sql = $this->db->last_query();
			$limit = ($page-1)*$this->per;
			$sql .= " LIMIT $limit,$this->per";
			$query = $this->db->query($sql);
		}
		
		return $query->result_array();
	}

	
}