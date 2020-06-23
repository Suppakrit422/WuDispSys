
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportMenuDiscipline extends CI_Controller {
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
		$this->load->view('menu/Discipline_officer/menu_Discipline_officer');
		$this->load->view('template/template4');
		$this->load->view('report/discipline_officer/report_main_menu_discipline');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	}

}


