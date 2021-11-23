<?php
    class Model_user extends CI_Model{
    
    function login($nisnim,$password)
    {
        $chek=  $this->db->get_where('register',array('NIS_NIM'=>$nisnim,'password'=>md5($password)));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    
    function registrasi($data)
    {
        $this->db->insert('register',$data);
    }
    
    function tampildata()
    {
        return $this->db->get('user');
    }
    
    function get_one($id)
    {
        $param  =   array('user_id'=>$id);
        return $this->db->get_where('user',$param);
    }
}