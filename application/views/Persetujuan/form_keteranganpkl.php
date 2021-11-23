<center><h1><strong>Form Keterangan Selesai PKL</h3></strong></h1></center>
<br>

<?php echo form_open('persetujuan/keterangan');
?>

<input type="hidden" value="<?php echo $record['NIS_NIM']?>" name="nis/nim" >

<table class="table table-hover">
    <tr><th width="300">NIS/NIM</th>
          <td><div class="col-sm-8"><?php echo $record['NIS_NIM']?></div></td>
        </tr>
    <tr><th>Nama Lengkap</th>
        <td><div class="col-sm-8"><?php echo $record['nama_lengkap']?></div></td>
          </tr>
    <tr><th>Tanggal Mulai</th>
          <td><div class="col-sm-8"><?php echo tgl_indo ($record['tanggal_mulai'])?></div></td></tr>
    <tr><th>Tanggal Selesai</th>
          <td><div class="col-sm-8"><?php echo tgl_indo ($record['tanggal_selesai'])?></div></td></tr>
    <tr><th width="130">Keterangan PKL</th>
        <td><div class="col-sm-8">
            <?php   echo form_radio('keterangan','Selesai PKL',TRUE) ?>
            <?php   echo form_label('Sudah Selesai PKL'); ?> &nbsp;&nbsp;
            <?php   echo form_radio('keterangan','Belum selesai PKL'); ?>
            <?php   echo form_label('Belum Selesai PKL'); ?>
        </div></td>
        </tr>     
   
    <td colspan="2"><br>
    <center>
    <a href="<?php echo base_url('persetujuan/');?>" class="btn btn-primary btn-lg btn-round" name="c"><i class="glyphicon glyphicon-arrow-left">  </i>&nbsp; Kembali </button>   </a>
     &nbsp; &nbsp; <button type="submit" class="btn btn-success btn-lg btn-round" name="submit"><i class="glyphicon glyphicon-floppy-saved">  </i>&nbsp; Simpan </button>
     </center> 
    </td></tr> 
</table>
</form>
