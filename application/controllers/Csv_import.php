<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Csv_import extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('csv_import_model');
		$this->load->library('csvimport');
	}

	public function index()
	{
	   
	  
	  //$data_t = array("toi"=> 2, "xxx"=>5 , ccc => array(3,4,5));
	  
	  
		//List ข้อมูลมาแสดงในหน้าจอ
		$this->load->view('template/template1');
		$this->load->view('template/template2');
		$this->load->view('template/template3');
		$this->load->view('basicdata/importdata/page_import_data'); 
		$this->load->view('template/template5');
		$this->load->view('template/template6');
		

    }
    
    public function indexa()
    {
        
        
        //$data_t = array("toi"=> 2, "xxx"=>5 , ccc => array(3,4,5));
        
        
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('template/template3');
        $this->load->view('basicdata/importdata/statusimportstudent');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
        
    }
}
