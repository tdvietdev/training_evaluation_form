<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->database();
	}
	
	public function get_list_class()
    {
        return $this->db->select('*')
        ->from('classes')->get()->result_array();
    }
}