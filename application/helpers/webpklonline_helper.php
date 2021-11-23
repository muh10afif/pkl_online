<?php

function chek_session()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('status_login');
    if($session!='oke')
    {
        redirect('webpkl');
    }
}

function chek_session_admin()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('status_login_admin');
    if($session!='admin_oke')
    {
        redirect('admin/login');
    }
}


function chek_session_login()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('status_login');
    if($session=='login_oke')
    {
        redirect('dashboard');
    }
}
?>
