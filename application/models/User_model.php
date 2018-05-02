<?php 

class User_model extends MY_Model {

    public function __construct() {
		parent::__construct();
		$this->load->database();
    }
    
    public function get_class_id($user_id)  
    {
        return $this->db->select('uc.class_id')
        ->from('users u')
        ->where('u.id',$user_id)
        ->join('user_class uc','u.id = uc.user_id')
        ->get()->row()->class_id;
    }
    public function get_class_user($user_id)  
    {
        return $this->db->select('c.class_id, c.class_name')
        ->from('classes c')
        ->where('uc.id',$user_id)
        ->join('user_class uc','c.class_id = uc.class_id')
        ->get()->row();
    }
    public function get_class_name($user_id)  
    {
        return $this->db->select('c.class_id, c.class_name')
        ->from('classes c')
        ->where('uc.id',$user_id)
        ->join('user_class uc','c.class_id = uc.class_id')
        ->get()->row()->class_name;
    }
    public function get_list_classmate($class_id)
    {
        $mquery = $this->db->select('uc.user_id, u.username, u.first_name, u.last_name, u.phone' )
        ->from('user_class uc')
        ->where(array('uc.class_id'=> $class_id,'ug.group_id<' => 3))
        ->join('users u', 'u.id = uc.user_id')
        ->join('users_groups ug', 'u.id = ug.user_id')
        ->order_by('u.last_name')
        ->get();
        // ->join('ef_student efst','efst.user_id = u.id' )->get();
        return $mquery->result_array();

    }

    public function get_info($user_id)  
    {

    }




}