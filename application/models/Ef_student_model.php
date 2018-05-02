<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ef_student_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->database();
	}
	
	public function check_ef_by_user($user_id, $form_id)
    {
        $query = $this->_database->select('efst_status')
                        ->from('ef_student eft')
                        ->join('evaluation_form ef', 'ef.ef_id = eft.ef_id')
                        ->where(array('user_id' => $user_id,'eft.ef_id' => $form_id,'ef.ef_available' => 1 ))->get();
		if ($query->num_rows() == 0) {
            return -1;
        }
		return $query->row()->efst_status;
    }

    public function get_id_ef_by_user($user_id, $form_id)
    {
        $query = $this->_database->select('eft.efst_id')
        ->from('ef_student eft')
        ->join('evaluation_form ef', 'ef.ef_id = eft.ef_id')
        ->where(array('user_id' => $user_id,'eft.ef_id' => $form_id,'ef.ef_available' => 1 ))->get();
        if ($query->row() != NULL) {
            return $query->row()->efst_id;
        }else {
            return -1;
        }

    }
    public function checkstt_by_id($efst_id)
    {
        $query = $this->_database->select('efst_status')
        ->from('ef_student')
        ->where('efst_id' , $efst_id)->get();
        if ($query->num_rows() == 0) {
            return -1;
        }
        return $query->row()->efst_status;
    }
    public function update_seen($efst_id, $old_stt =0, $stt = 1)
    {
        
        if ($this->checkstt_by_id($efst_id) == $old_stt) {
            $this->update_efst(array('efst_status'=> $stt),$efst_id);
        }
    }

    public function get_sum_ef_by_user($user_id, $form_id)
    {
        $query = $this->_database->select('sum')
        ->from('ef_student')
        ->where(array('user_id' => $user_id,'ef_id' => $form_id))->get();
        return $query->row()->sum;

    }
    public function get_ef_by_user($user_id, $form_id)
    {
        $query = $this->_database->select('*')
        ->from('ef_student')
        ->where(array('user_id' => $user_id,'ef_id' => $form_id))->get();
        return $query->row();

    }

    public function create_efst($user_id, $ef_id)
    {
        $data = array(
            'efst_id' => NULL,
            'user_id' => $user_id,
            'ef_id' => $ef_id,
            'efst_status' => 0,
            'efst_comment' => '',
            'ef_struct' => '{"cb1": [], "cb2": [], "spinner": ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0"]}',
            'sum' =>70
    );
    
    $this->db->insert('ef_student', $data);
    }

    public function check_and_create($user_id, $ef_id)
	{
		$mCheck = $this->check_ef_by_user($user_id,$ef_id);
		if ($mCheck == -1) {
			// create 
			$this->create_efst($user_id, $ef_id);
			
		}
			// get id ef
			return $this->get_id_ef_by_user($user_id,$ef_id);
		
    }
    
    public function check_exits_efst($user_id, $ef_id)
	{
		$mCheck = $this->check_ef_by_user($user_id,$ef_id);
		if ($mCheck == -1) {
            return -1;
		}
			// get id ef
			return $this->get_id_ef_by_user($user_id,$ef_id);
		
    }
    
    public function get_struct_by_id($efst_id)
    {
        return $this->_database->select('ef_struct')
        ->from('ef_student')->where('efst_id',$efst_id)->get()->row()->ef_struct;
    }

    // public function get_list_active_by_user($id){
    //     $this->db->select('ef.*,

        
    //     ')->from('evaluation_form ef');

    // }

    public function update_efst($arr_data,$efst_id)
    {
        $this->db->set($arr_data);
        $this->db->where('efst_id', $efst_id);
        $this->db->update('ef_student');
    }

    public function get_data_pre($efst_id)
    {
        return $this->_database->select('efst_status,efst_comment,efst_comment_2')
        ->from('ef_student')->where('efst_id',$efst_id)->get()->row();
    }
    
    public function get_own_info($efst_id)
    {
        return $this->_database->select('u.id,u.username,u.first_name,u.last_name,c.class_name,ef.ef_name')
        ->from('users u')
        ->join('ef_student efst','efst.user_id = u.id')
        ->join('evaluation_form ef','ef.ef_id = efst.ef_id')
        ->join('user_class uc','uc.user_id = u.id')
        ->join('classes c','c.class_id = uc.class_id')
        ->where('efst.efst_id',$efst_id)
        ->get()->row();
    }
    
   
}