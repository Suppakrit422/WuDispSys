
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMenuHeader extends CI_Controller {
	function __construct(){
		parent:: __construct();
		// $this->load->model('report_menu_header_model', 'report_menu_header_model');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();

	}
	
	public function template(){
		$this->load->view('template/template1');
		$this->load->view('template/template2');
		$this->load->view('menu/affairs/menu_affairs');
		$this->load->view('template/template4');
		$this->load->view('report/header_activity_student/report_main_menu_header');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	}

}


