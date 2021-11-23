<center><h1><strong>Tambah Data Pembimbing</h3></strong></h1></center>
<br>
<style type="text/css">
        
        p.alert{color: red;}
    </style>

<?php
echo form_open('pembimbing/post');
?>
<table class="table table-hover">

    <tr><th width="260">NIP</th>
        <td><div class="col-sm-8"><?php echo form_error('NIP'); ?><input type="text" class="form-control" name="NIP" placeholder="NIP" value="<?php echo set_value('NIP');?>">
       </td></tr>
    <tr><th>Nama pembimbing</th>
        <td><div class="col-sm-8"><?php echo form_error('nama_pembimbing'); ?><input type="text" class="form-control" name="nama_pembimbing" placeholder="Nama Pembimbing" value="<?php echo set_value('nama_pembimbing');?>">
       </td></tr>
    <tr><th>Bagian</th>
    <td><div class="col-sm-8">
            <select name="bagian" class="form-control">
                <?php
                foreach ($bagian as $bg)
                {
                    echo "<option value='$bg->bagian_id'>$bg->nama_bagian</option>";
                }
                ?>
            </select>
        </td></tr>
    <tr><td colspan="2"><br>
    <center>
    <a href="<?php echo base_url('pembimbing/');?>" class="btn btn-primary btn-lg btn-round"><i class="glyphicon glyphicon-arrow-left">  </i>&nbsp; Kembali </button>   </a>
     &nbsp; &nbsp; <button type="submit" class="btn btn-success btn-lg btn-round" name="submit"><i class="glyphicon glyphicon-floppy-saved">  </i>&nbsp; Simpan </button>
     </center> </td></tr>
</table>
</form>

