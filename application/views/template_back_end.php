<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sistem Informasi Penerimaan PKL</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>dashgum/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url();?>dashgum/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dashgum/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dashgum/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dashgum/lineicons/style.css">   

    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>dashgum/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>dashgum/css/style-responsive.css" rel="stylesheet">

    <script src="<?php echo base_url();?>dashgum/js/chart-master/Chart.js"></script>

    <!--<link href="<?php echo base_url();?>assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />-->



    <!-- Datatables -->
    <link href="<?php echo base_url();?>dashgum/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>dashgum/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>dashgum/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>dashgum/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">


    <link href="<?php echo base_url();?>assets/plugins/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" />
      
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/social-buttons/social-buttons.css" />



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>


  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?php echo base_url();?>" class="logo"><b>Sistem Informasi Penerimaan PKL DISKOMINFO JABAR</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo base_url('admin/logout/');?>"><i class="glyphicon glyphicon-off"> </i>&nbsp;&nbsp;<strong>K E L U A R</strong></a></li>
                    
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="<?php echo base_url();?>dashgum/img/jabar.png" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php echo $this->session->userdata('username'); ?></h5>
                    
                  <li class="mt">
                      <a  href="<?php echo base_url('dashboard_admin/');?>">
                          <i class="fa fa-home"></i>
                          <span>Beranda</span>
                      </a>
                  </li>

                  <li class="sub">
                      <a href="<?php echo base_url('daftar/');?>" >
                          <i class="fa fa-inbox" ></i>
                          <span>Pendaftar PKL</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-folder"></i>
                          <span>Data</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url('bagian/');?>">Bagian</a></li>
                          <li><a  href="<?php echo base_url('pembimbing/');?>">Pembimbing</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="<?php echo base_url('persetujuan/');?>" >
                          <i class="fa fa-check-square"></i>
                          <span>Persetujuan PKL</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-file-pdf-o"></i>
                          <span>Cetak</span>
                      </a>
                    <ul class="sub">
                          <li><a href="<?php echo base_url('laporan/');?>" >Laporan</a></li>
                          <li><a href="<?php echo base_url('laporan_rekap/');?>" >Laporan Rekap Data</a></li>
                    </ul>
                  </li>

                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                          <div class="form-group">
                                <?php echo $contents; ?>
                          </div>
                      </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>dashgum/js/jquery.js"></script>
    <script src="<?php echo base_url();?>dashgum/js/jquery-1.8.3.min.js"></script>
    
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="<?php echo base_url();?>dashgum/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url();?>dashgum/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url();?>dashgum/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>dashgum/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>dashgum/js/jquery.sparkline.js"></script>
    
    <!--common script for all pages-->
    <script src="<?php echo base_url();?>dashgum/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url();?>dashgum/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>dashgum/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="<?php echo base_url();?>dashgum/js/sparkline-chart.js"></script>    
	<script src="<?php echo base_url();?>dashgum/js/zabuto_calendar.js"></script>	

 
     <script src="<?php echo base_url();?>assets/plugins/jquery.fancybox-1.3.4/fancybox/jquery.mousewheel-3.0.4.pack.js"></script> 
    <script src="<?php echo base_url();?>assets/plugins/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.js"></script>
     <script src="<?php echo base_url();?>assets/js/image_gallery.js"></script>
    

        <script src="<?php echo base_url(); ?>dashgum/build/js/custom.js"></script>

   <!-- <script src="<?php echo base_url();?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script> -->

    <!-- Datatables -->
    <script src="<?php echo base_url();?>dashgum/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>dashgum/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>dashgum/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>dashgum/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url();?>dashgum/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>

    <script src="<?php echo base_url();?>dashgum/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->


        <script type="text/javascript">
            function autofill(){
                var pembimbing = $("#pembimbing").val();
                $.ajax({
                   url : 'autofill-ajax.php',
                   data : 'nim='+nim,
               }).success(function(data){
                   var json = data,
                   obj = JSON.parse(json);
                   $("#nama").val(obj.nama);
                   $("#jurusan").val(obj.jurusan);
               });
            }    
        </script>
  

  </body>
</html>
