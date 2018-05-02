<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		
		// only login users can access Account controller
		$this->verify_login();
		// $this->session->set_flashdata('message', 'You must be a gangsta to view this page');
		$this->load->model('evaluation_form_model');
		$this->load->model('ef_student_model');
		// $this->load->model('user_ranking_model');

		$this->add_stylesheet('assets/css/bootstrap-spinedit.css');
		$this->add_stylesheet('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
		// $this->mScripts['head'][] = 'http://code.jquery.com/jquery-1.9.1.js';
		$this->mScripts['head'][] = 'assets/js/jquery-ui.js';
		$this->mScripts['head'][] = 'assets/js/head_scritp.js';
		// $this->mScripts['foot'][] = 'assets/js/bootstrap-spinedit.js';
		$this->mScripts['foot'][] = 'assets/js/home_spinner.js';
	}

	public function index()
	{
		// var_dump( $this->ef_student_model->create_efst(2,0));
		// exit;
		if ($this->ion_auth->in_group('loptruong'))
		{
			
			$list_form = $this->evaluation_form_model->get_list_active_form();
			// var_dump($this->ef_student_model->check_ef_by_user(1,1));
			
			foreach ($list_form as $key => $value) {
				$list_form[$key]['status'] =  $this->ef_student_model->check_ef_by_user($this->ion_auth->get_user_id() ,$value['ef_id']);
			}
			$this->mViewData['list_form'] = $list_form;
			$this->render('home/class_pre');



		}else if ($this->ion_auth->in_group('sinhvien'))
		{
			
			$list_form = $this->evaluation_form_model->get_list_active_form();
			// var_dump($this->ef_student_model->check_ef_by_user(1,1));
			foreach ($list_form as $key => $value) {
				$list_form[$key]['status'] =  $this->ef_student_model->check_ef_by_user($this->ion_auth->get_user_id(),$value['ef_id']);
			}
			$this->mViewData['list_form'] = $list_form;
			// var_dump( $list_form );
			$this->render('home/student');
			// $this->render('form/student_form');
			
		} else if ($this->ion_auth->in_group('covan')){
			$list_form = $this->evaluation_form_model->get_list_active_form();
			// var_dump($this->ef_student_model->check_ef_by_user(1,1));
			
			
			$this->mViewData['list_form'] = $list_form;
			$this->render('home/adv');
		} else {
			$list_form = $this->evaluation_form_model->get_list_active_form();
			// var_dump($this->ef_student_model->check_ef_by_user(1,1));
			
			
			$this->mViewData['list_form'] = $list_form;
			$this->render('home/fac');
		}
		
		
	}

	


} 
