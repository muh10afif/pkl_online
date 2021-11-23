<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembimbing extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_pembimbing');
        $this->load->library('form_validation');
        chek_session_admin();
    }


    function index()
    {
        $data['record']     = $this->model_pembimbing->tampil_data_paging();
        $this->template->load('template_back_end','pembimbing/lihat_data',$data);

    }
    
    function post()
    {
        if(isset($_POST['submit'])){

            $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
            $this->form_validation->set_error_delimiters('<p class="alert">', '</p>');

            if($this->form_validation->run('post_pembimbing') == FALSE){
                $this->load->model('model_bagian');
                $data['bagian']=  $this->model_bagian->tampilkan_data()->result();
                $this->template->load('template_back_end','pembimbing/form_input',$data);
            }
            else{
                 // proses pembimbing
                $NIP        =   $this->input->post('NIP');
                $bagian     =   $this->input->post('bagian');
                $nama       =   $this->input->post('nama_pembimbing');

                $data       = array('NIP'=>$NIP,
                                'bagian_id'=>$bagian,
                                'nama_pembimbing'=>$nama );

                header('location:'.base_url().'pembimbing/form_input');
                $this->session->set_flashdata("pembimbing","<div class='alert alert-success alert-dismissible fade in' role='alert'>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span>
                                        </button>

                                        <p>
                                            <strong>
                                                <i class='glyphicon glyphicon-ok'></i>&nbsp;
                                                Selamat!
                                            </strong>
                                            Data berhasil ditambahkan
                                        </p>
                                    </div>");

                $this->model_pembimbing->post($data);
                redirect('pembimbing/');
             }
        }
        else{
            $this->load->model('model_bagian');
            $data['bagian']=  $this->model_bagian->tampilkan_data()->result();
            $this->template->load('template_back_end','pembimbing/form_input',$data);
        }
    }


    public function nip_check($str){
        $this->load->model('model_pembimbing');
        if($this->model_pembimbing->exist_row_check('NIP', $str) > 0){
            $this->form_validation->set_message('nip_check', 'ID sudah digunakan, mohon diganti yang lain');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    public function namapembimbing_check($str){
        $this->load->model('model_pembimbing');
        if($this->model_pembimbing->exist_row_check('nama_pembimbing', $str) > 0){
            $this->form_validation->set_message('namapembimbing_check', 'Nama pembimbing sudah digunakan, mohon diganti yang lain');
            return FALSE;
        }
        else{
            return TRUE;
        }
    } 


    public function namabagian_check($str){
        $this->load->model('model_pembimbing');
        if($this->model_pembimbing->exist_row_check('bagian_id', $str) > 0){
            $this->form_validation->set_message('namabagian_check', 'Nama bagian sudah digunakan, mohon diganti yang lain');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }   
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses pembimbing
            $NIP        =   $this->input->post('NIP');
            $bagian     =   $this->input->post('bagian');
            $nama       =   $this->input->post('nama_pembimbing');

            $data       = array('NIP'=>$NIP,
                                'nama_pembimbing'=>$nama, 
                                'bagian_id'=>$bagian);

            header('location:'.base_url().'pembimbing/form_edit');
                $this->session->set_flashdata("pembimbing",
                    "<div class='alert alert-info alert-dismissible fade in' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
                            <i class='glyphicon glyphicon-remove'></i></span>
                        </button>
                            <p>
                                <strong><i class='glyphicon glyphicon-ok'></i>&nbsp;
                                        Selamat!
                                </strong>
                                        Data berhasil diubah
                            </p>
                    </div>");

            $this->model_pembimbing->edit($data,$NIP);
            redirect('pembimbing/');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_bagian');
            $data['bagian']     =  $this->model_bagian->tampilkan_data()->result();
            $data['record']     =  $this->model_pembimbing->get_one($id)->row_array();
            $this->template->load('template_back_end','pembimbing/form_edit',$data);
        }
    }
    
    
    function delete()
    {

        header('location:'.base_url().'pembimbing/');
                $this->session->set_flashdata("pembimbing",
                    "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
                            <i class='glyphicon glyphicon-remove'></i></span>
                        </button>
                            <p>
                                <strong><i class='glyphicon glyphicon-ok'></i>&nbsp;
                                        Selamat!
                                </strong>
                                        Data berhasil dihapus
                            </p>
                    </div>");

        $id=  $this->uri->segment(3);
        $this->model_pembimbing->delete($id);
        redirect('pembimbing/');
    }

    function pembimbing_pdf()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('L','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(1,6,'',0,1);
        $pdf->Cell(295,6,'PEMERINTAH PROVINSI JAWA BARAT',0,1,'C');
        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(295,6,'DINAS KOMUNIKASI DAN INFORMATIKA',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(295,6,'Jl. Taman Sari No.55 Bandung Telepon (022) 2502898 Fax-(022)2511505',0,1,'C');
        $pdf->Cell(295,6,'Email : info@jabarprov.go.id',0,1,'C');
        $pdf->Line(10,42,285,42);
        $pdf->Line(10,43,285,43);

        $pdf->Image(base_url().'uploads/logo/jabar.png',15,10,25);

        $pdf->SetFont('Arial','B',14);
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(15,7,'',0,0);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(50, 7, 'NIP', 1,0,'C');
        $pdf->Cell(90, 7, 'Nama Pembimbing', 1,0,'C');
        $pdf->Cell(100, 7, 'Nama Bagian', 1,1,'C');
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=  $this->model_pembimbing->laporan_pembimbing();
        $no=1;
        foreach ($data->result() as $r)
        {
            $pdf->Cell(15,7,'',0,0);
            $pdf->Cell(10, 7, $no, 1,0,'C');
            $pdf->Cell(50, 7, $r->NIP, 1,0,'C');
            $pdf->Cell(90, 7, $r->nama_pembimbing, 1,0);
            $pdf->Cell(100, 7, $r->nama_bagian, 1,1);
            $no++;
        }
        // end
        $pdf->Output();
    }
}