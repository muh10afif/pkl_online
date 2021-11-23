<center><h1><strong>Edit Data Bagian</h3></strong></h1></center>
<br>

<?php
echo form_open('bagian/edit');
?>
<input type="hidden" name="idbagian" value="<?php echo $record['bagian_id']?>">


<table class="table table-hover">

    <tr><th>ID</th>
        <td ><div class="col-sm-6"><input type="text" name="ID" placeholder="ID" class="form-control"
                   value="<?php echo $record['ID']?>" readonly></div>
       </td></tr>
    <tr><th>Nama bagian</th>
        <td ><div class="col-sm-6"><input type="text" name="bagian" placeholder="bagian" class="form-control"
                   value="<?php echo $record['nama_bagian']?>"></div>
       </td></tr>
    <tr>
    <td colspan="2"><br>
    <center>
    <a href="<?php echo base_url('bagian/');?>" class="btn btn-primary btn-lg btn-round" name="c"><i class="glyphicon glyphicon-arrow-left">  </i>&nbsp; Kembali </button>   </a>
     &nbsp; &nbsp; <button type="submit" class="btn btn-success btn-lg btn-round" name="submit"><i class="glyphicon glyphicon-floppy-saved">  </i>&nbsp; Simpan </button>
     </center></td>
    </tr>
</table>


</form>

     