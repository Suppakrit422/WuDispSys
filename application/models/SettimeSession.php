<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SettimeSession extends CI_Model {
    function __construct(){
        parent:: __construct();
       
    }
    public function index(){

    }

     public function SetTime(){
        $this->session->mark_as_temp('login',1800);

    }
}
?>
