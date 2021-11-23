<?php
class Persetujuan extends CI_Controller{

	function __construct() {
    	parent::__construct();
        $this->load->model('model_daftar');
    	chek_session_admin();
	}
    
    
    function index(){
        $data['record']     =   $this->model_daftar->tampilkan_data_paging();
        $this->template->load('template_back_end','persetujuan/lihat_data',$data);
    }


    function keterangan()
    {
        if(isset($_POST['submit'])){
            $NIS_NIM                =   $this->input->post('nis/nim');
            $keterangan             =   $this->input->post('keterangan');

            $data   = array('NIS_NIM'                       =>$NIS_NIM,
                            'keterangan'                    =>$keterangan,
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

            $this->template->load('template_back_end','persetujuan/form_keteranganpkl',$data);
        }

     }   

    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_daftar->delete($id);
        redirect('persetujuan/');
    }


     function tampil_laporan(){
      $query = $this->db->query("
                SELECT
                daftar.NIS_NIM,
                daftar.nama_lengkap,
                tbl_sekolah_perguruantinggi.nama_sekolah_perguruantinggi,
                tbl_jurusan.nama_jurusan,
                tbl_provinsi.nama_provinsi,
                tbl_kota.nama_kota,
                daftar.status,
                daftar.keterangan,
                pembimbing.nama_pembimbing,
                bagian.nama_bagian,
                daftar.tanggal_mulai,
                daftar.tanggal_selesai
                FROM bagian, tbl_provinsi, daftar
                LEFT JOIN pembimbing ON daftar.NIP=pembimbing.NIP 
                LEFT JOIN tbl_sekolah_perguruantinggi ON daftar.id_sekolah_perguruantinggi=tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi 
                LEFT JOIN tbl_jurusan ON daftar.id_jurusan=tbl_jurusan.id_jurusan 
                LEFT JOIN tbl_kota ON daftar.id_kota=tbl_kota.id_kota 
                WHERE tbl_kota.id_provinsi=tbl_provinsi.id_provinsi AND pembimbing.bagian_id=bagian.bagian_id 
                ORDER BY tgl_daftar ASC "); 
            $persetujuan = $query->result();
            $data = ['persetujuan'=>$persetujuan];
            $this->load->view("persetujuan/report_view",$data);     
    }



}