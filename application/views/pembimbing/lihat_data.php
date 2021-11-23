<center><h1><strong>Data Pembimbing Dinas Kominfo Jabar</strong></h1>
 <br>

<style type="text/css">
        table{width: 78%; border:1px solid #000; margin:20px 0 30px 0;}
        table tr th{text-align: center; font-size: 18px; background: ; border:none; padding:10px;}
        table tr td{text-align: ; padding: 10px;}
    </style>

&nbsp;&nbsp;
              <a href="<?php echo base_url()?>pembimbing/post/">
              <button class="btn btn-primary btn-lg btn-round fa tooltips" data-placement="top" data-original-title="Tambah Data"><i class="fa fa-plus-square"></i></button> 
              </a>
&nbsp;
              <a href="<?php echo base_url()?>pembimbing/pembimbing_pdf/">
              <button class="btn btn-info btn-lg btn-round fa tooltips" data-placement="top" data-original-title="Cetak Data"><i class="fa fa-print"></i></button>
              </a></center>
<br><br>
<?php echo $this->session->flashdata('pembimbing'); ?>

<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-hover" cellspacing="0" width="100%">
    <thead>
    <tr><th>No</th><th>NIP</th><th>Nama pembimbing</th><th>Bagian</th><th>Operasi</th></tr>
    </thead>
    <?php $no=1;
    foreach ($record->result() as $r)
    { ?>
        <tr>
            <td><center><?= $no++ ?></td>
            <td><center>
                <?php echo$r->NIP ?></td>
            <td><?php echo$r->nama_pembimbing ?></td>
            <td><?php echo$r->nama_bagian ?></td>
            <td>
            <center>
             <a href="<?php echo base_url()?>pembimbing/edit/<?php echo $r->NIP; ?>">
              <button class="btn btn-success btn-round btn sm fa tooltips" data-placement="left" data-original-title="Edit""><i class="fa fa-pencil-square-o"></i></button>
              </a>
             </center>
            </td>
            </tr>
        
    <?php }
    ?>
</table>