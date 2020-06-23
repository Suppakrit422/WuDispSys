

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMenuDean extends CI_Controller {
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
		$this->load->view('menu/Dean/menu_user_dean');
        $this->load->view('template/template4');
        $this->load->view('report/dean/report_main_menu_dean');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}

}


