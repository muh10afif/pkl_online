<?php
    class model_admin extends CI_Model{
    
    function login($username,$password)
    {
        $chek=  $this->db->get_where('operator',array('username'=>$username,'password'=>md5($password)));

           
        if($chek->num_rows()>0){
            /*$user=$chek->row_array();
            $session=array(
            'operator_id'=>$user['operator_id'],
            'hasil'=>$user['hasil']
            );
            $this->session->set_userdata($session);*/
            return 1;
        }
        else{
            return 0;
        }
    }
    
    
    function tampil_data()
    {
        return $this->db->get('operator');
    }
    
    function get_one($id)
    {
        $param  =   array('operator_id'=>$id);
        return $this->db->get_where('operator',$param);
    }
}