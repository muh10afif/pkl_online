<?php
    class model_laporan extends CI_Model{


    function tampilkan_data(){
        return $this->db->get('daftar');
    }


    function tampilkan_data_bagian(){
        return $this->db->get('bagian');
    }
    

    function tampilkan_data_paging($halaman,$batas)
    {
        return $this->db->query("select * from daftar limit $halaman,$batas");
    }


    function tampil_report(){
        if($this->input->post("filter_report") == "semua"){
            $query = $this->db->query("SELECT
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
           WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi
          ORDER BY tanggal_mulai DESC");
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("laporan/report_view",$data);

        }elseif($this->input->post("filter_report") == "instansi"){
            $query = $this->db->query("SELECT
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
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi  AND daftar.id_sekolah_perguruantinggi = '".$this->input->post("instansi")."' AND daftar.id_jurusan = '".$this->input->post("jurusan")."'");
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("laporan/report_view",$data);

        }elseif($this->input->post("filter_report") == "instansi1"){
            $query = $this->db->query("SELECT
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
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi  AND daftar.id_sekolah_perguruantinggi = '".$this->input->post("instansi1")."'");
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("laporan/report_view",$data);

        }elseif($this->input->post("filter_report") == "jurusan1"){
            $query = $this->db->query("SELECT
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
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi  AND
                tbl_jurusan.id_jurusan = '".$this->input->post("jurusan1")."'");
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("laporan/report_view",$data);

        }elseif($this->input->post("filter_report") == "bagian"){
            $query = $this->db->query("SELECT
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
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi  AND bagian.bagian_id = ".$this->input->post("bagian"));
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("laporan/report_view",$data);

        }elseif($this->input->post("filter_report") == "pembimbing"){
            $query = $this->db->query("SELECT 
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
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi AND pembimbing.nama_pembimbing = '".$this->input->post("pembimbing")."'");
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("laporan/report_view",$data);

        }elseif($this->input->post("filter_report") == "status"){
            $query = $this->db->query("SELECT 
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
          FROM  bagian, tbl_provinsi, daftar
          LEFT JOIN pembimbing ON daftar.NIP=pembimbing.NIP 
          LEFT JOIN tbl_sekolah_perguruantinggi ON daftar.id_sekolah_perguruantinggi=tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi 
          LEFT JOIN tbl_jurusan ON daftar.id_jurusan=tbl_jurusan.id_jurusan 
          LEFT JOIN tbl_kota ON daftar.id_kota=tbl_kota.id_kota 
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi  AND status = '".$this->input->post("status")."'");
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("laporan/report_view",$data);

          }elseif($this->input->post("filter_report") == "keterangan"){
            $query = $this->db->query("SELECT 
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
          FROM  bagian, tbl_provinsi, daftar
          LEFT JOIN pembimbing ON daftar.NIP=pembimbing.NIP 
          LEFT JOIN tbl_sekolah_perguruantinggi ON daftar.id_sekolah_perguruantinggi=tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi 
          LEFT JOIN tbl_jurusan ON daftar.id_jurusan=tbl_jurusan.id_jurusan 
          LEFT JOIN tbl_kota ON daftar.id_kota=tbl_kota.id_kota 
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi  AND keterangan = '".$this->input->post("keterangan")."'");
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("laporan/report_view",$data);

        }elseif($this->input->post("filter_report") == "provinsi"){
            $query = $this->db->query("SELECT 
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
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi AND tbl_kota.id_provinsi = '".$this->input->post("provinsi")."'");
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("laporan/report_view",$data);

        }elseif($this->input->post("filter_report") == "kota"){
            $query = $this->db->query("SELECT 
                daftar.NIS_NIM,
                daftar.nama_lengkap,
                tbl_sekolah_perguruantinggi.nama_sekolah_perguruantinggi,
                tbl_jurusan.nama_jurusan,
                tbl_kota.nama_kota,
                tbl_provinsi.nama_provinsi,
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
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi  AND tbl_kota.id_kota = '".$this->input->post("kota")."'");
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("laporan/report_view",$data);

        }elseif($this->input->post("filter_report") == "pertanggal"){
            $query = $this->db->query("SELECT 
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
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi  AND tanggal_mulai = '".$this->input->post("tanggal")."'");
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("laporan/report_view",$data);

        }elseif($this->input->post("filter_report") == "perbulan"){
            $query = $this->db->query("SELECT 
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
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi  AND substring(tanggal_mulai,1,7) = '".$this->input->post("tahun_perbulan")."-".$this->input->post("bulan")."'");
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("laporan/report_view",$data);
            
        }elseif($this->input->post("filter_report") == "pertahun"){
            $query = $this->db->query("SELECT 
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
                WHERE pembimbing.bagian_id=bagian.bagian_id AND tbl_kota.id_provinsi=tbl_provinsi.id_provinsi  AND substring(tanggal_mulai,1,4) = '".$this->input->post("pertahun")."'");
            $daftar = $query->result();
            $data = ['daftar'=>$daftar];
            $this->load->view("laporan/report_view",$data);
        }
        else{
            echo "Maaf data belum anda pilih";
        }

    }


    /*public function laporan_perbagian(){
        $query = $this->db->query('   SELECT  bagian.nama_bagian, COUNT(daftar.bagian_id) bagian
                FROM        daftar
                LEFT JOIN  bagian
                ON          daftar.bagian_id = bagian.bagian_id
                GROUP BY    bagian.bagian_id');

        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_perstatus(){
        $query = $this->db->query('   SELECT      daftar.status, COUNT(*) jml_status
                FROM        daftar
                GROUP BY    daftar.status');

        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

     function laporan_pertanggal($tgl){
        $query = $this->db->query("SELECT daftar.NIS_NIM, daftar.nama_lengkap, daftar.sekolah_universitas, daftar.jurusan, daftar.no_hp, daftar.tanggal_mulai, daftar.tanggal_selesai, daftar.status, daftar.pembimbing, daftar.bagian_id, bagian.nama_bagian FROM daftar LEFT JOIN bagian ON daftar.bagian_id=bagian.bagian_id WHERE daftar.tanggal_mulai = '$tgl'");

        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }*/

    

    public function laporan_perbagian($bulan,$tahun){
        $query = $this->db->query(" SELECT  bagian.nama_bagian, COUNT(daftar.NIS_NIM) bagian
                FROM        bagian, daftar
                LEFT JOIN  pembimbing ON daftar.NIP=pembimbing.NIP
                WHERE pembimbing.bagian_id=bagian.bagian_id AND substring(daftar.tanggal_mulai,1,7) = '".$tahun."-".$bulan."'
                GROUP BY    pembimbing.NIP "
                );

        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }


    public function laporan_perpembimbing($bulan,$tahun){
        $query = $this->db->query(" SELECT  pembimbing.nama_pembimbing, COUNT(daftar.NIS_NIM) pembimbing
                FROM        bagian, daftar
                LEFT JOIN  pembimbing ON daftar.NIP=pembimbing.NIP
                WHERE      pembimbing.bagian_id=bagian.bagian_id AND substring(daftar.tanggal_mulai,1,7) = 
                '".$tahun."-".$bulan."' GROUP BY daftar.NIP");

        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }


    public function laporan_perstatus($bulan,$tahun){
        $query = $this->db->query("   SELECT      daftar.status, COUNT(*) jml_status
                FROM        daftar
                WHERE substring(daftar.tanggal_mulai,1,7) = '".$tahun."-".$bulan."'
                GROUP BY    daftar.status");

        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_perketerangan($bulan,$tahun){
        $query = $this->db->query("   SELECT      daftar.keterangan, COUNT(*) jml_ket
                FROM        daftar
                WHERE substring(daftar.tanggal_mulai,1,7) = '".$tahun."-".$bulan."'
                GROUP BY    daftar.keterangan");

        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_persekolah($bulan,$tahun){
        $query = $this->db->query("   
                SELECT       tbl_sekolah_perguruantinggi.nama_sekolah_perguruantinggi,COUNT(daftar.NIS_NIM) jumlah
                FROM        daftar
                LEFT JOIN tbl_sekolah_perguruantinggi ON daftar.id_sekolah_perguruantinggi=tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi 
                WHERE substring(daftar.tanggal_mulai,1,7) = '".$tahun."-".$bulan."'
                GROUP BY    daftar.id_sekolah_perguruantinggi");
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_perjurusan($bulan,$tahun){
        $query = $this->db->query("   
                SELECT      tbl_jurusan.nama_jurusan,Count(daftar.NIS_NIM) jumlah
                FROM        daftar
                LEFT JOIN tbl_jurusan ON daftar.id_jurusan=tbl_jurusan.id_jurusan
                WHERE substring(daftar.tanggal_mulai,1,7) = '".$tahun."-".$bulan."'
                GROUP BY    daftar.id_jurusan");
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_perkota($bulan,$tahun){
        $query = $this->db->query("   
                SELECT      tbl_kota.nama_kota,Count(daftar.NIS_NIM) jumlah
                FROM        daftar
                LEFT JOIN tbl_kota ON daftar.id_kota=tbl_kota.id_kota
                WHERE substring(daftar.tanggal_mulai,1,7) = '".$tahun."-".$bulan."'
                GROUP BY    daftar.id_kota");
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_perprovinsi($bulan,$tahun){
        $query = $this->db->query("   
                SELECT      tbl_kota.nama_kota,tbl_provinsi.nama_provinsi,Count(daftar.NIS_NIM) jumlah
                FROM        tbl_provinsi, daftar
                LEFT JOIN   tbl_kota ON daftar.id_kota=tbl_kota.id_kota
                WHERE       tbl_kota.id_provinsi=tbl_provinsi.id_provinsi AND substring(daftar.tanggal_mulai,1,7) = '".$tahun."-".$bulan."'
                GROUP BY    tbl_kota.id_provinsi");
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_pertanggal($tgl){
        $query = $this->db->query("SELECT daftar.NIS_NIM, daftar.nama_lengkap, daftar.sekolah_universitas, daftar.jurusan, daftar.no_hp, daftar.tanggal_mulai, daftar.tanggal_selesai, daftar.status, daftar.pembimbing, daftar.bagian_id, bagian.nama_bagian FROM daftar LEFT JOIN bagian ON daftar.bagian_id=bagian.bagian_id WHERE daftar.tanggal_mulai = '$tgl'");

        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_perbagian_tahun($tahun){
        $query = $this->db->query( "   SELECT  bagian.nama_bagian, COUNT(daftar.NIS_NIM) bagian
                FROM        bagian, daftar
                LEFT JOIN  pembimbing ON daftar.NIP=pembimbing.NIP
                WHERE pembimbing.bagian_id=bagian.bagian_id AND substring(daftar.tanggal_mulai,1,4) = '".$tahun."'
                GROUP BY    pembimbing.NIP" );

        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_perpembimbing_tahun($tahun){
        $query = $this->db->query(" 
                SELECT  pembimbing.nama_pembimbing, COUNT(daftar.NIS_NIM) pembimbing
                FROM        bagian,daftar
                LEFT JOIN  pembimbing ON daftar.NIP=pembimbing.NIP
                WHERE  pembimbing.bagian_id=bagian.bagian_id AND  substring(daftar.tanggal_mulai,1,4) = '".$tahun."'
                GROUP BY    daftar.NIP ");

        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_perstatus_tahun($tahun){
        $query = $this->db->query("   SELECT      daftar.status, COUNT(*) jml_status
                FROM        daftar
                WHERE substring(daftar.tanggal_mulai,1,4) = '".$tahun."'
                GROUP BY    daftar.status");

        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_perketerangan_tahun($tahun){
        $query = $this->db->query("   SELECT      daftar.keterangan, COUNT(*) jml_ket
                FROM        daftar
                WHERE substring(daftar.tanggal_mulai,1,4) = '".$tahun."'
                GROUP BY    daftar.keterangan");

        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_persekolah_tahun($tahun){
        $query = $this->db->query("   
                SELECT       tbl_sekolah_perguruantinggi.nama_sekolah_perguruantinggi,Count(daftar.NIS_NIM) jumlah
                FROM        daftar
                LEFT JOIN tbl_sekolah_perguruantinggi ON daftar.id_sekolah_perguruantinggi=tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi 
                WHERE substring(daftar.tanggal_mulai,1,4) = '".$tahun."'
                GROUP BY    daftar.id_sekolah_perguruantinggi");
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_perjurusan_tahun($tahun){
        $query = $this->db->query("   
                SELECT      tbl_jurusan.nama_jurusan,Count(daftar.NIS_NIM) jumlah
                FROM        daftar
                LEFT JOIN tbl_jurusan ON daftar.id_jurusan=tbl_jurusan.id_jurusan
                WHERE substring(daftar.tanggal_mulai,1,4) = '".$tahun."'
                GROUP BY    daftar.id_jurusan");
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_perkota_tahun($tahun){
        $query = $this->db->query("   
                SELECT      tbl_kota.nama_kota,Count(daftar.NIS_NIM) jumlah
                FROM        daftar
                LEFT JOIN tbl_kota ON daftar.id_kota=tbl_kota.id_kota
                WHERE substring(daftar.tanggal_mulai,1,4) = '".$tahun."'
                GROUP BY    daftar.id_kota");
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function laporan_perprovinsi_tahun($tahun){
        $query = $this->db->query("   
                SELECT      tbl_kota.nama_kota,tbl_provinsi.nama_provinsi,Count(daftar.NIS_NIM) jumlah
                FROM        tbl_provinsi, daftar
                LEFT JOIN tbl_kota ON daftar.id_kota=tbl_kota.id_kota
                WHERE       tbl_kota.id_provinsi=tbl_provinsi.id_provinsi AND substring(daftar.tanggal_mulai,1,4) = '".$tahun."'
                GROUP BY    tbl_kota.id_provinsi");
        if($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            $query->free_result();
        }
        else {
            $data = NULL;
        }
        return $data;
    }

    public function get_cetakkartu($nisnim){
        return $this->db->query ('SELECT
                daftar.NIS_NIM,
                daftar.nama_lengkap,
                tbl_sekolah_perguruantinggi.nama_sekolah_perguruantinggi,
                tbl_jurusan.nama_jurusan,
                tbl_provinsi.nama_provinsi,
                tbl_kota.nama_kota,
                daftar.status,
                pembimbing.nama_pembimbing,
                bagian.nama_bagian,
                daftar.tanggal_mulai,
                daftar.tanggal_selesai
                FROM daftar 
                LEFT JOIN bagian ON daftar.bagian_id=bagian.bagian_id 
                LEFT JOIN pembimbing ON daftar.NIP=pembimbing.NIP 
                LEFT JOIN tbl_sekolah_perguruantinggi ON daftar.id_sekolah_perguruantinggi=tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi 
                LEFT JOIN tbl_jurusan ON daftar.id_jurusan=tbl_jurusan.id_jurusan 
                LEFT JOIN tbl_kota ON daftar.id_kota=tbl_kota.id_kota 
                LEFT JOIN tbl_provinsi ON daftar.id_provinsi=tbl_provinsi.id_provinsi 
                WHERE daftar.NIS_NIM = "'.$nisnim.'"');

    }
    
}