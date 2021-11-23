<center><h1><strong>Tambah Data bagian</h3></strong></h1></center>
<br>
<style type="text/css">
        
        p.alert{color: red;}
    </style>
<?php
echo form_open('bagian/post');
?>
<table class="table table-hover">

 	<tr><th>ID</th>
        <td><div class="col-sm-10"><?php echo form_error('ID'); ?><input type="text" name="ID" class="form-control" placeholder="ID" value="<?php echo set_value('ID');?>"></div>
       </td></tr>
    <tr><th>Nama bagian</th>
        <td ><div class="col-sm-10"><?php echo form_error('bagian'); ?><input type="text" name="bagian" class="form-control" placeholder="bagian" value="<?php echo set_value('bagian');?>"></div>
       </td></tr>
    <tr><td colspan="2"><br><center>
    <a href="<?php echo base_url('bagian/');?>" class="btn btn-primary btn-lg btn-round"><i class="glyphicon glyphicon-arrow-left">  </i>&nbsp; Kembali </button>   </a>
     &nbsp; &nbsp; <button type="submit" class="btn btn-success btn-lg btn-round" name="submit"><i class="glyphicon glyphicon-floppy-saved">  </i>&nbsp; Simpan </button>
     </center>
        </td></tr>
</table>
</form>

