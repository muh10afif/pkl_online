<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
        'post' => array(
                array(
                        'field' => 'ID',
                        'label' => 'ID',
                        'rules' => 'required|callback_id_check'
                ),
                array(
                        'field' => 'bagian',
                        'label' => 'Nama Bagian',
                        'rules' => 'required|callback_namabagian_check'
                )
        ),
        'post_pembimbing' => array(
                array(
                        'field' => 'NIP',
                        'label' => 'NIP',
                        'rules' => 'required|callback_nip_check'
                ),
                array(
                        'field' => 'nama_pembimbing',
                        'label' => 'Nama Pembimbing',
                        'rules' => 'required|callback_namapembimbing_check'
                )
        ),
        'login' => array(
                array(
                        'field' => 'username',
                        'label' => 'USERNAME',
                        'rules' => 'required|callback_id_check'
                ),
                array(
                        'field' => 'password',
                        'label' => 'PASSWORD',
                        'rules' => 'required|callback_namabagian_check'
                )
        )
        
);

/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */