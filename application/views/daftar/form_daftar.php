<h2><center><strong> Data Pendaftar Calon Peserta PKL </strong></center></h2>
</br>
<?php
echo form_open('webpkl/post');
?>


<table class="table table-bordered"  >
    <tr><td width="250">NIS/NIM</td>
    	  <td><div class="col-sm-8"><input class="form-control" type="text" name="nis/nim" placeholder="NIS/NIM"></div></td>
        </tr>
    <tr><td>Nama Lengkap</td>
        <td><div class="col-sm-8"><input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" </div></td>
    	  </tr>
    <tr><td>Alamat</td>
        <td><div class="col-sm-8"><textarea class="form-control" name="alamat" placeholder="Alamat" cols="35" rows="4"></textarea> </div></td>
    	  </tr>
    <tr><td>Jenis Kelamin</td>
       	<td><div class="col-sm-8">
            <?php 	echo form_radio('jenis_kelamin','L',TRUE) ?>
       		<?php 	echo form_label('Laki-Laki');	?>
       		<?php  	echo form_radio('jenis_kelamin','P'); ?>
       		<?php 	echo form_label('Perempuan');	?>
       	</div></td>
    	  </tr>    	
    <tr><td>Agama</td>
    	  <td><div class="col-sm-8">
          <?php $agama = array ('Pilih Agama'=>'Pilih Agama','Islam'=>'Islam','Kristen'=>'Kristen','Hindu'=>'Hindu','Budha'=>'Budha');	
    		echo form_dropdown('agama',$agama,' ', array ('class'=>'form-control')); ?>  
        </div></td></tr>
    <tr><td>Sekolah/Perguruan Tinggi</td>
    	  <td><div class="col-sm-8"><input class="form-control" type="text" name="sekolah" placeholder="Sekolah/PerguruanTinggi"></div></td></tr>
    <tr><td>Alamat Sekolah</td>
        <td><div class="col-sm-8"><textarea class="form-control" name="alamat_sekolah" placeholder="Alamat Sekolah" cols="35" rows="4"></textarea> 
        </div></td>
    	  </tr>
    <tr><td>Jurusan</td>
    	  <td><div class="col-sm-8"><input class="form-control" type="text" name="Jurusan" placeholder="Jurusan"></div></td></tr>
    <tr><td>E-mail</td>
    	  <td><div class="col-sm-8"><input class="form-control" type="text" name="Email" placeholder="E-mail"></div></td></tr>
    <tr><td>No Hp</td>
    	  <td><div class="col-sm-8"><input class="form-control" type="text" name="NoHp" placeholder="NoHp"></div></td></tr>
    <tr><td>Tanggal Mulai</td>
        <td><div class="col-sm-8"><input class="form-control" type="text" name="mulai" value="dd/mm/yyyy"></td></tr>
    <tr><td>Tanggal Selesai</td>
        <td><div class="col-sm-8"><input class="form-control" type="text" name="selesai" value="dd/mm/yyyy"></td></tr>
    <tr><td></td>
    	  <td>
            <button type="submit" class="btn btn-primary" name="submit" >Daftar</button>
    		<button type="reset" class="btn btn-danger" name="submit" > Reset</button>
    		
    	  </td></tr>
</table>

<?php
echo form_close();
?>
