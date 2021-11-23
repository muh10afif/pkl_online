<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_laporan');
        $this->load->model('model_daftar');
        $this->load->model('model_bagian');
        $this->load->model('model_pembimbing');
        chek_session_admin();
    }
    
    function index(){
           $data = ['institusi' => $this->model_daftar->tampil_cmb_institusi(),
                    'institusi1' => $this->model_daftar->tampil_cmb_institusi1(),
                    'jurusan'   => $this->model_daftar->tampil_cmb_jurusan(),
                    'jurusan1'   => $this->model_daftar->tampil_cmb_jurusan1(),
                    'bagian'    => $this->model_bagian->tampil_cmb_bagian(),
                    'pembimbing'=> $this->model_pembimbing->tampil_cmb_pembimbing(),
                    'status'    => $this->model_daftar->tampil_cmb_status(),
                    'keterangan'    => $this->model_daftar->tampil_cmb_keterangan(),
                    'provinsi'  => $this->model_daftar->tampil_cmb_provinsi(),
                    'kota'      => $this->model_daftar->tampil_cmb_kota(),
                    'tahun'     => $this->model_daftar->tampil_cmb_tahun(),
                    'tahun2'    => $this->model_daftar->tampil_cmb_tahun() ];
           $this->template->load('template_back_end','Laporan/lihat_data',$data) ;
    }

    public function tampil_report(){
        $this->model_laporan->tampil_report();
    }
    

}