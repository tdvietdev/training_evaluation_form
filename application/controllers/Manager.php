<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Manager extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->verify_login();
		$this->load->model('evaluation_form_model');
		$this->load->model('class_model');
		$this->load->model('ef_student_model');
		$this->load->model('user_model');

		$this->add_stylesheet('assets/css/bootstrap-spinedit.css');
		$this->add_stylesheet('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
		$this->mScripts['head'][] = 'assets/js/jquery-ui.js';
		$this->mScripts['head'][] = 'assets/js/head_scritp.js';
		$this->mScripts['foot'][] = 'assets/js/home_spinner.js';
	}

	public function index($form_id)
	{
        $userid = $this->ion_auth->get_user_id();
		if ($this->ion_auth->in_group('loptruong'))
		{
            // list student class
			var_dump($this->user_model->get_class_id($userid));
			echo '<pre>';
            $list_student = $this->user_model->get_list_classmate($this->user_model->get_class_id($userid));
			echo '</pre>';
			foreach ($list_student as $key => $value) {
				$mStatus = $this->ef_student_model->check_ef_by_user($value['user_id'],$form_id);
				$list_student[$key]['status'] = $mStatus ;
				if ($mStatus == -1) {
					$list_student[$key]['sum'] = -1;
				} else {
					$list_student[$key]['sum'] = $this->ef_student_model->get_ef_by_user($value['user_id'],$form_id)->sum;
					$list_student[$key]['efst_id'] = $this->ef_student_model->get_ef_by_user($value['user_id'],$form_id)->efst_id;
				}
			}

			echo '<pre>';
            var_dump($list_student);
			echo '</pre>';
			$this->mViewData['list_std'] = $list_student;
			$this->mViewData['form_id'] = $form_id;
			$this->render('manager/pre_manager');

		}else if ($this->ion_auth->in_group('covan'))
		{
			
			$list_form = $this->evaluation_form_model->get_list_active_form();
			foreach ($list_form as $key => $value) {
				$list_form[$key]['status'] =  $this->ef_student_model->check_ef_by_user(1,$value['ef_id']);
			}
			$this->mViewData['list_form'] = $list_form;
			$this->render('home/student');
			
		}
		
	}

	public function pre($form_id)
	{
		$userid = $this->ion_auth->get_user_id();
		if (!$this->ion_auth->in_group('loptruong')) redirect('error_r');
		if ( $this->input->server('REQUEST_METHOD') == 'POST') {
			$accept = $this->input->post('accept');
			var_dump($accept);
			foreach ($accept as $key => $value) {
				$this->ef_student_model->update_efst(array('efst_status' => 2),$value);
			}
		}
            // list student class
            $list_student = $this->user_model->get_list_classmate($this->user_model->get_class_id($userid));
			foreach ($list_student as $key => $value) {
				$mStatus = $this->ef_student_model->check_ef_by_user($value['user_id'],$form_id);
				$list_student[$key]['status'] = $mStatus ;
				if ($mStatus == -1) {
					$list_student[$key]['sum'] = -1;
				} else {
					$list_student[$key]['sum'] = $this->ef_student_model->get_ef_by_user($value['user_id'],$form_id)->sum;
					$list_student[$key]['efst_id'] = $this->ef_student_model->get_ef_by_user($value['user_id'],$form_id)->efst_id;
				}
			}

			$this->mViewData['class_info'] = $this->user_model->get_class_user($this->ion_auth->get_user_id());
			$this->mViewData['list_std'] = $list_student;
			$this->mViewData['form_id'] = $form_id;
			$this->render('manager/pre_manager');
	}

	public function adv($form_id)
	{
		$userid = $this->ion_auth->get_user_id();
		if (!$this->ion_auth->in_group('covan')) redirect('error_r');
		if ( $this->input->server('REQUEST_METHOD') == 'POST') {
			

		}
            // list student class
            $list_student = $this->user_model->get_list_classmate($this->user_model->get_class_id($userid));
			foreach ($list_student as $key => $value) {
				$mStatus = $this->ef_student_model->check_ef_by_user($value['user_id'],$form_id);
				$list_student[$key]['status'] = $mStatus ;
				if ($mStatus == -1) {
					$list_student[$key]['sum'] = -1;
				} else {
					$list_student[$key]['sum'] = $this->ef_student_model->get_ef_by_user($value['user_id'],$form_id)->sum;
					$list_student[$key]['efst_id'] = $this->ef_student_model->get_ef_by_user($value['user_id'],$form_id)->efst_id;
				}
			}

			$this->mViewData['class_info'] = $this->user_model->get_class_user($this->ion_auth->get_user_id());
			$this->mViewData['list_std'] = $list_student;
			$this->mViewData['form_id'] = $form_id;
			$this->render('manager/adv_manager');
	}

	public function fac($form_id = -1, $class_id = -1)
	{
		$userid = $this->ion_auth->get_user_id();
		if (!$this->ion_auth->in_group('khoa')) redirect('error_r');
		if ( $this->input->server('REQUEST_METHOD') == 'POST') {
			$class_id = $this->input->post('class');
			if ($class_id != -1) {
				$list_student = $this->user_model->get_list_classmate($class_id);
			foreach ($list_student as $key => $value) {
				$mStatus = $this->ef_student_model->check_ef_by_user($value['user_id'],$form_id);
				$list_student[$key]['status'] = $mStatus ;
				if ($mStatus == -1) {
					$list_student[$key]['sum'] = -1;
				} else {
					$list_student[$key]['sum'] = $this->ef_student_model->get_ef_by_user($value['user_id'],$form_id)->sum;
					$list_student[$key]['efst_id'] = $this->ef_student_model->get_ef_by_user($value['user_id'],$form_id)->efst_id;
				}
			}
			} else {
				$list_student = array();
			}

		} else {
			$list_student = array();
		}
            // list student class
            
			$this->mViewData['list_class'] = $this->class_model->get_list_class();
			// $this->mViewData['class_info'] = $this->user_model->get_class_user($this->ion_auth->get_user_id());
			$this->mViewData['list_std'] = $list_student;
			$this->mViewData['form_id'] = $form_id;
			$this->mViewData['class_id'] = $class_id;
			$this->render('manager/fac_manager');
	}


} 
