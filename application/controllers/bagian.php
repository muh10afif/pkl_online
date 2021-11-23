<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian extends CI_Controller{
    

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_bagian');
        $this->load->library('form_validation');
        chek_session_admin();
    }
    

    function index()
    {
        $data['record']     = $this->model_bagian->tampilkan_data_paging();
        $this->template->load('template_back_end','bagian/lihat_data',$data);
    }
    
    
    function post()
    {
        if(isset($_POST['submit'])){
            $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
            $this->form_validation->set_error_delimiters('<p class="alert">', '</p>');

            if($this->form_validation->run('post') == FALSE){
                $this->template->load('template_back_end','bagian/form_input');
            }
            else{
                header('location:'.base_url().'bagian/form_input');
                $this->session->set_flashdata("bagian","<div class='alert alert-success alert-dismissible fade in' role='alert'>
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

                 $this->model_bagian->post();
                 redirect('bagian/');
             }

        }
        else{
            $this->template->load('template_back_end','bagian/form_input');
        }
    }
    

    public function id_check($str){
        $this->load->model('model_bagian');
        if($this->model_bagian->exist_row_check('ID', $str) > 0){
            $this->form_validation->set_message('id_check', 'ID sudah digunakan, mohon diganti yang lain');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    public function namabagian_check($str){
        $this->load->model('model_bagian');
        if($this->model_bagian->exist_row_check('nama_bagian', $str) > 0){
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
            header('location:'.base_url().'bagian/form_edit');
                $this->session->set_flashdata("bagian","<div class='alert alert-info alert-dismissible fade in' role='alert'>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span>
                                        </button>

                                        <p>
                                            <strong>
                                                <i class='glyphicon glyphicon-ok'></i>&nbsp;
                                                Selamat!
                                            </strong>
                                            Data berhasil diubah
                                        </p>
                                    </div>");

            $this->model_bagian->edit();
            redirect('bagian/');
            }
       // }
        else{
            $id             =  $this->uri->segment(3);
            $data['record'] =  $this->model_bagian->get_one($id)->row_array();

            $this->template->load('template_back_end','bagian/form_edit',$data);
        }
    }

    
    
    function delete()
    {

        header('location:'.base_url().'bagian/');
                $this->session->set_flashdata("bagian",
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
        $this->model_bagian->delete($id);
        redirect('bagian/');
    }


    function bagian_pdf()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(1,6,'',0,1);
        $pdf->Cell(210,6,'PEMERINTAH PROVINSI JAWA BARAT',0,1,'C');
        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(210,6,'DINAS KOMUNIKASI DAN INFORMATIKA',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(210,6,'Jl. Taman Sari No.55 Bandung Telepon (022) 2502898 Fax-(022)2511505',0,1,'C');
        $pdf->Cell(210,6,'Email : info@jabarprov.go.id',0,1,'C');
        $pdf->Line(10,42,200,42);
        $pdf->Line(10,43,200,43);

        $pdf->Image(base_url().'uploads/logo/jabar.png',15,10,25);

        $pdf->SetFont('Arial','B',14);
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(7,7,'',0,0);
        $pdf->Cell(10, 7, 'No', 1,0,'C');
        $pdf->Cell(27, 7, 'ID', 1,0,'C');
        $pdf->Cell(140, 7, 'Nama Bagian', 1,1,'C');

        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data =  $this->model_bagian->laporan_bagian();
        $no=1;
        foreach ($data->result() as $r)
        {
            $pdf->Cell(7,7,'',0,0);
            $pdf->Cell(10, 7, $no, 1,0,'C');
            $pdf->Cell(27, 7, $r->ID, 1,0,'C');
            $pdf->Cell(140, 7, $r->nama_bagian, 1,1);
            $no++;
        }
        // end
        $pdf->Output();
    }
    
    
}