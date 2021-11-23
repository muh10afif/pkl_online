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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" />

    <link href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet" />

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>agency/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="<?php echo base_url();?>agency/css/agency.min.css" rel="stylesheet">


    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datepicker/css/datepicker.css" />


    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-fileupload.min.css" />

     <!-- Memanggil file .css untuk style saat data dicari dalam filed 
    <link href='<?php echo base_url();?>dashgum/css/jquery.autocomplete.css' rel='stylesheet' />

    <!-- Memanggil file .css autocomplete_ci/assets/css/default.css 
    <link href='<?php echo base_url();?>dashgum/css/default.css' rel='stylesheet' /> -->
   


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL  STYLES -->

   <script type="text/javascript">
      function cekform()
      {
        
        if(!$("#nama").val() && !$("#alamat").val() && !$("#sekolah").val() && !$("#provinsi").val()
            && !$("#kota").val() && !$("#alamatsekolah").val() && !$("#jurusan").val() && !$("#hp").val()
            && !$("#mulai").val() && !$("#selesai").val() )
        {
          alert('maaf semua harus diisi dahulu');
          return false;
        }
        else if(!$("#nama").val())
        {
          alert('maaf nama tidak boleh kosong');
          $("#nama").focus();
          return false;
        }
        else if(!$("#alamat").val())
        {
          alert('maaf alamat tidak boleh kosong');
          $("#alamat").focus();
          return false;
        }
        
          else if(!$("#alamatsekolah").val())
        {
          alert('maaf alamatsekolah tidak boleh kosong');
          $("#alamatsekolah").focus();
          return false;
        }
        else if(!$("#mulai").val())
        {
          alert('maaf mulai tidak boleh kosong');
          $("#mulai").focus();
          return false;
        }else if(!$("#selesai").val())
        {
          alert('maaf selesai tidak boleh kosong');
          $("#selesai").focus();
          return false;
        }
        
        else if(!$("#alamatsekolah").val())
        {
          alert('maaf alamatsekolah tidak boleh kosong');
          $("#alamatsekolah").focus();
          return false;
        }
        
        else if(!$("#hp").val())
        {
          alert('maaf no hp tidak boleh kosong');
          $("#hp").focus();
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
                        <a class="page-scroll" href="#pengajuan">Pengajuan PKL</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#pemberitahuan">Pemberitahuan</a>
                    </li>
                    <!--<li>
                        <a class="page-scroll" href="#profil">Profil</a>
                    </li>-->
                    <li>
                        <a class="page-scroll" href="<?php echo base_url();?>webpkl/logout/">Keluar</a>
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
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="pengajuan">
        <div class="container" >
            <div class="row" >
                <div class="col-lg-12 text-center" >
                    <h2 class="section-heading">Pengajuan PKL</h2>
                    <h3 class="section-subheading text-muted">Harap isi dengan benar, tepat, dan lengkap</h3>
                </div>
            </div>
            <div class="row" >
                <div class="col-lg-12" >

                <?php
                            $query = $this->db->query('SELECT status FROM daftar WHERE NIS_NIM = "'.$this->session->userdata('NIS_NIM').'"');
                            $row = $query->row(); 
                            if($query->num_rows() == 0){ ?>
                    <form enctype="multipart/form-data" name="sentMessage" method="POST" action="<?php echo base_url();?>webpkl/post/" onSubmit="return cekform();" novalidate>
                        <div class="row">
                            <div class="col-md-3 text-center">

                            </div>

                            <div class="col-md-6">
                                <div class="form-group"> 
                                <label>NIS/NIM</label> <br> <br>
                                <?php $nisnim = $this->session->userdata('NIS_NIM'); ?>
                                <input class="form-control" type="text" name="nis/nim" placeholder="NIS/NIM" value="<?php echo $nisnim; ?>" readonly>
                                </div>

                                <div class="form-group">
                                <label> Nama Lengkap </label><br> <br> 
                                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" id="nama" >
                                </div>

                                <div class="form-group">
                                <label> Alamat </label><br> <br> 
                                <textarea class="form-control" name="alamat" placeholder="Alamat" cols="35" rows="4" id="alamat"></textarea>
                                </div>

                                <div class="form-group">
                                 <label> Kota </label><br> <br>
                                <input list="kota" class="form-control" type="text" name="kota" placeholder="Kota">
                                </div>

                                <div class="form-group">
                                <label> Provinsi </label><br> <br>
                                <input list="provinsi" class="form-control" type="text" name="provinsi" placeholder="Provinsi">
                                </div> 

                                <div class="form-group">
                                <label > Jenis Kelamin </label> <br> <br> 
                                    <?php   echo form_radio('jenis_kelamin','Laki-Laki',TRUE) ?> 
                                    <?php   echo form_label('Laki-Laki');   ?> &nbsp; &nbsp; 
                                    <?php   echo form_radio('jenis_kelamin','Perempuan'); ?>
                                    <?php   echo form_label('Perempuan');   ?>
                                </div>

                                <div class="form-group"> 
                                <label > Agama </label><br> <br>
                                <?php $agama = array ('Pilih Agama'=>'Pilih Agama','Islam'=>'Islam','Kristen'=>'Kristen','Hindu'=>'Hindu','Budha'=>'Budha'); echo form_dropdown('agama',$agama,' ', array ('class'=>'form-control')); ?>
                                </div>

                                <div class="form-group"> 
                                <label>Sekolah/Perguruan Tinggi </label><br> <br> 
                                <!--<input type="search" id="autocomplete1" name="nama_customer" />-->
                                <input list="sekolah" class="form-control" name="sekolah" placeholder="Sekolah/PerguruanTinggi">
                                </div>

                                <div class="form-group"> 
                                 <label>Jurusan </label><br> <br> 
                                <input list="jurusan" class="form-control"  name="Jurusan" placeholder="Jurusan">
                                </div>

                                <div class="form-group"> 
                                <label>Alamat Sekolah </label><br> <br> 
                                <textarea class="form-control" name="alamat_sekolah" placeholder="Alamat Sekolah" cols="35" rows="4" id="alamatsekolah"></textarea> </div>
                                
                                  

                                <div class="form-group">
                                <label>No Hp </label><br> <br> 
                                <input class="form-control" type="text" name="NoHp" placeholder="NoHp" id="hp" >
                                </div>
                                
                                <div class="form-group"  > 
                                <label>Tanggal Mulai </label><br> <br> 
                                <input class="form-control" type="date" name="mulai" id="mulai" >
                                </div>
                                
                                <div class="form-group"> 
                                <label>Tanggal Selesai </label><br> <br> <input class="form-control" type="date" name="selesai" id="selesai">
                                </div>

                                <div class="form-group">
                                <label>Surat Pengantar</label><br><br>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url();?>assets/img/demoUpload.jpg"/></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-info"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="userfile" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                                </div>
                                
                                
                            </div>

                                <div class="col-md-3">
                            </div>

                            <datalist id="sekolah">
                                <?php
                                foreach ($sekolah_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_sekolah_perguruantinggi'>";
                                }
                                ?>
                                </datalist>
                            <datalist id="jurusan">
                                <?php
                                foreach ($jurusan_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_jurusan'>";
                                }
                                ?>
                                </datalist>
                            <datalist id="kota">
                                <?php
                                foreach ($kota_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_kota'>";
                                }
                                ?>
                                </datalist>
                            <datalist id="provinsi">
                                <?php
                                foreach ($provinsi_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_provinsi'>";
                                }
                                ?>
                                </datalist>

                            

                            <div class="col-md-3">
                               
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div><br><br>
                                <button type="submit" name="submit" class="btn btn-primary btn-xl ">DAFTAR</button> &nbsp; &nbsp;
                                <button type="RESET" name="submit" class="btn btn-danger btn-xl">RESET</button>

                            </div>
                        </div>
                    </form>
                        <?php
                            }else{
                                $status = $row->status;
                                if(isset($status)){ 
                                    if($status == "Diterima"){ ?>
                                       
                <form enctype="multipart/form-data" name="sentMessage" method="POST" action="<?php echo base_url();?>webpkl/post/">
                        <div class="row">
                            <div class="col-md-3 text-center">

                            </div>

                            <div class="col-md-6">
                                <div class="form-group"> 
                                <label>NIS/NIM</label> <br> <br>
                                <?php $nisnim = $this->session->userdata('NIS_NIM'); ?>
                                <input class="form-control" type="text" name="nis/nim" placeholder="NIS/NIM" value="<?php echo $nisnim; ?>" readonly>
                                </div>

                                <div class="form-group">
                                <label> Nama Lengkap </label><br> <br> 
                                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" readonly >
                                </div>

                                <div class="form-group">
                                <label> Alamat </label><br> <br> 
                                <textarea class="form-control" name="alamat" placeholder="Alamat" cols="35" rows="4" readonly></textarea>
                                </div>

                                <div class="form-group">
                                 <label> Kota </label><br> <br>
                                <input list="kota" class="form-control" type="text" name="kota" placeholder="Kota" readonly>
                                </div>

                                <div class="form-group">
                                <label> Provinsi </label><br> <br>
                                <input list="provinsi" class="form-control" type="text" name="provinsi" placeholder="Provinsi" readonly>
                                </div> 

                                <div class="form-group">
                                <label> Jenis Kelamin </label> <br> <br> 
                                    <?php   echo form_radio('jenis_kelamin','Laki-Laki',TRUE) ?> 
                                    <?php   echo form_label('Laki-Laki');   ?> &nbsp; &nbsp; 
                                    <?php   echo form_radio('jenis_kelamin','Perempuan'); ?>
                                    <?php   echo form_label('Perempuan');   ?>
                                </div>

                                <div class="form-group"> 
                                <label > Agama </label><br> <br>
                                <?php $agama = array ('Pilih Agama'=>'Pilih Agama','Islam'=>'Islam','Kristen'=>'Kristen','Hindu'=>'Hindu','Budha'=>'Budha'); echo form_dropdown('agama',$agama,' ', array ('class'=>'form-control')); ?>
                                </div>

                                <div class="form-group"> 
                                <label>Sekolah/Perguruan Tinggi </label><br> <br> 
                                <!--<input type="search" id="autocomplete1" name="nama_customer" />-->
                                <input list="sekolah" class="form-control" name="sekolah" placeholder="Sekolah/PerguruanTinggi" readonly>
                                </div>

                                <div class="form-group"> 
                                 <label>Jurusan </label><br> <br> 
                                <input list="jurusan" class="form-control"  name="Jurusan" placeholder="Jurusan" readonly>
                                </div>

                                <div class="form-group"> 
                                <label>Alamat Sekolah </label><br> <br> 
                                <textarea class="form-control" name="alamat_sekolah" placeholder="Alamat Sekolah" cols="35" rows="4" readonly></textarea> </div>
                                
                                  

                                <div class="form-group">
                                <label>No Hp </label><br> <br> 
                                <input class="form-control" type="text" name="NoHp" placeholder="NoHp" readonly>
                                </div>
                                
                                <div class="form-group"  > 
                                <label>Tanggal Mulai </label><br> <br> 
                                <input class="form-control" type="date" name="mulai" readonly>
                                </div>
                                
                                <div class="form-group"> 
                                <label>Tanggal Selesai </label><br> <br> <input class="form-control" type="date" name="selesai" readonly>
                                </div>

                                <div class="form-group">
                                <label>Surat Pengantar</label><br><br>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url();?>assets/img/demoUpload.jpg"/></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-info"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="userfile" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                                </div>
                                
                                
                            </div>

                                <div class="col-md-3">
                            </div>

                            <datalist id="sekolah">
                                <?php
                                foreach ($sekolah_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_sekolah_perguruantinggi'>";
                                }
                                ?>
                                </datalist>
                            <datalist id="jurusan">
                                <?php
                                foreach ($jurusan_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_jurusan'>";
                                }
                                ?>
                                </datalist>
                            <datalist id="kota">
                                <?php
                                foreach ($kota_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_kota'>";
                                }
                                ?>
                                </datalist>
                            <datalist id="provinsi">
                                <?php
                                foreach ($provinsi_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_provinsi'>";
                                }
                                ?>
                                </datalist>

                            

                            <div class="col-md-3">
                               
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div><br><br>
                                <button type="submit" name="submit" class="btn btn-primary btn-xl " onclick="return confirm('Terima Kasih Data akan kita proses');">DAFTAR</button> &nbsp; &nbsp;
                                <button type="RESET" name="submit" class="btn btn-danger btn-xl">RESET</button>

                            </div>
                        </div>
                    </form>
                                       
                                    <?php }
                                    elseif($status == "Ditolak"){ ?>         
                    <form enctype="multipart/form-data" name="sentMessage" method="POST" action="<?php echo base_url();?>webpkl/post/">
                        <div class="row">
                            <div class="col-md-3 text-center">

                            </div>

                            <div class="col-md-6">
                                <div class="form-group"> 
                                <label>NIS/NIM</label> <br> <br>
                                <?php $nisnim = $this->session->userdata('NIS_NIM'); ?>
                                <input class="form-control" type="text" name="nis/nim" placeholder="NIS/NIM" value="<?php echo $nisnim; ?>" readonly>
                                </div>

                                <div class="form-group">
                                <label> Nama Lengkap </label><br> <br> 
                                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" readonly >
                                </div>

                                <div class="form-group">
                                <label> Alamat </label><br> <br> 
                                <textarea class="form-control" name="alamat" placeholder="Alamat" cols="35" rows="4" readonly></textarea>
                                </div>

                                <div class="form-group">
                                 <label> Kota </label><br> <br>
                                <input list="kota" class="form-control" type="text" name="kota" placeholder="Kota" readonly>
                                </div>

                                <div class="form-group">
                                <label> Provinsi </label><br> <br>
                                <input list="provinsi" class="form-control" type="text" name="provinsi" placeholder="Provinsi" readonly>
                                </div> 

                                <div class="form-group">
                                <label readonly> Jenis Kelamin </label> <br> <br> 
                                    <?php   echo form_radio('jenis_kelamin','Laki-Laki',TRUE) ?> 
                                    <?php   echo form_label('Laki-Laki');   ?> &nbsp; &nbsp; 
                                    <?php   echo form_radio('jenis_kelamin','Perempuan'); ?>
                                    <?php   echo form_label('Perempuan');   ?>
                                </div>

                                <div class="form-group"> 
                                <label > Agama </label><br> <br>
                                <?php $agama = array ('Pilih Agama'=>'Pilih Agama','Islam'=>'Islam','Kristen'=>'Kristen','Hindu'=>'Hindu','Budha'=>'Budha'); echo form_dropdown('agama',$agama,' ', array ('class'=>'form-control')); ?>
                                </div>

                                <div class="form-group"> 
                                <label>Sekolah/Perguruan Tinggi </label><br> <br> 
                                <!--<input type="search" id="autocomplete1" name="nama_customer" />-->
                                <input list="sekolah" class="form-control" name="sekolah" placeholder="Sekolah/PerguruanTinggi" readonly>
                                </div>

                                <div class="form-group"> 
                                 <label>Jurusan </label><br> <br> 
                                <input list="jurusan" class="form-control"  name="Jurusan" placeholder="Jurusan" readonly>
                                </div>

                                <div class="form-group"> 
                                <label>Alamat Sekolah </label><br> <br> 
                                <textarea class="form-control" name="alamat_sekolah" placeholder="Alamat Sekolah" cols="35" rows="4" readonly></textarea> </div>
                                
                                  

                                <div class="form-group">
                                <label>No Hp </label><br> <br> 
                                <input class="form-control" type="text" name="NoHp" placeholder="NoHp" readonly>
                                </div>
                                
                                <div class="form-group"  > 
                                <label>Tanggal Mulai </label><br> <br> 
                                <input class="form-control" type="date" name="mulai" readonly>
                                </div>
                                
                                <div class="form-group"> 
                                <label>Tanggal Selesai </label><br> <br> <input class="form-control" type="date" name="selesai" readonly>
                                </div>

                                <div class="form-group">
                                <label>Surat Pengantar</label><br><br>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url();?>assets/img/demoUpload.jpg"/></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-info"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="userfile" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                                </div>
                                
                                
                            </div>

                                <div class="col-md-3">
                            </div>

                            <datalist id="sekolah">
                                <?php
                                foreach ($sekolah_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_sekolah_perguruantinggi'>";
                                }
                                ?>
                                </datalist>
                            <datalist id="jurusan">
                                <?php
                                foreach ($jurusan_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_jurusan'>";
                                }
                                ?>
                                </datalist>
                            <datalist id="kota">
                                <?php
                                foreach ($kota_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_kota'>";
                                }
                                ?>
                                </datalist>
                            <datalist id="provinsi">
                                <?php
                                foreach ($provinsi_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_provinsi'>";
                                }
                                ?>
                                </datalist>

                            

                            <div class="col-md-3">
                               
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div><br><br>
                                <button type="submit" name="submit" class="btn btn-primary btn-xl " onclick="return confirm('Terima Kasih Data akan kita proses');">DAFTAR</button> &nbsp; &nbsp;
                                <button type="RESET" name="submit" class="btn btn-danger btn-xl">RESET</button>

                            </div>
                        </div>
                    </form> 
                                    <?php
                                     }else{ ?>
                <form enctype="multipart/form-data" name="sentMessage" method="POST" action="<?php echo base_url();?>webpkl/post/">
                        <div class="row">
                            <div class="col-md-3 text-center">

                            </div>

                            <div class="col-md-6">
                                <div class="form-group"> 
                                <label>NIS/NIM</label> <br> <br>
                                <?php $nisnim = $this->session->userdata('NIS_NIM'); ?>
                                <input class="form-control" type="text" name="nis/nim" placeholder="NIS/NIM" value="<?php echo $nisnim; ?>" readonly>
                                </div>

                                <div class="form-group">
                                <label> Nama Lengkap </label><br> <br> 
                                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" readonly >
                                </div>

                                <div class="form-group">
                                <label> Alamat </label><br> <br> 
                                <textarea class="form-control" name="alamat" placeholder="Alamat" cols="35" rows="4" readonly></textarea>
                                </div>

                                <div class="form-group">
                                 <label> Kota </label><br> <br>
                                <input list="kota" class="form-control" type="text" name="kota" placeholder="Kota" readonly>
                                </div>

                                <div class="form-group">
                                <label> Provinsi </label><br> <br>
                                <input list="provinsi" class="form-control" type="text" name="provinsi" placeholder="Provinsi" readonly>
                                </div> 

                                <div class="form-group">
                                <label readonly> Jenis Kelamin </label> <br> <br> 
                                    <?php   echo form_radio('jenis_kelamin','Laki-Laki',TRUE) ?> 
                                    <?php   echo form_label('Laki-Laki');   ?> &nbsp; &nbsp; 
                                    <?php   echo form_radio('jenis_kelamin','Perempuan'); ?>
                                    <?php   echo form_label('Perempuan');   ?>
                                </div>

                                <div class="form-group"> 
                                <label > Agama </label><br> <br>
                                <?php $agama = array ('Pilih Agama'=>'Pilih Agama','Islam'=>'Islam','Kristen'=>'Kristen','Hindu'=>'Hindu','Budha'=>'Budha'); echo form_dropdown('agama',$agama,' ', array ('class'=>'form-control')); ?>
                                </div>

                                <div class="form-group"> 
                                <label>Sekolah/Perguruan Tinggi </label><br> <br> 
                                <!--<input type="search" id="autocomplete1" name="nama_customer" />-->
                                <input list="sekolah" class="form-control" name="sekolah" placeholder="Sekolah/PerguruanTinggi" readonly>
                                </div>

                                <div class="form-group"> 
                                 <label>Jurusan </label><br> <br> 
                                <input list="jurusan" class="form-control"  name="Jurusan" placeholder="Jurusan" readonly>
                                </div>

                                <div class="form-group"> 
                                <label>Alamat Sekolah </label><br> <br> 
                                <textarea class="form-control" name="alamat_sekolah" placeholder="Alamat Sekolah" cols="35" rows="4" readonly></textarea> </div>
                                
                                  

                                <div class="form-group">
                                <label>No Hp </label><br> <br> 
                                <input class="form-control" type="text" name="NoHp" placeholder="NoHp" readonly>
                                </div>
                                
                                <div class="form-group"  > 
                                <label>Tanggal Mulai </label><br> <br> 
                                <input class="form-control" type="date" name="mulai" readonly>
                                </div>
                                
                                <div class="form-group"> 
                                <label>Tanggal Selesai </label><br> <br> <input class="form-control" type="date" name="selesai" readonly>
                                </div>

                                <div class="form-group">
                                <label>Surat Pengantar</label><br><br>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url();?>assets/img/demoUpload.jpg"/></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-info"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="userfile" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                                </div>
                                
                                
                            </div>

                                <div class="col-md-3">
                            </div>

                            <datalist id="sekolah">
                                <?php
                                foreach ($sekolah_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_sekolah_perguruantinggi'>";
                                }
                                ?>
                                </datalist>
                            <datalist id="jurusan">
                                <?php
                                foreach ($jurusan_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_jurusan'>";
                                }
                                ?>
                                </datalist>
                            <datalist id="kota">
                                <?php
                                foreach ($kota_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_kota'>";
                                }
                                ?>
                                </datalist>
                            <datalist id="provinsi">
                                <?php
                                foreach ($provinsi_otomatis->result() as $d)
                                {
                                    echo "<option value='$d->nama_provinsi'>";
                                }
                                ?>
                                </datalist>

                            

                            <div class="col-md-3">
                               
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div><br><br>
                                <button type="submit" name="submit" class="btn btn-primary btn-xl " onclick="return confirm('Terima Kasih Data akan kita proses');">DAFTAR</button> &nbsp; &nbsp;
                                <button type="RESET" name="submit" class="btn btn-danger btn-xl">RESET</button>

                            </div>
                        </div>
                    </form>
                    <?php
                      }
                     }
                    }
                ?> 
                    
                </div>
            </div>
        </div>

    </section>

    <!-- Portfolio Grid Section -->
    <section id="pemberitahuan" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Pemberitahuan</h2>
                    <h3 class="section-subheading text-muted">Harap baca dengan seksama</h3>


                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        
                        
                            <div class="row">
                            <div class="col-lg-12 text-center">

                            <?php

                            $query = $this->db->query('SELECT status FROM daftar WHERE NIS_NIM = "'.$this->session->userdata('NIS_NIM').'"');
                            $query1 = $this->db->query('SELECT keterangan FROM daftar WHERE NIS_NIM = "'.$this->session->userdata('NIS_NIM').'"');
                            $row = $query->row();
                            $row1 = $query1->row();
                            if($query->num_rows() == 0){
                                     echo "<h3><center>Maaf Anda <span class='label label-danger'>Belum</span> Mengajukan Praktek Kerja Lapangan (PKL) di Dinas Komunikasi dan Informatika (DISKOMINFO)</center> </h3>";
                            }else{
                                $status = $row->status;

                                $keterangan = $row1->keterangan;
                                if(isset($status) && (isset($keterangan))){ 
                                    if($keterangan=="Selesai PKL" && $status == "Diterima" ){ 
                                        echo "<h3><center>Terima Kasih telah melaksanakan Praktek Kerja Lapangan  <br>   Di Dinas KOMINFO Provinsi Jawa Barat <p><h2><span class='label label-warning'>Silahkan Cetak Surat Keterangan Selesai PKL <br>  </center> </h3></span> "; ?> 
                                        
                                        <h2><div class="col-lg-4"></div><div class="col-lg-4">
                                        <form method="post" action="<?php echo base_url();?>pemberitahuan/cetak_selesai">
                                        <?php $nisnim = $this->session->userdata('NIS_NIM'); ?>
                                        <input type="hidden" align="center" name="nisnim" class="form-control"  value="<?php echo $nisnim; ?>"><center><br>
                                        <button class="btn btn-lg btn-success">&nbsp;&nbsp;<i class="ace-icon fa fa-print bigger-140"></i>&nbsp;&nbsp;Cetak Surat Keterangan<br> Selesai PKL</button> <br> <br>
                                        </div></form></center></h2> <br> 
                                    <?php
                                    }elseif ($status == "Diterima" ){ 
                                      echo "<h3><center>Selamat Anda <span class='label label-success'>Diterima</span> Praktek Kerja Lapangan (PKL) di Dinas Komunikasi dan Informatika (DISKOMINFO) <br><p><h3><span class='label label-warning'>Silahkan Cetak Form Penerimaan PKL untuk melakukan  Daftar Ulang di  <br>    Dinas KOMINFO Prov. Jabar saat dimulainya Praktek Kerja Lapangan</center> </h3></span> ";?> 
                                        <h2><div class="col-lg-4"></div><div class="col-lg-4">
                                        <form method="post" action="<?php echo base_url();?>pemberitahuan/cetak_kartu">
                                        <?php $nisnim = $this->session->userdata('NIS_NIM'); ?>
                                        <input type="hidden" align="center" name="nisnim" class="form-control"  value="<?php echo $nisnim; ?>"><center><br>
                                        <button class="btn btn-lg btn-info"><i class="ace-icon fa fa-print bigger-140"></i>&nbsp;&nbsp;Cetak Form Penerimaan</button> <br> <br></div>
                                        </form></center></h2> <br> 
                                    <?php
                                    }elseif($status == "Ditolak"){
                                        echo "<h3><center>Maaf Anda <span class='label label-danger'>Ditolak</span> Praktek Kerja Lapangan (PKL) di Dinas Komunikasi dan Informatika (DISKOMINFO)</center> </h3>";
                                }else{
                                        echo "<h3><center>Terima kasih telah mendaftar Praktek Kerja Lapangan (PKL) di Dinas Komunikasi dan Informatika (DISKOMINFO), pengajuan Praktek Kerja Lapangan akan segera <span class='label label-warning'> Diproses </span>  </center> </h3>";
                                }
                            }
                        }

                        ?>  

                          
                          </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Profil 
    <section id="profil">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Profil</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
        </div>
    </section>-->


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
    <script src="<?php echo base_url();?>assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>agency/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url();?>agency/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url();?>agency/js/contact_me.js"></script>

    <script src="<?php echo base_url();?>agency/js/bootstrap.js"></script>

    <script src="<?php echo base_url();?>assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dp1').datepicker({ format: "dd-mm-yyyy",
                autoclose:TRUE });
        });

    </script>
    
    <!-- Theme JavaScript -->
    <script src="<?php echo base_url();?>agency/js/agency.min.js"></script>


    <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url();?>assets/plugins/jasny/js/bootstrap-fileupload.js"></script>


    <!-- Memanggil file .js untuk proses autocomplete 
    <script type='text/javascript' src='<?php echo base_url();?>dashgum/js/jquery.autocomplete.js'></script>


    <script type='text/javascript'>
        var site = '<?php echo site_url();?>';
        $(function(){
            $('.autocomplete').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/autocomplete/search',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                }
            });
        });
    </script>-->
        
</body>

</html>
                    