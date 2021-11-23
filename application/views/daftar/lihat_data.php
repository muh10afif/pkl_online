<center><h1><strong>Data Calon Peserta Praktek Kerja Lapangan</strong></h1>
<br>
<style type="text/css">
        table{width: 78%; border:1px solid #000; margin:20px 0 30px 0;}
        table tr th{text-align: center; font-size: 17px; background: white ; border:none; padding:10px;}
        table tr td{padding: 10px;}
    </style>


<a href="<?php echo base_url('daftar/tampil_laporan');?>" class="btn btn-primary btn-lg btn-round" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
</a></center>

<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>
    <th>Operasi</th>
    <th>NO</th>
    <th>NIS/NIM</th>
    <th>Nama Lengkap</th>
    <th>Kota</th>
    <th>Sekolah/Perguruan Tinggi</th>
    <th>Jurusan</th>
    <th>Status</th>
    <th>Alamat</th>
    <th>No HP</th>
    <th>Jenis Kelamin</th>
    <th>Agama</th>
    <th>Alamat Sekolah</th>
    <th>Provinsi</th>
    <th>Tanggal Mulai</th>
    <th>Tanggal Selesai</th>
    </tr>
    </thead>
    <?php $no=1;
    foreach ($record->result() as $r)
    { 
        if($r->status == "Diterima"){
    ?>
        <tr class="success">
            <td>
                <center>        
            <a href="<?php echo base_url()?>daftar/persetujuan/<?php echo $r->NIS_NIM; ?>">
              <button class="btn btn-success btn-round fa tooltips" data-placement="top" data-original-title="Persetujuan"><i class="fa fa-check-circle"></i></button>
              </a>
              
             </center></td>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r->NIS_NIM ?> </td>
            <td><?php echo $r->nama_lengkap ?></td>
            <td><?php echo $r->nama_kota?></td>
            <td><?php echo $r->nama_sekolah_perguruantinggi?></td>
            <td><?php echo $r->nama_jurusan?></td>
            <td><?php echo$r->status?></td>
            <td><?php echo $r->alamat?></td>
            <td><?php echo $r->no_hp?></td>
            
            <td><?php echo $r->jenis_kelamin?></td>
            <td><?php echo $r->agama?></td>
            <td><?php echo $r->alamat_sekolah?></td>
            <td><?php echo $r->nama_provinsi?></td>
            <td><?php echo tgl_indo($r->tanggal_mulai)?></td>
            <td><?php echo tgl_indo($r->tanggal_selesai)?></td>
        </tr>
    <?php
        } elseif($r->status == "Ditolak"){
    ?>
        <tr class="danger">
            <td>
                <center>        
            <a href="<?php echo base_url()?>daftar/persetujuan/<?php echo $r->NIS_NIM; ?>">
              <button class="btn btn-success btn-round fa tooltips" data-placement="top" data-original-title="Persetujuan"><i class="fa fa-check-circle"></i></button>
              </a>
              
             </center></td>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r->NIS_NIM ?> </td>
            <td><?php echo $r->nama_lengkap ?></td>
            <td><?php echo $r->nama_kota?></td>
            <td><?php echo $r->nama_sekolah_perguruantinggi?></td>
            <td><?php echo $r->nama_jurusan?></td>
            <td><?php echo$r->status?></td>
            <td><?php echo $r->alamat?></td>
            <td><?php echo $r->no_hp?></td>
            
            <td><?php echo $r->jenis_kelamin?></td>
            <td><?php echo $r->agama?></td>
            <td><?php echo $r->alamat_sekolah?></td>
            <td><?php echo $r->nama_provinsi?></td>
            <td><?php echo tgl_indo($r->tanggal_mulai)?></td>
            <td><?php echo tgl_indo($r->tanggal_selesai)?></td>
        </tr>
    <?php }else{
    ?>
        <tr class="warning">
            <td>
                <center>        
            <a href="<?php echo base_url()?>daftar/persetujuan/<?php echo $r->NIS_NIM; ?>">
              <button class="btn btn-success btn-round fa tooltips" data-placement="top" data-original-title="Persetujuan"><i class="fa fa-check-circle"></i></button>
              </a>
              
             </center></td>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r->NIS_NIM ?> </td>
            <td><?php echo $r->nama_lengkap ?></td>
            <td><?php echo $r->nama_kota?></td>
            <td><?php echo $r->nama_sekolah_perguruantinggi?></td>
            <td><?php echo $r->nama_jurusan?></td>
            <td><?php echo$r->status?></td>
            <td><?php echo $r->alamat?></td>
            <td><?php echo $r->no_hp?></td>
            
            <td><?php echo $r->jenis_kelamin?></td>
            <td><?php echo $r->agama?></td>
            <td><?php echo $r->alamat_sekolah?></td>
            <td><?php echo $r->nama_provinsi?></td>
            <td><?php echo tgl_indo($r->tanggal_mulai)?></td>
            <td><?php echo tgl_indo($r->tanggal_selesai)?></td>
        </tr>
    <?php
        }
    } ?>
</table>




                  