<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Report_user_dromsupervisor extends CI_Controller {
    function __construct(){
        parent:: __construct();
		$this->load->model('dormitory_supervisor_dashboard_model', 'dormitory_supervisor_dashboard_model');
		$this->load->model('SettimeSession','SettimeSession');
    }


	public function index()
	{
	    //$this->checkAutoriry();
	    $this->template();

	}
	public function getDashboard(){
		$result = $this->dormitory_supervisor_dashboard_model->getDashboard();
		echo json_encode($result);
	}
	public function getGraphData(){
		$result = $this->dormitory_supervisor_dashboard_model->getGraphData();
		echo json_encode($result);
	}	
	
	public function template()
	{
		$this->load->view('template/template1');
		$this->load->view('template/template2');
		$this->load->view('menu/DormitortSupervisor/menu_user_dormsupervisor');
		$this->load->view('template/template4');
		$this->load->view('dormitory_supervisor/report/report_user_dromsupervisor');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	}
	
	
	
}


