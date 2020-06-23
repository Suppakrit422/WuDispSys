<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function template()
	{
		$this->load->view('template/template1');
		$this->load->view('template/template2');
		$this->load->view('template/template3');
		/*$this->load->view('template/page_usergroup');*/ /*หน้าเพิ่มประเภทผู้ใช้*/
		/*$this->load->view('template/page_type_punish');*/ /*หน้าเพิ่มหมวดความผิด*/
		$this->load->view('template/blank');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}

}
