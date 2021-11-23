<?php
class Webpkl extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_user');
        $this->load->model('model_bagian');
        $this->load->model('model_daftar');
        $this->load->library('form_validation');
    }

    function index()
    {
        if(isset($_POST['submit'])){
            $nisnim     =   $this->input->post('nisnim');
            $password   =   $this->input->post('password');
            $hasil=  $this->model_user->login($nisnim,$password);
            if($hasil==1)
            {
                $this->db->where('NIS_NIM',$nisnim);
                $this->session->set_userdata(array('status_login'=>'oke','NIS_NIM'=>$nisnim));
                redirect('pemberitahuan#pemberitahuan');
            }
            else{
                redirect('webpkl');
            }
        }
        else{
            $data['record']     =   $this->model_daftar->tampilkan_data_paging();
            $this->load->view('front_end/template_home',$data);
        }
    }
    

    function registrasi()
    {
        if(isset($_POST['submit'])){
            // Proses Registrasi
            $email         =   $this->input->post('email');
            $nisnim        =   $this->input->post('nisnim');
            $password      =   $this->input->post('password');
            $data          =    array(
                                        'email'     =>$email,
                                        'NIS_NIM'   =>$nisnim,
                                        'password'  =>md5($password) );
            $this->model_user->registrasi($data);
            $this->session->set_userdata(array('status_login'=>'oke','NIS_NIM'=>$nisnim));
            redirect('pemberitahuan#pengajuan');
        }
        else{
            $this->load->model('model_user');
            $this->load->view('front_end/template_home');
        }
    }   

    function post()
    {
        if(isset($_POST['submit'])){
            $this->model_daftar->post();
            redirect('pemberitahuan#pemberitahuan');
        }
        else{
            $data['daftar']=$this->model_daftar->tampilkan_data();
            $this->load->view('front_end/template_setelahlogin',$data);
        }
    }


    function logout()
    {
        $this->session->sess_destroy();
        redirect('webpkl');
    }
  
}