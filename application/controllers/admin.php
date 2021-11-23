<?php
class Admin extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_admin');
    }
    

    function login()
    {
        if(isset($_POST['submit1'])){
            # proses login disini
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
            
            $hasil=  $this->model_admin->login($username,$password);
            if($hasil==1)
            {
                # update last login
                $this->db->where('username',$username);
                $this->db->update('operator',array('last_login'=>date('Y-m-d')));
                $this->session->set_userdata(array('status_login_admin'=>'admin_oke','username'=>$username));
                redirect('dashboard_admin');
            }
            else{
                redirect('admin/login');
            }
        }
        else{
             chek_session_login();
            $this->load->view('template_login_admin');
        }
    }
    
        
    function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
  
}