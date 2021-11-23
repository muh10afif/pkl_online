<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title> Sistem Informasi Penerimaan PKL</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>dashgum/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url();?>dashgum/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>dashgum/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>dashgum/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
      function cekform()
      {
        if(!$("#nama").val() && !$("#password").val())
        {
          alert('maaf semua harus diisi dahulu');
          return false;
        }
        else if(!$("#nama").val())
        {
          alert('maaf username tidak boleh kosong');
          $("#nama").focus();
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

  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

    <div id="login-page">
      <div class="container">
      
          <form class="form-login" action="<?php echo base_url('index.php/admin/login');?>" onSubmit="return cekform();" method="post">
            <h2 class="form-login-heading"><img src="<?php echo base_url(); ?>uploads/logo/jabar.png" width="70" height="80">&nbsp;&nbsp;<br><br><strong>Sistem Informasi Penerimaan Praktek Kerja Lapangan DISKOMINFO Prov. JABAR</strong></h2>
            <div class="login-wrap">
            <br>
                <input type="text" name="username" class="form-control" placeholder="Username"  d id="nama">
                <br>
                <input type="password" name="password" class="form-control" placeholder="Password"  id="password">
                <br>
                <br>
                <button class="btn btn-theme btn-block" type="submit" name="submit1"> SIGN IN </button>
                <br>
            </div>
          </form>     
      
      </div>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>dashgum/js/jquery.js"></script>
    <script src="<?php echo base_url();?>dashgum/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url();?>dashgum/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url();?>dashgum/img/baru.jpg", {speed: 500});
    </script>

    <!-- validator -->
    <script src="<?php echo base_url();?>dashgum/validator/validator.js"></script>

    
  </body>
</html>
