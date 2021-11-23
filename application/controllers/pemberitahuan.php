<?php
class pemberitahuan extends CI_Controller{

	function __construct() {
    	parent::__construct();
        $this->load->model('model_daftar');
        $this->load->library('ciqrcode');

    	chek_session();
	}
    
    
    function index(){
        
        $data['sekolah_otomatis']   = $this->model_daftar->tampilkan_data_sekolah_otomatis();
        $data['jurusan_otomatis']   = $this->model_daftar->tampilkan_data_jurusan_otomatis();
        $data['kota_otomatis']      = $this->model_daftar->tampilkan_data_kota_otomatis();
        $data['provinsi_otomatis']  = $this->model_daftar->tampilkan_data_provinsi_otomatis();
        
        $this->load->view('front_end/template_setelahlogin',$data);
    }
    

    function cetak_kartu()
    {
        $nisnim = $this->input->post('nisnim');
        $sql = 'SELECT
                daftar.NIS_NIM,
                daftar.nama_lengkap,
                daftar.alamat,
                tbl_sekolah_perguruantinggi.nama_sekolah_perguruantinggi,
                tbl_jurusan.nama_jurusan,
                tbl_provinsi.nama_provinsi,
                tbl_kota.nama_kota,
                daftar.status,
                pembimbing.nama_pembimbing,
                bagian.nama_bagian,
                daftar.tanggal_mulai,
                daftar.tanggal_selesai,
                daftar.surat_pengantar,
                operator.nama_lengkap_operator
                FROM bagian, tbl_provinsi,daftar 
                LEFT JOIN pembimbing ON daftar.NIP=pembimbing.NIP 
                LEFT JOIN tbl_sekolah_perguruantinggi ON daftar.id_sekolah_perguruantinggi=tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi 
                LEFT JOIN tbl_jurusan ON daftar.id_jurusan=tbl_jurusan.id_jurusan 
                LEFT JOIN operator ON daftar.operator_id=operator.operator_id
                LEFT JOIN tbl_kota ON daftar.id_kota=tbl_kota.id_kota 
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi AND daftar.NIS_NIM = "'.$nisnim.'"';

        $cetak = $this->db->query($sql)->row_array();
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


        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);

        $pdf->SetFont('Arial','B',15);
                    $pdf->Cell(1,5,'',0,1);
                    $pdf->Cell(190,10,'Form Tanda Penerimaan PRAKTEK KERJA LAPANGAN',0,1,'C');
                    $pdf->Cell(2,2,'',0,1);

        $pdf->SetFont('Arial','',14);
        $pdf->SetFontSize(10);

        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);

                    

        $pdf->Cell(39,7,'',0,0);
        $pdf->Cell(37,5,'NIS/NIM',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['NIS_NIM']),0,1);
        $pdf->Cell(39,7,'',0,0);
        $pdf->Cell(37,5,'Nama Lengkap',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['nama_lengkap']),0,1);
        $pdf->Cell(39,7,'',0,0);
        $pdf->Cell(37,5,'Alamat',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['alamat']),0,1);
        $pdf->Cell(39,7,'',0,0);
        $pdf->Cell(37,5,'Kota',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['nama_kota']),0,1);
        $pdf->Cell(39,7,'',0,0);
        $pdf->Cell(37,5,'Provinsi',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['nama_provinsi']),0,1);
        $pdf->Cell(39,7,'',0,0);
        $pdf->Cell(37,5,'Sekolah',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['nama_sekolah_perguruantinggi']),0,1);
        $pdf->Cell(39,7,'',0,0);
        $pdf->Cell(37,5,'Jurusan',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['nama_jurusan']),0,1);
        $pdf->Cell(39,7,'',0,0);
        $pdf->Cell(37,5,'Nama Pembimbing',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['nama_pembimbing']),0,1);
        $pdf->Cell(39,7,'',0,0);
        $pdf->Cell(37,5,'Bagian',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['nama_bagian']),0,1);
        $pdf->Cell(39,7,'',0,0);
        $pdf->Cell(37,5,'Tanggal Mulai',0,0);
        $pdf->Cell(37,5,' : '.  tgl_indo($cetak['tanggal_mulai']),0,1);
        $pdf->Cell(39,7,'',0,0);
        $pdf->Cell(37,5,'Tanggal Selesai',0,0);
        $pdf->Cell(37,5,' : '.  tgl_indo($cetak['tanggal_selesai']),0,1);

        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(39,7,'',0,0);
        $pdf->Cell(37,5,'Disetujui Oleh',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['nama_lengkap_operator']),0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(130,5,'',0,1);
                    $pdf->Cell(130,5,'',0,1);
                    $pdf->Cell(130,5,'',0,1);
                    $pdf->Cell(130,5,'',0,1);
                    $pdf->Cell(130,15,'',0,0);
                    $pdf->Cell(25,5,'Bandung, '.date('d M Y').'',0,1);
                    $pdf->Cell(130,5,'',0,0);
                    $pdf->Cell(20,5,'Kepala Bag.Kepegawaian dan Umum',0,1);
                    $pdf->Cell(95,10,'',0,0);
                    $pdf->Cell(25,10,'',0,1);
                    $pdf->Cell(130,20,'',0,0);
                    $pdf->Cell(25,30,'___________________',0,0);
        
        // end
        ob_end_clean();
        $pdf->Output();
    }


    function cetak_selesai()
    {
        $nisnim = $this->input->post('nisnim');
        $sql = 'SELECT
                daftar.NIS_NIM,
                daftar.nama_lengkap,
                daftar.alamat,
                tbl_sekolah_perguruantinggi.nama_sekolah_perguruantinggi,
                tbl_jurusan.nama_jurusan,
                tbl_provinsi.nama_provinsi,
                tbl_kota.nama_kota,
                daftar.status,
                pembimbing.nama_pembimbing,
                bagian.nama_bagian,
                daftar.tanggal_mulai,
                daftar.tanggal_selesai,
                daftar.surat_pengantar,
                operator.nama_lengkap_operator
                FROM bagian, tbl_provinsi,daftar 
                LEFT JOIN pembimbing ON daftar.NIP=pembimbing.NIP 
                LEFT JOIN tbl_sekolah_perguruantinggi ON daftar.id_sekolah_perguruantinggi=tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi 
                LEFT JOIN tbl_jurusan ON daftar.id_jurusan=tbl_jurusan.id_jurusan 
                LEFT JOIN operator ON daftar.operator_id=operator.operator_id
                LEFT JOIN tbl_kota ON daftar.id_kota=tbl_kota.id_kota 
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi AND daftar.NIS_NIM = "'.$nisnim.'"';

        $cetak = $this->db->query($sql)->row_array();
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


        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);

        $pdf->SetFont('Arial','B',15);
                    $pdf->Cell(1,5,'',0,1);
                    $pdf->Cell(190,10,'SURAT KETERANGAN SELESAI PKL',0,1,'C');
                    $pdf->Cell(2,2,'',0,1);

        $pdf->SetFont('Arial','',14);
        $pdf->SetFontSize(10);

        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);

                    

        $pdf->Cell(37,5,'Menerangkan bahwa mahasiswa '.  strtoupper($cetak['nama_sekolah_perguruantinggi']) .' tersebut dibawah ini :',0,1);
        $pdf->Cell(10,7,'',0,1);
         $pdf->SetFont('Arial','B',10);
        $pdf->Cell(37,5,'NIS/NIM',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['NIS_NIM']),0,1);
        $pdf->Cell(37,5,'Nama Lengkap',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['nama_lengkap']),0,1);
        $pdf->Cell(37,5,'Jurusan',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['nama_jurusan']),0,1);
        $pdf->Cell(37,5,'Sekolah',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['nama_sekolah_perguruantinggi']),0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(37,5,'Telah selesai melakukan kerja praktek pada bidang '.  $cetak['nama_bagian'],0,1);
        $pdf->Cell(37,5,'Dinas Komunikasi dan Informatika Provinsi Jawa Barat.',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(37,5,'Periode KP/KPK',0,0);
        $pdf->Cell(37,5,' : '.  tgl_indo($cetak['tanggal_mulai']).' s.d '.tgl_indo($cetak['tanggal_selesai']) ,0,1);
        $pdf->Cell(37,5,'Nama Pembimbing',0,0);
        $pdf->Cell(37,5,' : '.  strtoupper($cetak['nama_pembimbing']),0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(37,5,'Demikian Surat Keterangan ini di buat dengan sebenarnya untuk dipergunkan sebagaimana mestinya.',0,1);

        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);
        $pdf->Cell(10, 1,'','',1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(100,5,'',0,1);
                    $pdf->Cell(100,5,'',0,1);
                    $pdf->Cell(100,5,'',0,1);
                    $pdf->Cell(100,5,'',0,1);
                    $pdf->Cell(100,15,'',0,0);
                    $pdf->Cell(25,5,'Bandung, '.date('d M Y').'',0,1);
                    $pdf->Cell(100,5,'',0,0);
                    $pdf->Cell(20,5,'a.n Kepala Dinas Komunikasi dan Informatika',0,1);
                    $pdf->Cell(100,5,'',0,0);
                    $pdf->Cell(20,5,'Provinsi Jawa barat',0,1);
                    $pdf->Cell(100,5,'',0,0);
                    $pdf->Cell(20,5,'Sekretaris',0,1);
                    $pdf->Cell(95,10,'',0,0);
                    $pdf->Cell(25,10,'',0,1);
                    $pdf->Cell(100,20,'',0,0);
                    $pdf->Cell(25,30,'___________________',0,0);
        
        // end
        ob_end_clean();
        $pdf->Output();
    }

}