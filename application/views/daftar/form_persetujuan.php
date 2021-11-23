<center><h1><strong>Form Persetujuan PKL</h3></strong></h1></center>
<br>

<?php echo form_open('daftar/persetujuan');
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
    <tr><th width="130">Pemberitahuan</th>
        <td><div class="col-sm-8">
            <?php   echo form_radio('pemberitahuan','Diterima',TRUE) ?>
            <?php   echo form_label('Diterima'); ?> &nbsp;&nbsp;
            <?php   echo form_radio('pemberitahuan','Ditolak'); ?>
            <?php   echo form_label('Ditolak'); ?>
        </div></td>
        </tr>     
    <tr><th>Nama Pembimbing</th>
        <td><div class="col-sm-8">
            <select name="pembimbing" id="pembimbing" onkeyup="autofill()" class="form-control">
                <?php
                foreach ($pembimbing as $pbg)
                {
                    echo "<option value='$pbg->NIP'>$pbg->nama_pembimbing</option>";
                }
                ?>
            </select></div>
        </td></tr>

        <!--
    <tr><th>Bidang</th>
        <td><div class="col-sm-8">
            <select name="bagian" class="form-control">
                <?php
                foreach ($bagian as $bg)
                {
                    echo "<option value='$bg->bagian_id'>$bg->nama_bagian</option>";
                }
                ?>
            </select></div> </td></tr> -->
    <tr>
    <td colspan="2"><br>
    <center>
    <a href="<?php echo base_url('daftar/');?>" class="btn btn-primary btn-lg btn-round" name="c"><i class="glyphicon glyphicon-arrow-left">  </i>&nbsp; Kembali </button>   </a>
     &nbsp; &nbsp; <button type="submit" class="btn btn-success btn-lg btn-round" name="submit"><i class="glyphicon glyphicon-floppy-saved">  </i>&nbsp; Simpan </button>
     </center> 
    </td></tr> 
</table>
</form>
