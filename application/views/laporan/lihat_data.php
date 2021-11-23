	<center><h1><strong>Cetak Laporan</strong></h1></center>
	<br><br>
	<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>laporan/tampil_report">

	<table align="center">
		<tr valign="top">
		</tr>
		<tr valign="top">
			<td align="right">Cetak Semua &nbsp;&nbsp;<input type="radio" name="filter_report" value="semua">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input class="form-control" value="Semua Data Peserta PKL" type="text" name="semua" style="margin-bottom:15px;" readonly></td>
		</tr>
		<tr valign="top">
			<td align="right">Sekolah dan Jurusan &nbsp;&nbsp;<input type="radio" name="filter_report" value="instansi">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
			<table>
					<tr>
						<td>
							<select class="form-control col-md-2 col-xs-12" name="instansi" style="margin-bottom:15px;">
				            	<?php
				            		$cb_institusi="";
				                    foreach ($institusi as $institusi){
				                        $cb_institusi.="<option value='$institusi->id_sekolah_perguruantinggi'>$institusi->nama_sekolah_perguruantinggi</option>";
				                    }
				                    echo $cb_institusi;
				            	?>       
							</select>
						</td>
						<td>&nbsp;&nbsp;</td>
						<td>
							<select class="form-control col-md-2 col-xs-12" name="jurusan" style="margin-bottom:15px;">
				            	<?php
				            		$cb_jurusan="";
				                    foreach ($jurusan as $jurusan){
				                        $cb_jurusan.="<option value='$jurusan->id_jurusan'>$jurusan->nama_jurusan</option>";
				                    }
				                    echo $cb_jurusan;
				            	?>       
							</select>
			            </td>
					</tr>
				</table>
			</td>
		</tr>

		<tr valign="top">
			<td align="right">Sekolah/Universitas &nbsp;&nbsp;<input type="radio" name="filter_report" value="instansi1">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
							<select class="form-control col-md-2 col-xs-12" name="instansi1" style="margin-bottom:15px;">
				            	<?php
				            		$cb_institusi1="";
				                    foreach ($institusi1 as $institusi){
				                        $cb_institusi1.="<option value='$institusi->id_sekolah_perguruantinggi'>$institusi->nama_sekolah_perguruantinggi</option>";
				                    }
				                    echo $cb_institusi1;
				            	?>       
							</select>
						</td>
						</tr>

		<tr valign="top">
			<td align="right">Jurusan &nbsp;&nbsp;<input type="radio" name="filter_report" value="jurusan1">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
							<select class="form-control col-md-2 col-xs-12" name="jurusan1" style="margin-bottom:15px;">
				            	<?php
				            		$cb_jurusan1="";
				                    foreach ($jurusan1 as $jurusan){
				                        $cb_jurusan1.="<option value='$jurusan->id_jurusan'>$jurusan->nama_jurusan</option>";
				                    }
				                    echo $cb_jurusan1;
				            	?>       
							</select>
						</td>
						</tr>
		
		<tr valign="top">
			<td align="right">Bagian &nbsp;&nbsp;<input type="radio" name="filter_report" value="bagian">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
			<select class="form-control col-md-2 col-xs-12" name="bagian" style="margin-bottom:15px;">
	            	<?php
	            		$cb_bagian="";
	                    foreach ($bagian as $bagian){
	                        $cb_bagian.="<option value='$bagian->bagian_id'>$bagian->nama_bagian</option>";
	                    }
	                    echo $cb_bagian;
	            	?>       
				</select>
			</td>
		</tr>
		<tr valign="top">
			<td align="right">Pembimbing &nbsp;&nbsp;<input type="radio" name="filter_report" value="pembimbing">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
			<select class="form-control col-md-2 col-xs-12" name="pembimbing" style="margin-bottom:15px;">
	            	<?php
	            		$cb_pembimbing="";
	                    foreach ($pembimbing as $pembimbing){
	                        $cb_pembimbing.="<option value='$pembimbing->nama_pembimbing'>$pembimbing->nama_pembimbing</option>";
	                    }
	                    echo $cb_pembimbing;
	            	?>       
				</select>
			</td>
		</tr>
		<tr valign="top">
			<td align="right">Status &nbsp;&nbsp;<input type="radio" name="filter_report" value="status">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
			<select class="form-control col-md-2 col-xs-12" name="status" style="margin-bottom:15px;">
	            	<?php
	            		$cb_status="";
	                    foreach ($status as $status){
	                        $cb_status.="<option value='$status->status'>$status->status</option>";
	                    }
	                    echo $cb_status;
	            	?>       
				</select>
			</td>
		</tr>

		<tr valign="top">
			<td align="right">Keterangan PKL &nbsp;&nbsp;<input type="radio" name="filter_report" value="keterangan">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
			<select class="form-control col-md-2 col-xs-12" name="keterangan" style="margin-bottom:15px;">
	            	<?php
	            		$cb_keterangan="";
	                    foreach ($keterangan as $keterangan){
	                        $cb_keterangan.="<option value='$keterangan->keterangan'>$keterangan->keterangan</option>";
	                    }
	                    echo $cb_keterangan;
	            	?>       
				</select>
			</td>
		</tr>

		<tr valign="top">
			<td align="right">Provinsi &nbsp;&nbsp;<input type="radio" name="filter_report" value="provinsi">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
			<select class="form-control col-md-2 col-xs-12" name="provinsi" style="margin-bottom:15px;">
	            	<?php
	            		$cb_provinsi="";
	                    foreach ($provinsi as $provinsi){
	                        $cb_provinsi.="<option value='$provinsi->id_provinsi'>$provinsi->nama_provinsi</option>";
	                    }
	                    echo $cb_provinsi;
	            	?>       
				</select>
			</td>
		</tr>

		<tr valign="top">
			<td align="right">Kota &nbsp;&nbsp;<input type="radio" name="filter_report" value="kota">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
			<select class="form-control col-md-2 col-xs-12" name="kota" style="margin-bottom:15px;">
	            	<?php
	            		$cb_kota="";
	                    foreach ($kota as $kota){
	                        $cb_kota.="<option value='$kota->id_kota'>$kota->nama_kota</option>";
	                    }
	                    echo $cb_kota;
	            	?>       
				</select>
			</td>
		</tr>

		<tr valign="top">
			<td align="right">Cetak Pertanggal &nbsp;&nbsp;<input type="radio" name="filter_report" value="pertanggal">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
				<table>
					<tr>
						<td><input class="form-control col-md-2 col-xs-12" type="date" name="tanggal" style="margin-bottom:15px;"></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr valign="top">
			<td align="right">Cetak Perbulan &nbsp;&nbsp;<input type="radio" name="filter_report" value="perbulan"  >&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
				<table>
					<tr>
						<td>
							<select class=" form-control " name="bulan" style="margin-bottom:15px;">
			                    <option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</td>
						<td>&nbsp;&nbsp;</td>
						<td>
							<select class="form-control  " name="tahun_perbulan" style="margin-bottom:15px;">
			                            <?php
			                                $cb_tahun="";
			                                foreach ($tahun as $tahun){
			                                   $cb_tahun.="<option value='$tahun->tahun'>$tahun->tahun</option>";
			                                }
			                                echo $cb_tahun;
			                            ?>
			                </select>
			            </td>
					</tr>
				</table>
            </td>
		</tr>
		<tr valign="top">
			<td align="right">Cetak Pertahun &nbsp;&nbsp;<input type="radio" name="filter_report" value="pertahun">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
				<table>
					<tr>
						<td>
							<select class="form-control col-xs-12" name="pertahun" style="margin-bottom:23px;">
                            <?php
                                $cb_tahun="";
                                foreach ($tahun2 as $tahun){
                                   $cb_tahun.="<option value='$tahun->tahun'>$tahun->tahun</option>";
                                }
                                echo $cb_tahun;
                            ?>
                			</select>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2">
				<button type="reset" class="btn btn-primary btn-lg btn-round btn-line"><i class="glyphicon glyphicon-remove-circle"></i>&nbsp;&nbsp;Reset</button> &nbsp; &nbsp;
                <button type="submit" class="btn btn-success btn-lg btn-round btn-line" name="btnSubmit"><i class="glyphicon glyphicon-print"></i>&nbsp;&nbsp;Cetak</button>
			</td>
		</tr>
	</table>
</form>