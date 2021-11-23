<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller{


	function __construct()
    {
    	parent::__construct();
        $this->load->model('model_daftar');   

        chek_session_admin();
	}


    function index()
    {
        $data['record']     =   $this->model_daftar->tampilkan_data_paging_lagi();

        $this->template->load('template_back_end','daftar/lihat_data',$data);
    }


    function persetujuan()
    {
        if(isset($_POST['submit'])){
            $NIS_NIM                =   $this->input->post('nis/nim');
            $status                 =   $this->input->post('pemberitahuan');
            $pembimbing             =   $this->input->post('pembimbing');
            $bagian                 =   $this->input->post('bagian');
            $user                   =   $this->session->userdata('username');
            $id_op                  =   $this->db->get_where('operator',array('username'=>$user))->row_array();


            $data   = array('NIS_NIM'                       =>$NIS_NIM,
                            'status'                        =>$status,
                            'NIP'                           =>$pembimbing, 
                            'operator_id'                   =>$id_op['operator_id']
                            );

            $this->model_daftar->edit($data,$NIS_NIM);
            redirect('persetujuan/');
        }
        else{
            $id =  $this->uri->segment(3);

            $this->load->model('model_bagian');
            $data['bagian']         =  $this->model_bagian->tampilkan_data()->result();

            $this->load->model('model_pembimbing');
            $data['pembimbing']     =  $this->model_pembimbing->tampil_data()->result();

            $data['record']         =  $this->model_daftar->get_one($id)->row_array();

            $this->template->load('template_back_end','daftar/form_persetujuan',$data);
        }

     }   


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_daftar->delete($id);
        redirect('daftar/');
    }


    function tampil_laporan(){
      $query = $this->db->query("
          SELECT 
          daftar.NIS_NIM, 
          daftar.nama_lengkap, 
          daftar.alamat, 
          daftar.jenis_kelamin, 
          daftar.agama, 
          tbl_sekolah_perguruantinggi.nama_sekolah_perguruantinggi, 
          daftar.alamat_sekolah, 
          tbl_provinsi.nama_provinsi, 
          tbl_kota.nama_kota, 
          tbl_jurusan.nama_jurusan, 
          daftar.no_hp
          FROM tbl_provinsi, daftar 
          LEFT JOIN tbl_sekolah_perguruantinggi ON daftar.id_sekolah_perguruantinggi=tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi 
          LEFT JOIN tbl_jurusan ON daftar.id_jurusan=tbl_jurusan.id_jurusan 
          LEFT JOIN tbl_kota ON daftar.id_kota=tbl_kota.id_kota 
           WHERE tbl_kota.id_provinsi=tbl_provinsi.id_provinsi 
          ORDER BY tgl_daftar ASC "); 
           $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("daftar/report_view",$data);     
    }
}