<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainMenuReport extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('report2_models', 'report2_models');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();

	}
	
	public function template(){
		$this->load->view('template/template1');
		$this->load->view('template/template2');
		$this->load->view('menu/DormitortSupervisor/menu_user_dormsupervisor');
		$this->load->view('template/template4');
		$this->load->view('report/main_menu/main_menu_report_view');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	}

}


