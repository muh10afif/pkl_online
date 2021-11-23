<?php
class Laporan_rekap extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_laporan');
        $this->load->model('model_daftar');
        $this->load->model('model_bagian');
        $this->load->model('model_pembimbing');
        chek_session_admin();
    }
    
    function index(){
        /*if(isset($_POST['btnSubmit'])) {
            if($this->input->post('filter_report',TRUE)=="semua"){
                $data = ['record'=>$this->model_laporan->tampilkan_data()];
                redirect(base_url('index.php/laporan/pdf_laporan_semua'),$data);
            }
        } else {*/
           $data = ['tahun'     => $this->model_daftar->tampil_cmb_tahun(),
                    'tahun2'     => $this->model_daftar->tampil_cmb_tahun(),
                    'tahun3'     => $this->model_daftar->tampil_cmb_tahun(),
                    'tahun4'     => $this->model_daftar->tampil_cmb_tahun()];
           $this->template->load('template_back_end','Laporan/lihat_data_rekap',$data);
        
    }

    function tampil_report(){
        if($this->input->post("filter_report") == "semua"){
            $query = $this->db->query("
                SELECT 
                daftar.NIS_NIM , 
                daftar.nama_lengkap, 
                daftar.sekolah_universitas, 
                daftar.provinsi, 
                daftar.kota, 
                daftar.jurusan, 
                daftar.status, 
                daftar.NIP, 
                bagian.nama_bagian, 
                daftar.tanggal_mulai, 
                daftar.tanggal_selesai 
            FROM daftar inner join bagian on daftar.bagian_id = bagian.bagian_id");

            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("persetujuan/report_view",$data);

        }elseif($this->input->post("filter_report") == "perbulan"){

            if($this->input->post("pilihan_bulan") == "status"){
                    $bulan = $this->input->post("bulan_bulan");
                    $tahun = $this->input->post("tahun_bulan");

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

                    $pdf->SetFont('Arial','B',12);
                    $pdf->Cell(1,5,'',0,1);
                    $pdf->Cell(190,10,'DAFTAR JUMLAH STATUS PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                    $pdf->SetFont('Arial','',11);
                    $pdf->Cell(190,10,'Periode Bulan '.$bulan.' Tahun '.$tahun.'',0,1,'C');
                    $pdf->Cell(2,2,'',0,1);
                    $pdf->Cell(2,2,'',0,1);

                    $pdf->SetFont('Arial','B',14);
                    $pdf->SetFontSize(10);
                    $pdf->Cell(10, 1,'','',1);
                    $pdf->Cell(39,7,'',0,0);
                    $pdf->Cell(10, 7, 'No', 1,0,'C');
                    $pdf->Cell(70, 7, 'Status', 1,0,'C');
                    $pdf->Cell(30, 7, 'Jumlah', 1,1,'C');

                    // tampilkan dari database
                    $pdf->SetFont('Arial','','L');
                    $data=  $this->model_laporan->laporan_perstatus($bulan,$tahun);
                    $no=1;
                    $total_peserta=0;
                    foreach ($data as $r)
                    {
                        $pdf->Cell(39,7,'',0,0);
                        $pdf->Cell(10, 7, $no, 1,0,'C');
                        $pdf->Cell(70, 7, $r['status'], 1,0,'C');
                        $pdf->Cell(30, 7, $r['jml_status'], 1,1,'C');
                        $no++;
                        $total_peserta=$total_peserta+$r['jml_status'];
                    }
                    $pdf->Cell(39,7,'',0,0);
                    $pdf->Cell(80, 7, 'Total', 1,0,'R');
                    $pdf->Cell(30, 7,$total_peserta, 1,1,'C');

                    $pdf->Cell(130,5,'',0,1);
                    $pdf->Cell(130,5,'',0,1);
                    $pdf->Cell(130,5,'',0,1);
                    $pdf->Cell(130,5,'',0,1);
                    $pdf->Cell(130,15,'',0,0);
                    $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                    $pdf->Cell(130,5,'',0,0);
                    $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                    $pdf->Cell(95,10,'',0,0);
                    $pdf->Cell(25,10,'',0,1);
                    $pdf->Cell(130,20,'',0,0);
                    $pdf->Cell(25,30,'___________________',0,0);
                    ob_end_clean();
                    // end
                    $pdf->Output();

            }elseif($this->input->post("pilihan_bulan") == "keterangan"){
                    $bulan = $this->input->post("bulan_bulan");
                    $tahun = $this->input->post("tahun_bulan");

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

                    $pdf->SetFont('Arial','B',12);
                    $pdf->Cell(1,5,'',0,1);
                    $pdf->Cell(190,10,'DAFTAR JUMLAH KETERANGAN PKL PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                    $pdf->SetFont('Arial','',11);
                    $pdf->Cell(190,10,'Periode Bulan '.$bulan.' Tahun '.$tahun.'',0,1,'C');
                    $pdf->Cell(2,2,'',0,1);
                    $pdf->Cell(2,2,'',0,1);

                    $pdf->SetFont('Arial','B',14);
                    $pdf->SetFontSize(10);
                    $pdf->Cell(10, 1,'','',1);
                    $pdf->Cell(39,7,'',0,0);
                    $pdf->Cell(10, 7, 'No', 1,0,'C');
                    $pdf->Cell(70, 7, 'Keterangan PKL', 1,0,'C');
                    $pdf->Cell(30, 7, 'Jumlah', 1,1,'C');

                    // tampilkan dari database
                    $pdf->SetFont('Arial','','L');
                    $data=  $this->model_laporan->laporan_perketerangan($bulan,$tahun);
                    $no=1;
                    $total_peserta=0;
                    foreach ($data as $r)
                    {
                        $pdf->Cell(39,7,'',0,0);
                        $pdf->Cell(10, 7, $no, 1,0,'C');
                        $pdf->Cell(70, 7, $r['keterangan'], 1,0,'C');
                        $pdf->Cell(30, 7, $r['jml_ket'], 1,1,'C');
                        $no++;
                        $total_peserta=$total_peserta+$r['jml_ket'];
                    }
                    $pdf->Cell(39,7,'',0,0);
                    $pdf->Cell(80, 7, 'Total', 1,0,'R');
                    $pdf->Cell(30, 7,$total_peserta, 1,1,'C');

                    $pdf->Cell(130,5,'',0,1);
                    $pdf->Cell(130,5,'',0,1);
                    $pdf->Cell(130,5,'',0,1);
                    $pdf->Cell(130,5,'',0,1);
                    $pdf->Cell(130,15,'',0,0);
                    $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                    $pdf->Cell(130,5,'',0,0);
                    $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                    $pdf->Cell(95,10,'',0,0);
                    $pdf->Cell(25,10,'',0,1);
                    $pdf->Cell(130,20,'',0,0);
                    $pdf->Cell(25,30,'___________________',0,0);
                    ob_end_clean();
                    // end
                    $pdf->Output();
                               
            }elseif($this->input->post("pilihan_bulan") == "bagian"){
                        $bulan = $this->input->post("bulan_bulan");
                        $tahun = $this->input->post("tahun_bulan");

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

                        $pdf->SetFont('Arial','B',12);
                        $pdf->Cell(1,5,'',0,1);
                        $pdf->Cell(190,10,'DAFTAR JUMLAH PER BAGIAN PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                        $pdf->SetFont('Arial','',11);
                        $pdf->Cell(190,10,'Periode Bulan '.$bulan.' Tahun '.$tahun.'',0,1,'C');
                        $pdf->Cell(2,2,'',0,1);
                        $pdf->Cell(2,2,'',0,1);

                        $pdf->SetFont('Arial','B',14);
                        $pdf->SetFontSize(10);
                        $pdf->Cell(10, 10,'','',1);
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, 'No', 1,0,'C');
                        $pdf->Cell(140, 7, 'Nama Bagian', 1,0,'C');
                        $pdf->Cell(30, 7, 'Jumlah Peserta', 1,1,'C');
                        // tampilkan dari database
                        $pdf->SetFont('Arial','','L');
                        $data=  $this->model_laporan->laporan_perbagian($bulan,$tahun);
                        $no=1;
                        $total_peserta=0;
                        foreach ($data as $r)
                        {
                            $pdf->Cell(7,7,'',0,0);
                            $pdf->Cell(10, 7, $no, 1,0,'C');
                            $pdf->Cell(140, 7, $r['nama_bagian'], 1,0);
                            $pdf->Cell(30, 7, $r['bagian'], 1,1,'C');
                            $no++;
                            $total_peserta=$total_peserta+$r['bagian'];
                        }
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(150, 7, 'Total', 1,0,'R');
                        $pdf->Cell(30, 7,$total_peserta, 1,1,'C');

                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();
                        // end
                        $pdf->Output();

                }elseif($this->input->post("pilihan_bulan") == "pembimbing"){
                        $bulan = $this->input->post("bulan_bulan");
                        $tahun = $this->input->post("tahun_bulan");

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

                        $pdf->SetFont('Arial','B',12);
                        $pdf->Cell(1,5,'',0,1);
                        $pdf->Cell(190,10,'DAFTAR JUMLAH PER PEMBIMBING PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                        $pdf->SetFont('Arial','',11);
                        $pdf->Cell(190,10,'Periode Bulan '.$bulan.' Tahun '.$tahun.'',0,1,'C');
                        $pdf->Cell(2,2,'',0,1);
                        $pdf->Cell(2,2,'',0,1);  

                        $pdf->SetFont('Arial','B',14);
                        $pdf->SetFontSize(10);
                        $pdf->Cell(10, 10,'','',1);
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, 'No', 1,0,'C');
                        $pdf->Cell(140, 7, 'Nama Pembimbing', 1,0,'C');
                        $pdf->Cell(30, 7, 'Jumlah Peserta', 1,1,'C');
                        // tampilkan dari database
                        $pdf->SetFont('Arial','','L');
                        $data=  $this->model_laporan->laporan_perpembimbing($bulan,$tahun);
                        $no=1;
                        $total_peserta=0;
                        foreach ($data as $r)
                        {
                            $pdf->Cell(7,7,'',0,0);
                            $pdf->Cell(10, 7, $no, 1,0,'C');
                            $pdf->Cell(140, 7, $r['nama_pembimbing'], 1,0);
                            $pdf->Cell(30, 7, $r['pembimbing'], 1,1,'C');
                            $no++;
                            $total_peserta=$total_peserta+$r['pembimbing'];
                        }
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(150, 7, 'Total', 1,0,'R');
                        $pdf->Cell(30, 7,$total_peserta, 1,1,'C');


                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();
                        // end
                        $pdf->Output();


            }elseif($this->input->post("pilihan_bulan") == "sekolah"){
                        $bulan = $this->input->post("bulan_bulan");
                        $tahun = $this->input->post("tahun_bulan");

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

                        $pdf->SetFont('Arial','B',12);
                        $pdf->Cell(1,5,'',0,1);
                        $pdf->Cell(190,10,'DAFTAR JUMLAH PER SEKOLAH / PERGURUAN TINGGI PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                        $pdf->SetFont('Arial','',11);
                        $pdf->Cell(190,10,'Periode Bulan '.$bulan.' Tahun '.$tahun.'',0,1,'C');
                        $pdf->Cell(2,2,'',0,1);
                        $pdf->Cell(2,2,'',0,1);
                        $pdf->SetFont('Arial','B',14);
                        $pdf->SetFontSize(10);
                        $pdf->Cell(10, 10,'','',1);
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, 'No', 1,0,'C');
                        $pdf->Cell(140, 7, 'Nama Sekolah', 1,0,'C');
                        $pdf->Cell(30, 7, 'Jumlah Peserta', 1,1,'C');
                        // tampilkan dari database
                        $pdf->SetFont('Arial','','L');
                        $data=  $this->model_laporan->laporan_persekolah($bulan,$tahun);
                        $no=1;
                        $total_peserta=0;
                        foreach ($data as $r)
                        {
                            $pdf->Cell(7,7,'',0,0);
                            $pdf->Cell(10, 7, $no, 1,0,'C');
                            $pdf->Cell(140, 7, $r['nama_sekolah_perguruantinggi'], 1,0);
                            $pdf->Cell(30, 7, $r['jumlah'], 1,1,'C');
                            $no++;
                            $total_peserta=$total_peserta+$r['jumlah'];
                        }
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(150, 7, 'Total', 1,0,'R');
                        $pdf->Cell(30, 7,$total_peserta, 1,1,'C');

                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();                        // end
                        $pdf->Output();

            }elseif($this->input->post("pilihan_bulan") == "jurusan"){
                        $bulan = $this->input->post("bulan_bulan");
                        $tahun = $this->input->post("tahun_bulan");

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

                        $pdf->SetFont('Arial','B',12);
                        $pdf->Cell(1,5,'',0,1);
                        $pdf->Cell(190,10,'DAFTAR JUMLAH PER JURUSAN PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                        $pdf->SetFont('Arial','',11);
                        $pdf->Cell(190,10,'Periode Bulan '.$bulan.' Tahun '.$tahun.'',0,1,'C');
                        $pdf->Cell(2,2,'',0,1);
                        $pdf->Cell(2,2,'',0,1);

                        $pdf->SetFont('Arial','B',14);
                        $pdf->SetFontSize(10);
                        $pdf->Cell(10, 10,'','',1);
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, 'No', 1,0,'C');
                        $pdf->Cell(140, 7, 'Nama Jurusan', 1,0,'C');
                        $pdf->Cell(30, 7, 'Jumlah Peserta', 1,1,'C');
                        // tampilkan dari database
                        $pdf->SetFont('Arial','','L');
                        $data=  $this->model_laporan->laporan_perjurusan($bulan,$tahun);
                        $no=1;
                        $total_peserta=0;
                        foreach ($data as $r)
                        {
                            $pdf->Cell(7,7,'',0,0);
                            $pdf->Cell(10, 7, $no, 1,0,'C');
                            $pdf->Cell(140, 7, $r['nama_jurusan'], 1,0);
                            $pdf->Cell(30, 7, $r['jumlah'], 1,1,'C');
                            $no++;
                            $total_peserta=$total_peserta+$r['jumlah'];
                        }
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(150, 7, 'Total', 1,0,'R');
                        $pdf->Cell(30, 7,$total_peserta, 1,1,'C');


                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();
                        // end
                        $pdf->Output();
                
            }elseif($this->input->post("pilihan_bulan") == "kota"){
                        $bulan = $this->input->post("bulan_bulan");
                        $tahun = $this->input->post("tahun_bulan");

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

                        $pdf->SetFont('Arial','B',12);
                        $pdf->Cell(1,5,'',0,1);
                        $pdf->Cell(190,10,'DAFTAR JUMLAH PER KOTA PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                        $pdf->SetFont('Arial','',11);
                        $pdf->Cell(190,10,'Periode Bulan '.$bulan.' Tahun '.$tahun.'',0,1,'C');
                        $pdf->Cell(2,2,'',0,1);
                        $pdf->Cell(2,2,'',0,1);

                        $pdf->SetFont('Arial','B',14);
                        $pdf->SetFontSize(10);
                        $pdf->Cell(10, 10,'','',1);
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, 'No', 1,0,'C');
                        $pdf->Cell(140, 7, 'Nama Kota', 1,0,'C');
                        $pdf->Cell(30, 7, 'Jumlah Peserta', 1,1,'C');
                        // tampilkan dari database
                        $pdf->SetFont('Arial','','L');
                        $data=  $this->model_laporan->laporan_perkota($bulan,$tahun);
                        $no=1;
                        $total_peserta=0;
                        foreach ($data as $r)
                        {
                            $pdf->Cell(7,7,'',0,0);
                            $pdf->Cell(10, 7, $no, 1,0,'C');
                            $pdf->Cell(140, 7, $r['nama_kota'], 1,0);
                            $pdf->Cell(30, 7, $r['jumlah'], 1,1,'C');
                            $no++;
                            $total_peserta=$total_peserta+$r['jumlah'];
                        }
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(150, 7, 'Total', 1,0,'R');
                        $pdf->Cell(30, 7,$total_peserta, 1,1,'C');

                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();
                        // end
                        $pdf->Output();
        
            }elseif($this->input->post("pilihan_bulan") == "provinsi"){
                        $bulan = $this->input->post("bulan_bulan");
                        $tahun = $this->input->post("tahun_bulan");

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

                        $pdf->SetFont('Arial','B',12);
                        $pdf->Cell(1,5,'',0,1);
                        $pdf->Cell(190,10,'DAFTAR JUMLAH PER PROVINSI PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                        $pdf->SetFont('Arial','',11);
                        $pdf->Cell(190,10,'Periode Bulan '.$bulan.' Tahun '.$tahun.'',0,1,'C');
                        $pdf->Cell(2,2,'',0,1);
                        $pdf->Cell(2,2,'',0,1);

                        $pdf->SetFont('Arial','B',14);
                        $pdf->SetFontSize(10);
                        $pdf->Cell(10, 10,'','',1);
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, 'No', 1,0,'C');
                        $pdf->Cell(140, 7, 'Nama Provinsi', 1,0,'C');
                        $pdf->Cell(30, 7, 'Jumlah Peserta', 1,1,'C');
                        // tampilkan dari database
                        $pdf->SetFont('Arial','','L');
                        $data=  $this->model_laporan->laporan_perprovinsi($bulan,$tahun);
                        $no=1;
                        $total_peserta=0;
                        foreach ($data as $r)
                        {
                            $pdf->Cell(7,7,'',0,0);
                            $pdf->Cell(10, 7, $no, 1,0,'C');
                            $pdf->Cell(140, 7, $r['nama_provinsi'], 1,0);
                            $pdf->Cell(30, 7, $r['jumlah'], 1,1,'C');
                            $no++;
                            $total_peserta=$total_peserta+$r['jumlah'];
                        }
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(150, 7, 'Total', 1,0,'R');
                        $pdf->Cell(30, 7,$total_peserta, 1,1,'C');

                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();
                        // end
                        $pdf->Output();

            }else{

            }
            /*
            $query = $this->db->query("SELECT daftar.NIS_NIM , daftar.nama_lengkap, daftar. sekolah_universitas, daftar. provinsi, daftar.kota, daftar.jurusan, daftar.status, daftar.NIP, bagian.nama_bagian, daftar.tanggal_mulai, daftar.tanggal_selesai FROM daftar inner join bagian on daftar.bagian_id = bagian.bagian_id where substring(tanggal_mulai,1,7) = '".$this->input->post("tahun_perbulan")."-".$this->input->post("bulan")."'");
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("persetujuan/report_view",$data);
            */
            
        }elseif($this->input->post("filter_report") == "pertahun"){
            
            if($this->input->post("pilihan_tahun") == "status"){
                    $tahun = $this->input->post("tahun_tahun");

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
                        
                    $pdf->SetFont('Arial','B',12);
                    $pdf->Cell(1,5,'',0,1);
                    $pdf->Cell(190,10,'DAFTAR JUMLAH PER STATUS PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                    $pdf->SetFont('Arial','',11);
                    $pdf->Cell(190,10,'Periode Tahun '.$tahun.'',0,1,'C');
                    $pdf->Cell(2,2,'',0,1);
                    $pdf->Cell(2,2,'',0,1);                    

                    $pdf->SetFont('Arial','B',14);
                    $pdf->SetFontSize(10);
                    $pdf->Cell(10, 10,'','',1);
                    $pdf->Cell(7,7,'',0,0);
                    $pdf->Cell(10, 7, 'No', 1,0,'C');
                    $pdf->Cell(140, 7, 'Status', 1,0,'C');
                    $pdf->Cell(30, 7, 'Jumlah', 1,1,'C');
                    // tampilkan dari database
                    $pdf->SetFont('Arial','','L');
                    $data=  $this->model_laporan->laporan_perstatus_tahun($tahun);
                    $no=1;
                    $total_peserta=0;
                    foreach ($data as $r)
                    {
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, $no, 1,0,'C');
                        $pdf->Cell(140, 7, $r['status'], 1,0);
                        $pdf->Cell(30, 7, $r['jml_status'], 1,1,'C');
                        $no++;
                        $total_peserta=$total_peserta+$r['jml_status'];
                    }
                    $pdf->Cell(7,7,'',0,0);
                    $pdf->Cell(150, 7, 'Total', 1,0,'R');
                    $pdf->Cell(30, 7,$total_peserta, 1,1,'C');

                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();

                    // end
                    $pdf->Output();

            }elseif($this->input->post("pilihan_tahun") == "keterangan"){
                    $tahun = $this->input->post("tahun_tahun");

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
                        
                    $pdf->SetFont('Arial','B',12);
                    $pdf->Cell(1,5,'',0,1);
                    $pdf->Cell(190,10,'DAFTAR JUMLAH PER KETERANGAN PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                    $pdf->SetFont('Arial','',11);
                    $pdf->Cell(190,10,'Periode Tahun '.$tahun.'',0,1,'C');
                    $pdf->Cell(2,2,'',0,1);
                    $pdf->Cell(2,2,'',0,1);                    

                    $pdf->SetFont('Arial','B',14);
                    $pdf->SetFontSize(10);
                    $pdf->Cell(10, 10,'','',1);
                    $pdf->Cell(7,7,'',0,0);
                    $pdf->Cell(10, 7, 'No', 1,0,'C');
                    $pdf->Cell(140, 7, 'Keterangan PKL', 1,0,'C');
                    $pdf->Cell(30, 7, 'Jumlah', 1,1,'C');
                    // tampilkan dari database
                    $pdf->SetFont('Arial','','L');
                    $data=  $this->model_laporan->laporan_perketerangan_tahun($tahun);
                    $no=1;
                    $total_peserta=0;
                    foreach ($data as $r)
                    {
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, $no, 1,0,'C');
                        $pdf->Cell(140, 7, $r['keterangan'], 1,0);
                        $pdf->Cell(30, 7, $r['jml_ket'], 1,1,'C');
                        $no++;
                        $total_peserta=$total_peserta+$r['jml_ket'];
                    }
                    $pdf->Cell(7,7,'',0,0);
                    $pdf->Cell(150, 7, 'Total', 1,0,'R');
                    $pdf->Cell(30, 7,$total_peserta, 1,1,'C');

                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();

                    // end
                    $pdf->Output();
                               
            }elseif($this->input->post("pilihan_tahun") == "bagian"){
                        $tahun = $this->input->post("tahun_tahun");

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

                        $pdf->SetFont('Arial','B',12);
                        $pdf->Cell(1,5,'',0,1);
                        $pdf->Cell(190,10,'DAFTAR JUMLAH PER BAGIAN PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                        $pdf->SetFont('Arial','',11);
                        $pdf->Cell(190,10,'Periode Tahun '.$tahun.'',0,1,'C');
                        $pdf->Cell(2,2,'',0,1);
                        $pdf->Cell(2,2,'',0,1);  

                        $pdf->SetFont('Arial','B',14);
                        $pdf->SetFontSize(10);
                        $pdf->Cell(10, 10,'','',1);
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, 'No', 1,0,'C');
                        $pdf->Cell(140, 7, 'Nama Bagian', 1,0,'C');
                        $pdf->Cell(30, 7, 'Jumlah Peserta', 1,1,'C');
                        // tampilkan dari database
                        $pdf->SetFont('Arial','','L');
                        $data=  $this->model_laporan->laporan_perbagian_tahun($tahun);
                        $no=1;
                        $total_peserta=0;
                        foreach ($data as $r)
                        {
                            $pdf->Cell(7,7,'',0,0);
                            $pdf->Cell(10, 7, $no, 1,0,'C');
                            $pdf->Cell(140, 7, $r['nama_bagian'], 1,0);
                            $pdf->Cell(30, 7, $r['bagian'], 1,1,'C');
                            $no++;
                            $total_peserta=$total_peserta+$r['bagian'];
                        }
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(150, 7, 'Total', 1,0,'R');
                        $pdf->Cell(30, 7,$total_peserta, 1,1,'C');


                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();
                        // end
                        $pdf->Output();

            }elseif($this->input->post("pilihan_tahun") == "pembimbing"){
                        $tahun = $this->input->post("tahun_tahun");

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

                        $pdf->SetFont('Arial','B',12);
                        $pdf->Cell(1,5,'',0,1);
                        $pdf->Cell(190,10,'DAFTAR JUMLAH PER PEMBIBING PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                        $pdf->SetFont('Arial','',11);
                        $pdf->Cell(190,10,'Periode Tahun '.$tahun.'',0,1,'C');
                        $pdf->Cell(2,2,'',0,1);
                        $pdf->Cell(2,2,'',0,1);  

                        $pdf->SetFont('Arial','B',14);
                        $pdf->SetFontSize(10);
                        $pdf->Cell(10, 10,'','',1);
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, 'No', 1,0,'C');
                        $pdf->Cell(140, 7, 'Nama Pembimbing', 1,0,'C');
                        $pdf->Cell(30, 7, 'Jumlah Peserta', 1,1,'C');
                        // tampilkan dari database
                        $pdf->SetFont('Arial','','L');
                        $data=  $this->model_laporan->laporan_perpembimbing_tahun($tahun);
                        $no=1;
                        $total_peserta=0;
                        foreach ($data as $r)
                        {
                            $pdf->Cell(7,7,'',0,0);
                            $pdf->Cell(10, 7, $no, 1,0,'C');
                            $pdf->Cell(140, 7, $r['nama_pembimbing'], 1,0);
                            $pdf->Cell(30, 7, $r['pembimbing'], 1,1,'C');
                            $no++;
                            $total_peserta=$total_peserta+$r['pembimbing'];
                        }
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(150, 7, 'Total', 1,0,'R');
                        $pdf->Cell(30, 7,$total_peserta, 1,1,'C');


                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();
                        // end
                        $pdf->Output();

            }elseif($this->input->post("pilihan_tahun") == "sekolah"){
                        $tahun = $this->input->post("tahun_tahun");

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

                        $pdf->SetFont('Arial','B',12);
                        $pdf->Cell(1,5,'',0,1);
                        $pdf->Cell(190,10,'DAFTAR JUMLAH PER SEKOLAH / PERGURUAN TINGGI PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                        $pdf->SetFont('Arial','',11);
                        $pdf->Cell(190,10,'Periode Tahun '.$tahun.'',0,1,'C');
                        $pdf->Cell(2,2,'',0,1);
                        $pdf->Cell(2,2,'',0,1);  

                        $pdf->SetFont('Arial','B',14);
                        $pdf->SetFontSize(10);
                        $pdf->Cell(10, 10,'','',1);
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, 'No', 1,0,'C');
                        $pdf->Cell(140, 7, 'Nama Sekolah', 1,0,'C');
                        $pdf->Cell(30, 7, 'Jumlah Peserta', 1,1,'C');
                        // tampilkan dari database
                        $pdf->SetFont('Arial','','L');
                        $data=  $this->model_laporan->laporan_persekolah_tahun($tahun);
                        $no=1;
                        $total_peserta=0;
                        foreach ($data as $r)
                        {
                            $pdf->Cell(7,7,'',0,0);
                            $pdf->Cell(10, 7, $no, 1,0,'C');
                            $pdf->Cell(140, 7, $r['nama_sekolah_perguruantinggi'], 1,0);
                            $pdf->Cell(30, 7, $r['jumlah'], 1,1,'C');
                            $no++;
                            $total_peserta=$total_peserta+$r['jumlah'];
                        }
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(150, 7, 'Total', 1,0,'R');
                        $pdf->Cell(30, 7,$total_peserta, 1,1,'C');
                        
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();
                        // end
                        $pdf->Output();

            }elseif($this->input->post("pilihan_tahun") == "jurusan"){
                        $tahun = $this->input->post("tahun_tahun");

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

                        $pdf->SetFont('Arial','B',12);
                        $pdf->Cell(1,5,'',0,1);
                        $pdf->Cell(190,10,'DAFTAR JUMLAH PER JURUSAN PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                        $pdf->SetFont('Arial','',11);
                        $pdf->Cell(190,10,'Periode Tahun '.$tahun.'',0,1,'C');
                        $pdf->Cell(2,2,'',0,1);
                        $pdf->Cell(2,2,'',0,1);  

                        $pdf->SetFont('Arial','B',14);
                        $pdf->SetFontSize(10);
                        $pdf->Cell(10, 10,'','',1);
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, 'No', 1,0,'C');
                        $pdf->Cell(140, 7, 'Nama Jurusan', 1,0,'C');
                        $pdf->Cell(30, 7, 'Jumlah Peserta', 1,1,'C');
                        // tampilkan dari database
                        $pdf->SetFont('Arial','','L');
                        $data=  $this->model_laporan->laporan_perjurusan_tahun($tahun);
                        $no=1;
                        $total_peserta=0;
                        foreach ($data as $r)
                        {
                            $pdf->Cell(7,7,'',0,0);
                            $pdf->Cell(10, 7, $no, 1,0,'C');
                            $pdf->Cell(140, 7, $r['nama_jurusan'], 1,0);
                            $pdf->Cell(30, 7, $r['jumlah'], 1,1,'C');
                            $no++;
                            $total_peserta=$total_peserta+$r['jumlah'];
                        }
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(150, 7, 'Total', 1,0,'R');
                        $pdf->Cell(30, 7,$total_peserta, 1,1,'C');
                        
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();
                        // end
                        $pdf->Output();
                
            }elseif($this->input->post("pilihan_tahun") == "kota"){
                        $tahun = $this->input->post("tahun_tahun");

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

                        $pdf->SetFont('Arial','B',12);
                        $pdf->Cell(1,5,'',0,1);
                        $pdf->Cell(190,10,'DAFTAR JUMLAH PER KOTA PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                        $pdf->SetFont('Arial','',11);
                        $pdf->Cell(190,10,'Periode Tahun '.$tahun.'',0,1,'C');
                        $pdf->Cell(2,2,'',0,1);
                        $pdf->Cell(2,2,'',0,1);  

                        $pdf->SetFont('Arial','B',14);
                        $pdf->SetFontSize(10);
                        $pdf->Cell(10, 10,'','',1);
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, 'No', 1,0,'C');
                        $pdf->Cell(140, 7, 'Nama Kota', 1,0,'C');
                        $pdf->Cell(30, 7, 'Jumlah Peserta', 1,1,'C');
                        // tampilkan dari database
                        $pdf->SetFont('Arial','','L');
                        $data=  $this->model_laporan->laporan_perkota_tahun($tahun);
                        $no=1;
                        $total_peserta=0;
                        foreach ($data as $r)
                        {
                            $pdf->Cell(7,7,'',0,0);
                            $pdf->Cell(10, 7, $no, 1,0,'C');
                            $pdf->Cell(140, 7, $r['nama_kota'], 1,0);
                            $pdf->Cell(30, 7, $r['jumlah'], 1,1,'C');
                            $no++;
                            $total_peserta=$total_peserta+$r['jumlah'];
                        }
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(150, 7, 'Total', 1,0,'R');
                        $pdf->Cell(30, 7,$total_peserta, 1,1,'C');
                        
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();
                        // end
                        $pdf->Output();
        
            }elseif($this->input->post("pilihan_tahun") == "provinsi"){
                        $tahun = $this->input->post("tahun_tahun");

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

                        $pdf->SetFont('Arial','B',12);
                        $pdf->Cell(1,5,'',0,1);
                        $pdf->Cell(190,10,'DAFTAR JUMLAH PER PROVINSI PADA PENERIMAAN PRAKTEK KERJA LAPANGAN',0,1,'C');
                        $pdf->SetFont('Arial','',11);
                        $pdf->Cell(190,10,'Periode Tahun '.$tahun.'',0,1,'C');
                        $pdf->Cell(2,2,'',0,1);
                        $pdf->Cell(2,2,'',0,1);  

                        $pdf->SetFont('Arial','B',14);
                        $pdf->SetFontSize(10);
                        $pdf->Cell(10, 10,'','',1);
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(10, 7, 'No', 1,0,'C');
                        $pdf->Cell(140, 7, 'Nama Provinsi', 1,0,'C');
                        $pdf->Cell(30, 7, 'Jumlah Peserta', 1,1,'C');
                        // tampilkan dari database
                        $pdf->SetFont('Arial','','L');
                        $data=  $this->model_laporan->laporan_perprovinsi_tahun($tahun);
                        $no=1;
                        $total_peserta=0;
                        foreach ($data as $r)
                        {
                            $pdf->Cell(7,7,'',0,0);
                            $pdf->Cell(10, 7, $no, 1,0,'C');
                            $pdf->Cell(140, 7, $r['nama_provinsi'], 1,0);
                            $pdf->Cell(30, 7, $r['jumlah'], 1,1,'C');
                            $no++;
                            $total_peserta=$total_peserta+$r['jumlah'];
                        }
                        $pdf->Cell(7,7,'',0,0);
                        $pdf->Cell(150, 7, 'Total', 1,0,'R');
                        $pdf->Cell(30, 7,$total_peserta, 1,1,'C');
                        
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,5,'',0,1);
                        $pdf->Cell(130,15,'',0,0);
                        $pdf->Cell(25,5,'Bandung, '.date('d-M-Y').'',0,1);
                        $pdf->Cell(130,5,'',0,0);
                        $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                        $pdf->Cell(95,10,'',0,0);
                        $pdf->Cell(25,10,'',0,1);
                        $pdf->Cell(130,20,'',0,0);
                        $pdf->Cell(25,30,'___________________',0,0);
                        ob_end_clean();
                        // end
                        $pdf->Output();

            }else{
        }
        }elseif($this->input->post("filter_report") == "cari_pertahun"){
            $cari = $this->input->post("cari_tahun");
            $tahun = $this->input->post("tahun_tahun_cari");

            $query = $this->db->query("SELECT daftar.NIS_NIM , daftar.nama_lengkap, daftar.sekolah_universitas, daftar.jurusan, daftar.status, bagian.nama_bagian, daftar.tanggal_mulai, daftar.tanggal_selesai FROM daftar LEFT JOIN bagian ON daftar.bagian_id = bagian.bagian_id WHERE CONCAT(daftar.NIS_NIM, ' ',daftar.nama_lengkap, ' ',daftar.sekolah_universitas, ' ',daftar.jurusan, ' ',daftar.status, ' ',bagian.nama_bagian) LIKE '%$cari%' AND substring(tanggal_mulai,1,4) = '".$tahun."'");

            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("persetujuan/report_view",$data);

        }elseif($this->input->post("filter_report") == "cari_perbulan"){
            $cari = $this->input->post("cari_bulan");
            $tahun = $this->input->post("tahun_bulan_cari");

            $query = $this->db->query("SELECT daftar.NIS_NIM , daftar.nama_lengkap, daftar.sekolah_universitas, daftar.jurusan, daftar.status, bagian.nama_bagian, daftar.tanggal_mulai, daftar.tanggal_selesai FROM daftar LEFT JOIN bagian ON daftar.bagian_id = bagian.bagian_id WHERE CONCAT(daftar.NIS_NIM, ' ',daftar.nama_lengkap, ' ',daftar.sekolah_universitas, ' ',daftar.jurusan, ' ',daftar.status, ' ',bagian.nama_bagian) LIKE '%$cari%' AND substring(tanggal_mulai,1,7) = '".$tahun."-".$bulan."'");

            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("persetujuan/report_view",$data);
        }

        else{
            echo "Maaf data belum anda pilih";
        }
    }
}