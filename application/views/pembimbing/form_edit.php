<center><h1><strong>Edit Data Pembimbing</h3></strong></h1></center>
<br>
<?php
echo form_open('pembimbing/edit');
?>
<input type="hidden" name="NIP" value="<?php echo $record['NIP']?>" >

<table class="table table-hover">
    <tr><th width="260">NIP</th>
        <td><div class="col-sm-8"><input type="text" class="form-control" name="NIP" value="<?php echo $record['NIP']?>" placeholder="NIP" disabled></div>
       </td></tr>
    <tr><th>Nama pembimbing</th>
        <td><div class="col-sm-8"><input type="text" class="form-control"  name="nama_pembimbing" value="<?php echo $record['nama_pembimbing']?>" placeholder="nama pembimbing"></div>
       </td></tr>
    <tr><th>Bagian</th>
    <td><div class="col-sm-8"><select name="bagian" class="form-control" >
                <?php
                foreach ($bagian as $bg)
                {
                    echo "<option value='$bg->bagian_id'";
                    echo $record['bagian_id']==$bg->bagian_id?'selected':'';
                    echo">$bg->nama_bagian</option>";
                }
                ?>
            </select></div>
        </td></tr>
    <tr><td colspan="2"><br>
    <center>
    <a href="<?php echo base_url('pembimbing/');?>" class="btn btn-primary btn-lg btn-round"><i class="glyphicon glyphicon-arrow-left">  </i>&nbsp; Kembali </button>   </a>
     &nbsp; &nbsp; <button type="submit" class="btn btn-success btn-lg btn-round" name="submit"><i class="glyphicon glyphicon-floppy-saved">  </i>&nbsp; Simpan </button>
     </center> </td></tr>
</table>
</form>

