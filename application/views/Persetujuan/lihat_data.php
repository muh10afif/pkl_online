<center><h1><strong>Data Persetujuan Peserta Praktek Kerja Lapangan</strong></h1>
<br>
<style type="text/css">
        table{width: 78%; border:1px solid #000; margin:20px 0 30px 0;}
        table tr th{text-align: center; font-size: 17px; border:none; padding:10px;}
        table tr td{text-align: ; padding: 10px;}
    </style>

<a href="<?php echo base_url()?>persetujuan/tampil_laporan" class="btn btn-primary btn-lg btn-round"><i class="fa fa-print"></i>&nbsp; Cetak
</a></center>
             

<table id="datatable-responsive" class="table table-striped dt-responsive nowrap table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>
    <th>NO</th>
    <th>NIS/NIM</th>
    <th>Nama</th>
    <th>Pembimbing</th>
    <th>Tanggal Mulai</th>
    <th>Tanggal Selesai</th>
    <th>Operasi</th>
    <th>Bagian</th>
    <th>Status</th>
    <th>Keterangan</th>
    <th>Sekolah/Perguruan Tinggi</th>
    <th>Jurusan</th>
    <th>Surat Pengantar</th>
    </tr>
    </thead>

    <?php $no=1;
    foreach ($record->result() as $r)
    { 
       if($r->keterangan == "Selesai PKL"){
      ?>
     
       <tr class="success">
            <td><?= $no++ ?></td>
            <td><?php echo$r->NIS_NIM ?></td>
            <td><?php echo$r->nama_lengkap?></td>
            <td><?php echo$r->nama_pembimbing?></td>
            <td><?php echo tgl_indo($r->tanggal_mulai)?></td>
            <td><?php echo tgl_indo($r->tanggal_selesai)?></td>
            <td>
                <center>        
            <a href="<?php echo base_url()?>persetujuan/keterangan/<?php echo $r->NIS_NIM; ?>"  class="btn btn-info btn-round fa tooltips" data-placement="top" data-original-title="Keterangan PKL">
              <i class="fa fa-info"></i>
              </a>
              
             </center></td>
            <td><?php echo$r->nama_bagian?></td>
            <td><?php echo$r->status?></td>
            <td><?php echo$r->keterangan?></td>
            <td><?php echo$r->nama_sekolah_perguruantinggi?></td>
            <td><?php echo$r->nama_jurusan?></td>
            <td><a id="example2" href="<?php echo $r->surat_pengantar;?>"><img src="<?php echo $r->surat_pengantar?>" width="150" /></a></td>
        </tr>
       
    
   
    
        
        <?php }else{
    ?>
    
        <tr class="">
            
            <td><?= $no++ ?></td>
            <td><?php echo$r->NIS_NIM ?></td>
            <td><?php echo$r->nama_lengkap?></td>
            <td><?php echo$r->nama_pembimbing?></td>
            <td><?php echo tgl_indo($r->tanggal_mulai)?></td>
            <td><?php echo tgl_indo($r->tanggal_selesai)?></td>
            <td>
                <center>        
            <a href="<?php echo base_url()?>persetujuan/keterangan/<?php echo $r->NIS_NIM; ?>"  class="btn btn-info btn-round fa tooltips" data-placement="top" data-original-title="Keterangan PKL">
              <i class="fa fa-info"></i>
              </a>
              
             </center></td>
            <td><?php echo$r->nama_bagian?></td>
            <td><?php echo$r->status?></td>
            <td><?php echo$r->keterangan?></td>
            <td><?php echo$r->nama_sekolah_perguruantinggi?></td>
            <td><?php echo$r->nama_jurusan?></td>
            <td><a id="example2" href="<?php echo $r->surat_pengantar;?>"><img src="<?php echo $r->surat_pengantar?>" width="150" /></a></td>
        </tr>
        
        <?php
        }
    } ?>
</table>
