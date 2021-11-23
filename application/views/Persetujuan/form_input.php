<h3>Tambah Data bagian</h3>
<?php
echo form_open('bagian/post');
?>
<table class="table table-bordered">
 	<tr><td width="130">ID</td>
        <td><div class="col-sm-4"><input type="text" name="ID" class="form-control" placeholder="ID"></div>
       </td></tr>
    <tr><td width="130">Nama bagian</td>
        <td><div class="col-sm-4"><input type="text" name="bagian" class="form-control" placeholder="bagian"></div>
       </td></tr>
    <tr><td colspan="2"><button type="submit" class="btn btn-success btn-sm" name="submit"><i class="glyphicon glyphicon-ok-sign"></i>Simpan</button>
        <?php echo anchor('bagian/','Kembali',array('class'=>'btn btn-warning btn-sm'))?>
        </td></tr>
</table>
</form>