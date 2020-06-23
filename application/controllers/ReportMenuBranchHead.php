
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMenuBranchHead extends CI_Controller {
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
		$this->load->view('menu/branch_head/menu_branch_head');
		$this->load->view('template/template4');
		$this->load->view('report/branch_head/report_main_menu_branch_head');
		//$this->load->view('Test');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}

}


