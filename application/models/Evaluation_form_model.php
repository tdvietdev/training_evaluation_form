<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation_form_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->database();
	}
	
	public function get_list_active_form()
    {
        $this->_database->select('*')
						->from('evaluation_form')
						->where('ef_available', 1);
		
		return $this->_database->get()->result_array();
	}
	


	public function check_ef_exist($form_id)
    {
        $query = $this->_database->select('*')
                        ->from('evaluation_form')
                        ->where('ef_id' , $form_id)->get();
		if ($query->num_rows() == 0) {
            return 0;
        }
		return 1;
    }


    // public function get_list_active_by_user($id){
    //     $this->db->select('ef.*,

        
    //     ')->from('evaluation_form ef');

    // }
   
}