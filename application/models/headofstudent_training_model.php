<?php

class headofstudent_training_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
public function selectoffensecate(){
        // $oc_ID = 8;
        // $oc_ID = $_GET['oc_ID'];
        // $this->db->distinct();
        $this->db->select('oc_ID,oc_desc');   
        $this->db->from('offensecate');
        $this->db->order_by('oc_ID ASC');
        $query = $this->db->get();
        $data = array();
        $data = $query->result_array();
      //var_dump( $data);
     // die();

        if($data !=NULL){
            return $data;
        }else{
            return false;
        }

    }
    public function selecttraining(){
        // $oc_ID = 8;
        // $oc_ID = $_GET['oc_ID'];
        // $this->db->distinct();
        $this->db->select('*');   
        $this->db->from('training t');
        $this->db->join('offensecate oc','t.oc_ID=oc.oc_ID');

        // $this->db->order_by('oc_ID ASC');
        $query = $this->db->get();
        $data = array();
        $data = $query->result_array();
      //var_dump( $data);
     // die();

        if($data !=NULL){
            return $data;
        }else{
            return false;
        }

    }

//ไม่สมบรูณ์
    public function tableprint(){
        // $oc_ID = 8;
        // $oc_ID = $_GET['oc_ID'];
        $this->db->distinct();
        $this->db->select('oc.oc_ID,c.cur_name,d.dept_name,std.S_ID ,std.std_fname,std.std_lname');   
        $this->db->from('offensestd ostd');
        $this->db->join('offensehead oh','ostd.oh_ID=oh.oh_ID');
        $this->db->join('offense o','oh.off_ID=o.off_ID'); 
        $this->db->join('offensecate oc','o.oc_ID=oc.oc_ID');
        $this->db->join('student std','ostd.S_ID=std.S_ID');
        $this->db->join('curriculum c','std.cur_ID=c.cur_ID');
        $this->db->join('divisions d','c.dept_ID=d.dept_ID'); 
        // $this->db->group_by('std.S_ID');
        // $this->db->where('d.dept_ID',$dept_ID);
        // $this->db->where('oc.oc_ID',$oc_ID);
        $this->db->order_by('oc.oc_ID ASC');
        $query = $this->db->get();
        $data = array();
        $data = $query->result_array();
      //var_dump( $data);
     // die();

        if($data !=NULL){
            return $data;
        }else{
            return false;
        }

    }
    public function showall(){

        $this->db->select('train_date,train_name,oc_desc,person_fname,person_lname,train_receive,room,place_name,time,note');
        $this->db->from('training t');
        $this->db->join('offensecate oc','t.oc_ID=oc.oc_ID');
        $this->db->join('personnel p','t.person_ID=p.person_ID');
        $this->db->join('place pl','t.place_ID=pl.place_ID');

        $query = $this->db->get();
        $data = array();
        $data = $query->result_array();
       //var_dump( $data);
      // die();

        if($data !=NULL){
            return $data;
        }else{
            return false;
    }

    }

    public function addtraining(){


        $field=array(
            'train_ID'=>$this->input->post('train_ID'),
            'train_name'=>$this->input->post('train_name'),
            'oc_ID'=>$this->input->post('oc_ID'),
            'person_ID'=>$this->input->post('person_ID'),
            'place_ID'=>$this->input->post('place_ID'),
            'room'=>$this->input->post('room'),
            'train_receive'=>$this->input->post('train_receive'),
            'train_date'=>$this->input->post('train_date'),
            'note'=>$this->input->post('note'),
            'time'=>$this->input->post('time')
        );
        // $field=array(
        //     'train_ID'=>'1',
        //     'train_name'=>'bb',
        //     'oc_ID'=>'8',
        //     'person_ID'=>'1',
        //     'place_ID'=>'1001',
        //     'room'=>'112',
        //     'train_receive'=>'50',
        //     'train_date'=>'12/12/19',
        //     'note'=>'boom',
        //     'time'=>'12.00'
        // );
        $this->db->insert('training',$field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    
    public function edittraining(){

        $id = $this->input->post('id');
        $this->db->where('train_ID',$id);
        $query=$this->db->get('training');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function deletetraining(){
        // $delid = '1';
        $delid = $this->input->post('delid');
        $this->db->where('train_ID',$delid);
        $this->db->delete('training');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}
