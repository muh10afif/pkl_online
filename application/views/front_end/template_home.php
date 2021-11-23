<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DISKOMINFO | Provinsi Jawa Barat</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>agency/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>agency/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="<?php echo base_url();?>agency/css/agency.min.css" rel="stylesheet">


    <link href="<?php echo base_url();?>assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/plugins/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
      function cekform()
      {
        
        if(!$("#password").val() && !$("#nisnim").val())
        {
          alert('maaf semua harus diisi dahulu');
          return false;
        }
        else if(!$("#nisnim").val())
        {
          alert('maaf NIS / NIM tidak boleh kosong');
          $("#nisnim").focus();
          return false;
        }
        else if(!$("#password").val())
        {
          alert('maaf password tidak boleh kosong');
          $("#password").focus();
          return false;
        }
      }
    </script>


    <script type="text/javascript">
    function cekform1()
      {

if(!$("#nama").val() && !$("#email").val() && !$("#nisnim1").val()
    && !$("#pass").val())
        {
          alert('maaf semua harus diisi dahulu');
          return false;
        }
       else if(!$("#email").val())
        {
          alert('maaf email tidak boleh kosong');
          $("#email").focus();
          return false;
        }
       else if(!$("#nisnim1").val())
        {
          alert('maaf nisnim tidak boleh kosong');
          $("#nisnim1").focus();
          return false;
        }
      else  if(!$("#pass").val())
        {
          alert('maaf password tidak boleh kosong');
          $("#pass").focus();
          return false;
        }
     }
    </script>

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Sistem Informasi Penerimaan PKL</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#masuk">Masuk</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#daftar">Daftar</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#penerimaan">Pengumuman</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#diskominfo">Diskominfo</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#alur">Alur Pengajuan</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Selamat Datang</div>
                <div class="intro-heading">Calon Peserta Praktek Kerja Lapangan DISKOMINFO JABAR</div>
                <a href="#masuk" class="page-scroll btn btn-xl">Masuk</a> 
        </div>
    </header>

    <!-- Masuk  -->
    <section id="masuk">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Masuk</h2>
                    <h3 class="section-subheading text-muted">Bila belum mempunyai akun akses untuk masuk silahkan <a href="#daftar">mendaftar</a></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form  name="sentMessage" id="" method="POST" action="<?php echo base_url();?>webpkl/"  onSubmit="return cekform();" novalidate>
                        <div class="row">
                            <div class="col-md-3">
                               
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nisnim" class="form-control" placeholder="Your NIS /NIM *" id="nisnim" required data-validation-required-message="Please enter your NIS / NIM.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Your Password *" id="password" required data-validation-required-message="Please enter your password.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                
                            </div>

                            <div class="col-md-3">
                               
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" name="submit" class="btn btn-xl">MASUK</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--Daftar -->
    <section id="daftar" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Daftar</h2>
                    <h3 class="section-subheading text-muted">Silahkan isi form daftar dengan benar dan lengkap
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="" method="POST" action="<?php echo base_url();?>webpkl/registrasi/" onSubmit="return cekform1();" novalidate>
                        <div class="row">
                            <div class="col-md-3">
                               
                            </div>

                            <div class="col-md-6">
                                <!--<div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Nama *" name="nama" id="nama" >
                                </div>-->
                                <div class="form-group">
                                    <input type="Email" class="form-control" placeholder="Your Email *" name="email" id="email" >
                                
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your NIS / NIM *" name="nisnim" id="nisnim1" >
                                </div>
                                <div class="form-group">
                                    <input type="Password" class="form-control" placeholder="Your Password *" name="password" id="pass" >
                                </div>

                            </div>

                            <div class="col-md-3">
                               
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" name="submit" class="btn btn-xl">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Penerimaan -->
    <section id="penerimaan">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Daftar Penerimaan Peserta Praktek Kerja Lapangan</h2>
                    <h3 class="section-subheading text-muted"></a></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <form method="POST" action="<?php echo base_url();?>webpkl/" >
                    <table id="dataTables-example" class="table table-striped table-bordered table-hover">
    <thead>
    <tr><th>No</th><th>NIS/NIM</th><th>Nama</th><th>Sekolah/Perguruan Tinggi</th><th>Jurusan</th><th>Tanggal Mulai</th><th>Tanggal Selesai</th><th>Status</th><th>Pembimbing</th><th>Bagian</th>
    </tr></thead>
    <?php
    $no=1+$this->uri->segment(3);
    foreach ($record->result() as $r)
    { 
       if($r->status == "Diterima"){
      ?>
     
       <tr class="success">
            <td><?php echo$no++; ?></td>
            <td><?php echo$r->NIS_NIM ?></td>
            <td><?php echo$r->nama_lengkap?></td>
            <td><?php echo$r->nama_sekolah_perguruantinggi?></td>
            <td><?php echo$r->nama_jurusan?></td>
            <td><?php echo tgl_indo($r->tanggal_mulai)?></td>
            <td><?php echo tgl_indo($r->tanggal_selesai)?></td>
            
            <td><?php echo$r->status?></td>
            <td><?php echo$r->nama_pembimbing?></td>
            <td><?php echo$r->nama_bagian?></td>
            
        </tr>
       
    <?php
        } elseif($r->status == "Ditolak"){
    ?>
   
    <tr class="danger">
            <td><?php echo$no++; ?></td>
            <td><?php echo$r->NIS_NIM ?></td>
            <td><?php echo$r->nama_lengkap?></td>
            <td><?php echo$r->nama_sekolah_perguruantinggi?></td>
            <td><?php echo$r->nama_jurusan?></td>
            <td><?php echo tgl_indo($r->tanggal_mulai)?></td>
            <td><?php echo tgl_indo($r->tanggal_selesai)?></td>
            <td><?php echo$r->status?></td>
            <td><?php echo$r->nama_pembimbing?></td>
            <td><?php echo$r->nama_bagian?></td>
           
        </tr>
        
        <?php }else{
    ?>
    
        <tr class="warning">
            <td><?php echo$no++; ?></td>
            <td><?php echo$r->NIS_NIM ?></td>
            <td><?php echo$r->nama_lengkap?></td>
            <td><?php echo$r->nama_sekolah_perguruantinggi?></td>
            <td><?php echo$r->nama_jurusan?></td>
            <td><?php echo tgl_indo($r->tanggal_mulai)?></td>
            <td><?php echo tgl_indo($r->tanggal_selesai)?></td>
            <td><?php echo$r->status?></td>
            <td><?php echo$r->nama_pembimbing?></td>
            <td><?php echo$r->nama_bagian?></td>
            
        </tr>
        
        <?php
        }
    } ?>
</table>
</form>


                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="diskominfo" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Dinas Kominfo Prov. Jabar</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dinas Informatika dan Komunikasi (DISKOMINFO) Provinsi Jawa Barat
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home-pills" data-toggle="tab">Tentang Dinas Kominfo</a>
                                </li>
                                <li><a href="#profile-pills" data-toggle="tab">Visi & Misi</a>
                                </li>
                                <li><a href="#messages-pills" data-toggle="tab">Struktur Organisasi</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills">
                                    <h3 style="text-align: center;">SEJARAH</h3>
<p>&nbsp;</p>
<p>Kantor Pengolahan Data Elektronik&nbsp;<i>(KPDE)</i>&nbsp;Provinsi 
Daerah Tingkat I Jawa Barat adalah kelanjutan dari organisasi sejenis 
yang semula sudah ada di lingkungan Pemerintah Provinsi Daerah Tingkat I
 Jawa Barat dengan nama Pusat Pengolahan Data&nbsp;<i>(PUSLAHTA)</i><i>&nbsp;</i>Provinsi Daerah Tingkat I Jawa Barat.</p>
<p>Keberadaan PUSLAHTA di Jawa Barat dimulai pada tahun 1977, yaitu 
dengan adanya Proyek Pembangunan Komputer Pemerintah Provinsi Daerah 
Tingkat I Jawa Barat. Proyek tersebut dimaksudkan untuk mempersiapkan 
sarana prasarana dalam rangka memasuki era komputer. Dalam perkembangan 
selanjutnya, pada tanggal 8 April 1978 dengan Surat Keputusan Gubernur 
Kepala Daerah Tingkat I Jawa Barat Nomor : 294/Ok.200-Oka/SK/78 
diresmikan pembentukan/pendirian&nbsp;<b><i>Kantor Pusat Pengolahan Data (PUSLAHTA)</i></b>&nbsp; Provinsi Daerah Tingkat I Jawa Barat yang berkedudukan di jalan Tamansari No. 57 Bandung.</p>
<h2></h2>
<p>Sebagai tindak lanjut dari Surat Keputusan Gubernur Nomor : 
294/Ok.200-Oka/SK/78, maka pada tanggal 29 Juni 1981 pendirian Kantor 
PUSLAHTA dikukuhkan dengan Peraturan Daerah Nomor : 2 Tahun 1981 tentang
 Pembentukan Pusat Pengolahan Data<i>(PUSLAHTA)</i>&nbsp;Provinsi Daerah
 Tingkat I Jawa Barat dan Peraturan Daerah Nomor : 3 Tahun 1981 tentang 
Susunan Organisasi dan Tata Kerja Pusat Pengolahan Data Provinsi Daerah 
Tingkat I Jawa Barat. Dengan kedua Peraturan&nbsp; Daerah tersebut 
keberadaan PUSLAHTA di lingkungan Pemerintah Provinsi Daerah Tingkat I 
Jawa Barat semakin berperan, khususnya dalam melaksanakan kebijaksanaan 
Gubernur Kepala Daerah di bidang komputerisasi. Akan tetapi keberadaan 
kedua Peraturan Daerah tersebut tidak mendapat pengesahan dari pejabat 
yang berwenang dalam hal ini Menteri Dalam Negeri, sehingga keberadaan 
PUSLAHTA di lingkungan Pemerintah Daerah Tingkat I Jawa Barat kedudukan 
organisasi menjadi non structural. Akan tetapi dengan keberadaan 
Puslahta Provinsi Daerah Tingkat I Jawa Barat pada masa itu telah banyak
 dirasakan manfaatnya selain oleh lingkungan Pemerintah Provinsi Jawa 
Barat juga oleh instansi lain dalam bentuk kerja sama penggunaan mesin 
komputer IBM S-370/125 seperti&nbsp; :</p>
<ol>
<li>IPTN</li>
<li>PJKA ITB</li>
<li>Dan pihak Swasta lainnya.</li>
</ol>
<p>Dalam perjalanan waktu yang cukup panjang, yaitu lebih kurang 14 
tahun sejak PUSLAHTA didirikan, pada tanggal 27 Juni 1992 dengan Surat 
Keputusan Gubernur Kepala Daerah Tingkat I Jawa Barat Nomor : 21 Tahun 
1992 Organisasi PUSLAHTA Provinsi Daerah Tingkat I Jawa Barat 
dibubarkan. Di dalam salah satu pasal Surat Keputusan Gubernur No. 21 
tahun 1992 dinyatakan bahwa tugas dan wewenang PUSLAHTA dialihkan ke 
Kantor Bappeda Provinsi Daerah Tingkat I Jawa Barat.</p>
<p>Pada tanggal yang sama dengan terbitnya Surat Keputusan Gubernur No. 
21 tahun 1992 tentang Pembubaran PUSLAHTA Provinsi Daerah Tingkat I Jawa
 Barat, keluar Keputusan Gubernur Kepala Daerah Tingkat I Jawa Barat 
Nomor : 22 Tahun 1992 tentang Pembentukan Kantor Pengolahan Data 
Elektronik&nbsp;<i>(KPDE)</i><i>&nbsp;</i>Provinsi Daerah Tingkat I Jawa
 Barat sebagai pelaksana dari Instruksi Menteri Dalam negeri Nomor : 5 
tahun 1992 tentang Pembentukan Kantor Pengolahan Data Elektronik 
Pemerintah Daerah di seluruh Indonesia.</p>
<p>Sebagai tindak lanjut dari Instruksi Menteri Dalam Negeri Nomor : 5 
Tahun 1992 tentang Pembentukan Kantor Pengolahan Data Elektronik, pada 
tanggal 30 Juni 1993 keluar persetujuan Menteri Negara Pendayagunaan 
Aparatur Negara&nbsp;<b><i>(Menpan)</i></b><b><i>&nbsp;</i></b>dengan 
Nomor : B-606/I/93 perihal Persetujuan Pembentukan Kantor Pengolahan 
Data Elektronik untuk Provinsi Daerah Tingkat I Kalimantan Selatan, Jawa
 Barat, Sumatera Barat dan Daerah Istimewa Yogyakarta.</p>
<p>Dengan keluarnya Surat Persetujuan Menteri Pendayagunaan Aparatur Negara&nbsp;<b><i>(Menpan)</i></b><b><i>&nbsp;</i></b>tersebut,
 maka untuk mengukuhkan Keputusan Gubernur Nomor&nbsp; 22 Tahun 1992 
diajukan Rancangan Peraturan Daerahnya, dan akhirnya pada tanggal 21 
Juni 1994 berhasil ditetapkan Peraturan Daerah Provinsi Daerah Tingkat I
 Jawa Barat Nomor : 4 tahun 1994 tentang Pengukuhan Dasar Hukum 
Pembentukan Kantor Pengolahan Data Elektronik Provinsi Daerah Tingkat I 
Jawa Barat dan Nomor 5 tahun 1994 tentang Organisasi dan Tata Kerja 
Kantor Pengolahan Data Elektronik Provinsi Daerah Tingkat I Jawa Barat.</p>
<p>Selanjutnya kedua Peraturan Daerah tersebut diajukan ke Menteri Dalam
 Negeri untuk mendapat pengesahan, dan pada tanggal 10 Juli 1995 keluar 
Keputusan Menteri Dalam Negeri Nomor : 59 Tahun 1995 tentang Pengesahan 
Peraturan Daerah Nomor : 4 dan Nomor : 5 Tahun 1994, dengan demikian 
KPDE Provinsi Daerah Tingkat I Jawa Barat secara resmi menjadi salah 
satu&nbsp;<b><i>Unit Pelaksana Daerah yang struktural.</i></b></p>
<p>Berdasarkan Peraturan Daerah Provinsi Jawa Barat Nomor : 16 Tahun 
2000 tanggal 12 Desember 2000 tentang Lembaga Teknis Daerah Provinsi 
Jawa Barat telah ditetapkan&nbsp;<b><i>Badan Pengembangan Sistem Informasi dan Telematika Daerah</i></b>&nbsp; disingkat&nbsp;<b><i>BAPESITELDA</i></b><b><i>&nbsp;</i></b>&nbsp;sebagai
 pengembangan dari Kantor Pengolahan Data Elektronik yang dibentuk 
berdasarkan Keputusan Gubernur Nomor : 22 Tahun 1992 dan dikukuhkan 
dengan Peraturan Daerah Nomor : 5 Tahun 1994. Sedangkan Kantor 
Pengolahan Data Elektronik itu sendiri merupakan pengembangan dari Pusat
 Pengolahan Data (PUSLAHTA) Provinsi Jawa Barat yang berdiri pada 
tanggal 8 April 1978 melalui Surat Gubernur KDH Tingkat I Jawa Barat No.
 294/OK.200-Oka/SK/78, dan keberadaannya dikukuhkan dengan Peraturan 
Daerah No. 2 Tahun 1981 tanggal 29 Juni 1981.</p>
<p><b>Dasar Hukum&nbsp; :</b></p>
<p>1.&nbsp;&nbsp;&nbsp;&nbsp;Keputusan Presiden RI Nomor 50 Tahun 2000 tentang Tim Koordinasi Telematika&nbsp;&nbsp; Indonesia ;</p>
<p>2.&nbsp;&nbsp;&nbsp;&nbsp;Peraturan Daerah Provinsi Jawa Barat No. 16
 Tahun 2000 tentang Lembaga Teknis Daerah Provinsi Jawa Barat.</p>
<p><b>Nomenklatur&nbsp; :</b></p>
<p><b><i>BAPESITELDA</i></b><b>&nbsp;</b>adalah singkatan dari Badan Pengembangan Sistem Informasi dan Telematika Daerah.&nbsp;<b><i>Telematika</i></b><b><i>&nbsp;</i></b>singkatan dari Telekomunikasi, Multimedia dan Informatika .</p>
<p>Selanjutnya, berdasarkan&nbsp;<b><i>Perda Nomor 21 Tahun 2008</i></b>&nbsp;tentang Organisasi dan Tata Kerja Dinas Daerah Provinsi Jawa Barat<b><i>,</i></b><b><i>&nbsp;</i></b>maka Bapesitelda Prov. Jabar diganti menjadi&nbsp;<b><i>Dinas Komunikasi dan Informatika Provinsi</i></b>&nbsp;Jawa Barat disingkat&nbsp;<b><i>DISKOMINFO,</i></b><b><i>&nbsp;</i></b>yang berlokasi di Jalan Tamansari no. 55 Bandung.</p>
<p>Perubahan ini merupakan kenaikan tingkat dan memiliki ruang lingkup 
serta cakupan kerja lebih luas. Sasarannya tidak hanya persoalan teknis,
 tapi juga kebijakan, baik hubungannya kedalam maupun menyentuh 
kepentingan publik khususnya dibidang teknologi informasi. Dengan 
platform dinas, maka Diskominfo dapat mengeluarkan regulasi mengenai 
teknologi informasi dalam kepentingan Provinsi Jawa Barat, terutama 
pencapaian Jabar Cyber Province Tahun 2012.</p>
<p>Berdasarkan Perda tersebut, Dinas Komunikasi dan Informatika berada 
diperingkat 20 dengan sruktur organisasi sebagai berikut di bawah ini.</p>
<p>1. Kepala</p>
<p>2. Sekretariat, membawahkan :</p>
<p>a. Sub.Bagian Perencanaan dan Program</p>
<p>b. Subbagian Keuangan;</p>
<p>c. Subbagian Kepegawaian dan Umum;</p>
<p>3. Bidang Pos Dan Telekomunikasi, membawahkan :</p>
<p>a. Seksi Pos Dan Telekomunikasi;</p>
<p>b. Seksi Monitoring dan Penetiban Spektrum Frekuensi;</p>
<p>c. Seksi Standarisasi Pos Dan Telekomunikasi;</p>
<p>4.&nbsp; Bidang sarana Komunikasi Dan Diseminasi Informasi, membawahkan :</p>
<p>a. Seksi Komunikasi Sosial ;</p>
<p>b. Seksi Komunikasi Pemerintah Dan Pemerintah dareah;</p>
<p>c. Seksi Penyiaran Dan Kemitraan Media;</p>
<p>5. Bidang Telematika, membawahkan;</p>
<p>a. Seksi Pengembangan Telematika;</p>
<p>b. Seksi Penerapan telematika;</p>
<p>c. Seksi Standarisasi dan Monitoring Evaluasi Telematika</p>
<p>6. Bidang Pengolahan Data Elektronik, membawahkan:</p>
<p>a. Seksi Kompilasi Data ;</p>
<p>b. Seksi Integrasi Data ;</p>
<p>c. Seksi Penyajian Data dan Informasi.</p>
<p>7.&nbsp;&nbsp;Balai LPSE</p>
<p>a. Tata Usaha LPSE</p>
<p>b. Layanan Informasi LPSE</p>
<p>c. Dukungan dan Pendayagunaan TIK LPSE</p>

                                </div>
                                <div class="tab-pane fade" id="profile-pills">
                                    <h3 style="text-align: center;">VISI MISI</h3>
<div align="center"></div>
<div align="justify">
<p align="center"><b>VISI:</b></p>
<p align="center"><b>“TERWUJUDNYA MASYARAKAT JAWA BARAT MAJU BERBASIS TEKNOLOGI INFORMASI DAN KOMUNIKASI”</b></p>
<p>&nbsp;</p>
<p align="center"><b>MISI:</b></p>
<ol>
<li>MENINGKATKAN SDM APARATUR BIDANG TEKNOLOGI INFORMASI DAN KOMUNIKASI;</li>
<li>MENINGKATKAN SARANA PRASARANA BIDANG INFORMASI DAN KOMUNIKASI ;</li>
<li>MENGOPTIMALKAN PENGGUNAAN SISTEM PENGADAAN BARANG/JASA SECARA ELEKTRONIK</li>
<li>MENINGKATKAN KERJASAMA MASYARAKAT PEMERINTAH DAN SWASTA DALAM PEMBANGUNAN TEKNOLOGI INFORMASI DAN KOMUNIKASI;</li>
<li>MENINGKATKAN KUALITAS DAN KUANTITAS INFORMASI KEPADA MASYARAKAT MELALUI BERBAGAI MEDIA;</li>
<li>MENGOPTIMALKAN PENERAPAN <i>E-GOVERNMENT </i>DI PROVINSI JAWA BARAT.</li>
</ol>
</div>

                                </div>
                                <div class="tab-pane fade" id="messages-pills">
                                    <img class="img-responsive img-centered" src="<?php echo base_url();?>uploads/strukturorganisasi1.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alur Pendaftaran Section -->
    <section id="alur" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Alur Pengajuan Praktek Kerja Lapangan</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <br><br>
                            <h3> Pertama </h3>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Siswa / Mahasiswa</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Harus memiliki akun masuk untuk bisa melakukan pengajuan calon peserta praktek kerja lapangan. Jika belum memiliki akun masuk silahkan mengisi form daftar terlebih dahulu, setelah itu mengisi form masuk.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <br><br>
                            <h3> Kedua </h3>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Siswa / Mahasiswa</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Setelah mengisi form masuk, bisa melakukan proses pengajuan calon peserta praktek kerja lapangan. Dengan mengisi semua data pribadi siswa/mahasiswa pada form pengajuan PKL</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <br><br>
                            <h3> Ketiga </h3>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Siswa / Mahasiswa</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Sudah mengisi semua data pada form pengjuan PKL dengan lengkap maka tinggal menunggu pemberithuan dari Dinas Kominfo Jabar</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <br><br>
                            <h3> Keempat </h3>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Admin / Koordinator Praktek Kerja Lapangan Dinas Kominfo</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Akan memberikan pemberitahuan pada calon peserta PKL meliputi status peserta diterima atau tidak, dan memberikan nama pembimbing lapangan serta bagian yang nantinya peserta ditempatkan</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                            <br><br>
                            <h3> Selesai </h3>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; DINAS KOMINFO Prov. JABAR 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
    </footer>

    

    <!-- jQuery -->
    <script src="<?php echo base_url();?>agency/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>agency/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url();?>agency/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url();?>agency/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="<?php echo base_url();?>agency/js/agency.min.js"></script>


    <script src="<?php echo base_url();?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>



</html>
