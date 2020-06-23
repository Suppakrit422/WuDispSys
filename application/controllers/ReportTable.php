
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportTable extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('officer_curg_model', 'officer_curg_model');
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
		$this->load->view('report/main_menu/report_table_view');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	}

}


