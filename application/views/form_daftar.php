<?php
echo form_open('daftar/post');
?>


<table class="table table-bordered"  >
    <tr><td width="250">NIS/NIM</td>
    	  <td><div class="col-sm-8"><input class="form-control" type="text" name="nis/nim" placeholder="NIS/NIM"></div></td>
        </tr>
    <tr><td>Nama Lengkap</td>
        <td><div class="col-sm-8"><input class="form-control" type="text" name="nama" placeholder="Nama Lengkap"></div></td>
    	  </tr>
    <tr><td>Alamat</td>
        <td><div class="col-sm-8"><input class="form-control" type="text" name="alamat" placeholder="Alamat"></div></td>
    	  </tr>
    <tr><td>Jenis Kelamin</td>
       	<td><div class="col-sm-8">
          <?php 	echo form_radio('jenis_kelamin','P',TRUE) ?>
       		<?php 	echo form_label('Laki-Laki');	?>
       		<?php  	echo form_radio('jenis_kelamin','W'); ?>
       		<?php 	echo form_label('Perempuan');	?>
       	</div></td>
    	  </tr>    	
    <tr><td>Agama</td>
    	  <td><div class="col-sm-8">
          <?php $agama = array ('Pilih'=>'Pilih','Islam'=>'Islam','Kristen'=>'Kristen','Hindu'=>'Hindu','Budha'=>'Budha');	
    		echo form_dropdown('agama',$agama,' ', array ('class'=>'form-control')); ?>  
        </div></td></tr>
    <tr><td>Sekolah/Perguruan Tinggi</td>
    	  <td><div class="col-sm-8"><input class="form-control" type="text" name="sekolah" placeholder="Sekolah/PerguruanTinggi"></div></td></tr>
    <tr><td>Alamat Sekolah</td>
        <td><div class="col-sm-8"><input class="form-control" type="text" name="alamat_sekolah" placeholder="Alamat Sekolah">
        </div></td>
    	  </tr>
    <tr><td>Jurusan</td>
    	  <td><div class="col-sm-8"><input class="form-control" type="text" name="Jurusan" placeholder="Jurusan"></div></td></tr>
    <tr><td>E-mail</td>
    	  <td><div class="col-sm-8"><input class="form-control" type="text" name="E-mail" placeholder="E-mail"></div></td></tr>
    <tr><td>No Hp</td>
    	  <td><div class="col-sm-8"><input class="form-control" type="text" name="NoHp" placeholder="NoHp"></div></td></tr>
    <tr><td>Tanggal Mulai</td>
        <td><div class="col-sm-8"><input class="form-control" type="date" name="mulai"></td></tr>
    <tr><td>Tanggal Selesai</td>
        <td><div class="col-sm-8"><input class="form-control" type="date" name="selesai"></td></tr>
    <tr><td></td>
    	  <td>
    		<button type="reset" class="btn btn-danger" name="submit">Reset</button>
    		<button type="submit" class="btn btn-primary" name="submit">Daftar</button>
    	  </td></tr>
</table>

</form>