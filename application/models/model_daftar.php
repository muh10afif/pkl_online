<?php
    class Model_daftar extends CI_Model{


    function tampilkan_data(){
        return $this->db->query("SELECT * FROM daftar ORDER BY tanggal_mulai DESC");
    }

    function tampilkan_data_sekolah(){
      $query= "SELECT
              daftar.id_sekolah_perguruantinggi,
              tbl_sekolah_perguruantinggi.nama_sekolah_perguruantinggi
              FROM
              daftar ,
              tbl_sekolah_perguruantinggi
              WHERE
              daftar.id_sekolah_perguruantinggi = tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi";
        return $this->db->query($query);
    }

    function tampilkan_data_sekolah_otomatis(){
        return $this->db->query("SELECT * FROM tbl_sekolah_perguruantinggi");
    }

    function tampilkan_data_jurusan_otomatis(){
        return $this->db->query("SELECT * FROM tbl_jurusan");
    }

    function tampilkan_data_kota_otomatis(){
        return $this->db->query("SELECT * FROM tbl_kota");
    }

    function tampilkan_data_provinsi_otomatis(){
        return $this->db->query("SELECT * FROM tbl_provinsi");
    }

    function tampilkan_data_bagian(){
        
        return $this->db->get('bagian');
    }

    # Fungsi menampilkan institusi
    public function tampil_cmb_institusi(){
      $sql = "SELECT
              daftar.id_sekolah_perguruantinggi,
              tbl_sekolah_perguruantinggi.nama_sekolah_perguruantinggi
              FROM
              daftar ,
              tbl_sekolah_perguruantinggi
              WHERE
              daftar.id_sekolah_perguruantinggi = tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi
              GROUP BY nama_sekolah_perguruantinggi";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function tampil_cmb_institusi1(){
      $sql = "SELECT
              daftar.id_sekolah_perguruantinggi,
              tbl_sekolah_perguruantinggi.nama_sekolah_perguruantinggi
              FROM
              daftar ,
              tbl_sekolah_perguruantinggi
              WHERE
              daftar.id_sekolah_perguruantinggi = tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi
              GROUP BY nama_sekolah_perguruantinggi";
      $query = $this->db->query($sql);
      return $query->result();
    }

    # Fungsi menampilkan jurusan
    public function tampil_cmb_jurusan(){
      $sql = "SELECT
              daftar.id_jurusan,
              tbl_jurusan.nama_jurusan
              FROM
              daftar ,
              tbl_jurusan
              WHERE
              daftar.id_jurusan = tbl_jurusan.id_jurusan
              GROUP BY nama_jurusan";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function tampil_cmb_jurusan1(){
      $sql = "SELECT
              daftar.id_jurusan,
              tbl_jurusan.nama_jurusan
              FROM
              daftar ,
              tbl_jurusan
              WHERE
              daftar.id_jurusan = tbl_jurusan.id_jurusan
              GROUP BY nama_jurusan";
      $query = $this->db->query($sql);
      return $query->result();
    }

    # Fungsi menampilkan status
    public function tampil_cmb_status(){
      $sql = "SELECT status FROM daftar GROUP BY status";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function tampil_cmb_keterangan(){
      $sql = "SELECT keterangan FROM daftar GROUP BY keterangan DESC";
      $query = $this->db->query($sql);
      return $query->result();
    }

    # Fungsi menampilkan provinsi
    public function tampil_cmb_provinsi(){
      $sql = "SELECT
              daftar.id_kota,
              tbl_kota.id_provinsi,
              tbl_kota.nama_kota,
              tbl_provinsi.nama_provinsi
              FROM
              daftar ,
              tbl_kota,
              tbl_provinsi
              WHERE
              tbl_kota.id_provinsi=tbl_provinsi.id_provinsi AND daftar.id_kota = tbl_kota.id_kota
              GROUP BY nama_provinsi";
      $query = $this->db->query($sql);
      return $query->result();
    }

    # Fungsi menampilkan kota
    public function tampil_cmb_kota(){
      $sql = "SELECT
              daftar.id_kota,
              tbl_kota.nama_kota
              FROM
              daftar ,
              tbl_kota
              WHERE
              daftar.id_kota = tbl_kota.id_kota
              GROUP BY nama_kota";
      $query = $this->db->query($sql);
      return $query->result();
    }

    # Fungsi menampilkan tahun
    public function tampil_cmb_tahun(){
      $sql = "SELECT substring(`tanggal_mulai`,1,4) AS 'tahun' FROM daftar GROUP BY tahun";
      $query = $this->db->query($sql);
      return $query->result();
    }
    

    function tampilkan_data_paging()
    {
        return $this->db->query("
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
          daftar.no_hp, 
          daftar.tanggal_mulai, 
          daftar.tanggal_selesai, 
          daftar.status, 
          daftar.keterangan,
          pembimbing.nama_pembimbing,  
          bagian.nama_bagian, 
          daftar.surat_pengantar 
          FROM bagian, tbl_provinsi, daftar
          LEFT JOIN pembimbing ON daftar.NIP=pembimbing.NIP 
          LEFT JOIN tbl_sekolah_perguruantinggi ON daftar.id_sekolah_perguruantinggi=tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi 
          LEFT JOIN tbl_jurusan ON daftar.id_jurusan=tbl_jurusan.id_jurusan 
          LEFT JOIN tbl_kota ON daftar.id_kota=tbl_kota.id_kota 
           WHERE tbl_kota.id_provinsi=tbl_provinsi.id_provinsi AND pembimbing.bagian_id=bagian.bagian_id 
          ORDER BY tgl_daftar DESC ");
    }


    function tampilkan_data_paging_lagi()
    {
        return $this->db->query("
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
          daftar.no_hp, 
          daftar.tanggal_mulai, 
          daftar.tanggal_selesai, 
          daftar.status 
          FROM tbl_provinsi, daftar 
          LEFT JOIN tbl_sekolah_perguruantinggi ON daftar.id_sekolah_perguruantinggi=tbl_sekolah_perguruantinggi.id_sekolah_perguruantinggi 
          LEFT JOIN tbl_jurusan ON daftar.id_jurusan=tbl_jurusan.id_jurusan 
          LEFT JOIN tbl_kota ON daftar.id_kota=tbl_kota.id_kota 
          WHERE tbl_kota.id_provinsi=tbl_provinsi.id_provinsi 
          ORDER BY tgl_daftar DESC ");
    }


    function post(){

      $config['upload_path']    = './uploads/surat_pengantar/';
      $config['allowed_types']  = 'gif|jpg|png';

      $this->upload->initialize($config);

      if($this->upload->do_upload('userfile')){
        $upload_data = $this->upload->data();
        $surat_pengantar = base_url().'uploads/surat_pengantar/'.$upload_data['file_name'];

          $NIS_NIM        = $this->input->post('nis/nim');
          $nama_lengkap   = $this->input->post('nama');
          $alamat         = $this->input->post('alamat');
          $kota           = $this->input->post('kota');
          $provinsi       = $this->input->post('provinsi');
          $jenis_kelamin  = $this->input->post('jenis_kelamin');
          $agama          = $this->input->post('agama');
          $sekolah        = $this->input->post('sekolah');
          $alamat_sekolah = $this->input->post('alamat_sekolah');
          $jurusan        = $this->input->post('Jurusan');
          $no_hp          = $this->input->post('NoHp');
          $tanggal_mulai  = $this->input->post('mulai');
          $tanggal_selesai= $this->input->post('selesai');
          
          $idsekolah      = $this->db->get_where('tbl_sekolah_perguruantinggi',array('nama_sekolah_perguruantinggi'=>$sekolah))->row_array();
          $idjurusan      = $this->db->get_where('tbl_jurusan',array('nama_jurusan'=>$jurusan))->row_array();
          $idkota         = $this->db->get_where('tbl_kota',array('nama_kota'=>$kota))->row_array();
          $idprovinsi     = $this->db->get_where('tbl_provinsi',array('nama_provinsi'=>$provinsi))->row_array();

          $data = array(
                 'NIS_NIM'                      =>  $NIS_NIM,
                 'nama_lengkap'                 =>  $nama_lengkap,
                 'alamat'                       =>  $alamat,
                 'id_kota'                      =>  $idkota['id_kota'],
                 'jenis_kelamin'                =>  $jenis_kelamin,
                 'agama'                        =>  $agama,
                 'id_sekolah_perguruantinggi'   =>  $idsekolah['id_sekolah_perguruantinggi'],
                 'alamat_sekolah'               =>  $alamat_sekolah,
                 'id_jurusan'                   =>  $idjurusan['id_jurusan'],
                 'no_hp'                        =>  $no_hp,
                 'tanggal_mulai'                =>  $tanggal_mulai,
                 'tanggal_selesai'              =>  $tanggal_selesai,
                 'status'                       =>  'Pending',
                 'keterangan'                   =>  'Belum selesai PKL',
                 'surat_pengantar'              =>  $surat_pengantar, 
                 'tgl_daftar'                   =>  date('Y-m-d H:i:s',now('Asia/Jakarta'))
                 );

          $this->db->insert('daftar',$data);
        }
    }
    

    function get_one($id)
    {
        $param  =   array('NIS_NIM'=>$id
          );
        return $this->db->get_where('daftar',$param);
    }


    function edit($data,$id)
    {
        $this->db->where('NIS_NIM',$id);
        $this->db->update('daftar',$data);
    }
    

    function delete($id)
    {
        $this->db->where('NIS_NIM',$id);
        $this->db->delete('daftar');
    }


}