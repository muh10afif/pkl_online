<?php
class Dashboard_admin extends CI_Controller{
    
    
    function index(){
        chek_session_admin();
        $this->template->load('template_back_end','view_dashboard_admin');
    }
}