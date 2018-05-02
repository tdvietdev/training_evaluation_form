<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Evaluation extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		
		// only login users can access Account controller
		$this->verify_login();
		$this->mViewData['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
	
		// $this->session->set_flashdata('message', 'You must be a gangsta to view this page');
		$this->load->model('evaluation_form_model');
		$this->load->model('ef_student_model');
		// $this->load->model('user_ranking_model');
		$this->add_stylesheet('assets/css/bootstrap-spinedit.css');
		$this->add_stylesheet('assets/css/ckeditor/samples.css');
		$this->add_stylesheet('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
		// $this->mScripts['head'][] = 'http://code.jquery.com/jquery-1.9.1.js';
		$this->mScripts['head'][] = 'assets/js/jquery-ui.js';
		$this->mScripts['head'][] = 'assets/js/head_scritp.js';
		// $this->mScripts['foot'][] = 'assets/js/bootstrap-spinedit.js';
		$this->mScripts['foot'][] = 'assets/js/home_spinner.js';
		$this->mScripts['foot'][] = 'assets/js/ckeditor/ckeditor.js';
		$this->mScripts['foot'][] = 'assets/js/ckeditor/samples/js/sample.js';
		$this->mScripts['foot'][] = 'assets/js/ckeditor/init.js';
	}

	public function index($form_id)
	{
		// echo $this->evaluation_form_model->get_list_active_form()->ef_description;
		
		if ($this->ion_auth->in_group('loptruong') || $this->ion_auth->in_group('sinhvien'))
		{
			$this->session->set_flashdata('message', 'You must be a gangsta to view this page');
		
			

		// var_dump($this->ef_student_model->check_ef_by_user(1,1));
			// foreach ($list_form as $key => $value) {
			// 	$list_form[$key]['status'] =  $this->ef_student_model->check_ef_by_user(1,$value['ef_id']);
			// }
			// $this->mViewData['list_form'] = $list_form;
			$userId = $this->ion_auth->get_user_id();
			if ( $this->input->server('REQUEST_METHOD') == 'GET') {
				// $form_id = $this->input->get('form_id');
				// $spinner = $this->input->get('spinner');
				$userId = $this->ion_auth->get_user_id();
				if (!$this->evaluation_form_model->check_ef_exist($form_id)) {
					redirect('error_r');
				}
				
				$efst_id = $this->ef_student_model->check_and_create($userId,$form_id);
				$form_struct = $this->ef_student_model->get_struct_by_id($efst_id);
				$this->mViewData['form_id'] = $form_id;
				$this->mViewData['data_struct'] = json_decode($form_struct);
				// var_dump($form_struct);
				// exit;

			} else {
				// $form_id = $this->input->post('form_id');
				$efst_id = $this->ef_student_model->check_and_create($userId,$form_id);
				$spinner = $this->input->post('spinner');
				// var_dump($spinner);
				$cb1 = $this->input->post('cb1');
				// var_dump($cb1);
				$cb2 = $this->input->post('cb2');
				// var_dump($cb2);
				$sum = $this->input->post('sum');

				$data['spinner'] = $spinner;
				$data['cb1'] = $cb1 == null ? array() : $cb1;
				$data['cb2'] = $cb2 == null ? array() : $cb2;
				$mJson = json_encode($data);

				

				$this->db->set(array('ef_struct'=>$mJson,'sum' => $sum));
				$this->db->where('efst_id', $efst_id);
				$this->db->update('ef_student');
				
				$form_struct = $this->ef_student_model->get_struct_by_id($efst_id);

				$this->mViewData['form_id'] = $form_id;
				$this->mViewData['data_struct'] = json_decode($form_struct);
			}
			// var_dump($this->ef_student_model->check_and_create(1,1));
			// var_dump($this->ef_student_model->get_struct_by_id(1));
			$this->mViewData['own_info'] = $this->ef_student_model->get_own_info($efst_id);
			$data_pre = $this->ef_student_model->get_data_pre($efst_id);
			$this->mViewData['data_pre'] = $data_pre;
			
            $this->render('form/student_form');
		}
		// echo "wefwefw";
		// exit;
		
		// $this->render('form/student_form');
	}

	public function class_pre($form_id = 1, $userId = 2)
	{
		if (!$this->ion_auth->in_group('loptruong'))
		redirect('error_r');

		$efst_id = $this->ef_student_model->check_exits_efst($userId,$form_id);
		if ($efst_id == -1) {
			redirect('error_r');
		}
		if ( $this->input->server('REQUEST_METHOD') == 'GET') {
			// $form_id = $this->input->get('form_id');
			// $userId = $this->ion_auth->get_user_id();
			// $this->input->get('pre_cmt');
			if (!$this->evaluation_form_model->check_ef_exist($form_id)) {
				redirect('error_r');
			}
			$this->ef_student_model->update_seen($efst_id);
			
			
			// var_dump($form_struct);
			// exit;

		} else{
			$pre_cmt = $this->input->post('pre_cmt');
			$pre_accept = $this->input->post('pre_accept');
			// $efst_id = $this->ef_student_model->check_and_create($userId,$form_id);
			// if ($efst_id == -1) {
			// 	redirect('error_r');
			// }
			
			$form_struct = $this->ef_student_model->update_efst(array('efst_status' => $pre_accept, 'efst_comment' =>$pre_cmt ),$efst_id);

		}
		
		$form_struct = $this->ef_student_model->get_struct_by_id($efst_id);
		$data_pre = $this->ef_student_model->get_data_pre($efst_id);
		$this->mViewData['own_info'] = $this->ef_student_model->get_own_info($efst_id);
		$data_pre = $this->ef_student_model->get_data_pre($efst_id);
		$this->mViewData['form_id'] = $form_id;
		$this->mViewData['data_struct'] = json_decode($form_struct);
		$this->mViewData['data_pre'] = $data_pre;
		$this->render('form/classpre_form');
	}

	public function adv($form_id = 1, $userId = 2)
    {
        if (!$this->ion_auth->in_group('covan'))
		redirect('error_r');

		$efst_id = $this->ef_student_model->check_exits_efst($userId,$form_id);
		if ($efst_id == -1) {
			redirect('error_r');
		}
		if ( $this->input->server('REQUEST_METHOD') == 'GET') {
			// $form_id = $this->input->get('form_id');
			// $userId = $this->ion_auth->get_user_id();
			// $this->input->get('pre_cmt');
			if (!$this->evaluation_form_model->check_ef_exist($form_id)) {
				redirect('error_r');
			}
			$this->ef_student_model->update_seen($efst_id,2,3);
			
			
			// var_dump($form_struct);
			// exit;

		} else{
			$adv_cmt = $this->input->post('adv_cmt');
			$adv_accept = $this->input->post('adv_accept');
			// $efst_id = $this->ef_student_model->check_and_create($userId,$form_id);
			// if ($efst_id == -1) {
			// 	redirect('error_r');
			// }
			
			$form_struct = $this->ef_student_model->update_efst(array('efst_status' => $adv_accept, 'efst_comment_2' =>$adv_cmt ),$efst_id);

		}
		
		$form_struct = $this->ef_student_model->get_struct_by_id($efst_id);
		$data_pre = $this->ef_student_model->get_data_pre($efst_id);
		$this->mViewData['own_info'] = $this->ef_student_model->get_own_info($efst_id);
		$data_pre = $this->ef_student_model->get_data_pre($efst_id);
		$this->mViewData['form_id'] = $form_id;
		$this->mViewData['data_struct'] = json_decode($form_struct);
		$this->mViewData['data_pre'] = $data_pre;
		$this->render('form/adv_form');
    }
	
} 
