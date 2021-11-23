	<center><h1><strong>Cetak Laporan Rekap Data</strong></h1></center>

	<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>index.php/laporan_rekap/tampil_report">
	<br><br>
	<table align="center">
		<tr valign="top">
		</tr>
		<!--
		<tr valign="top">
			<td align="right">Cetak Semua <input type="radio" name="filter_report" value="semua">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input class="form-control" value="Semua Data Peserta PKL" type="text" name="semua" style="margin-bottom:15px;" readonly></td>
		</tr>-->
		<tr valign="top">
			<td align="right">Rekap Data Perbulan <input type="radio" name="filter_report" value="perbulan"  >&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
				<table>
					<tr>
						<td>
							<select class=" form-control " name="pilihan_bulan" style="margin-bottom:15px;">
								<option value="" selected>Berdasarkan</option>
								<option value="status">Status</option>
								<option value="keterangan">Keterangan</option>
								<option value="bagian">Bagian</option>
								<option value="pembimbing">Pembimbing</option>
								<option value="sekolah">Sekolah/Universitas</option>
								<option value="jurusan">Jurusan</option>
								<option value="kota">Kota</option>
								<option value="provinsi">Provinsi</option>
							</select>
						</td>
						<td>&nbsp;&nbsp;</td>
						<td>
							<select class=" form-control " name="bulan_bulan" style="margin-bottom:15px;">
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
							<select class="form-control  " name="tahun_bulan" style="margin-bottom:15px;">
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
			<td align="right">Rekap Data Pertahun <input type="radio" name="filter_report" value="pertahun">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
				<table>
					<tr>
						<td>
							<select class=" form-control " name="pilihan_tahun" style="margin-bottom:15px;">
								<option value="" selected>Berdasarkan</option>
								<option value="status">Status</option>
								<option value="keterangan">Keterangan</option>
								<option value="bagian">Bagian</option>
								<option value="pembimbing">Pembimbing</option>
								<option value="sekolah">Sekolah/Universitas</option>
								<option value="jurusan">Jurusan</option>
								<option value="kota">Kota</option>
								<option value="provinsi">Provinsi</option>
							</select>
						</td>
						<td>&nbsp;&nbsp;</td>
						<td>
							<select class="form-control  " name="tahun_tahun" style="margin-bottom:15px;">
			                            <?php
			                                $cb_tahun="";
			                                foreach ($tahun2 as $tahun2){
			                                   $cb_tahun.="<option value='$tahun2->tahun'>$tahun2->tahun</option>";
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
			<td align="center" colspan="2">	<br><br>
				<button type="reset" class="btn btn-primary btn-lg btn-round btn-line"><i class="glyphicon glyphicon-remove-circle"></i>&nbsp;&nbsp;Reset</button> &nbsp; &nbsp;
                <button type="submit" class="btn btn-success btn-lg btn-round btn-line" name="btnSubmit"><i class="glyphicon glyphicon-print"></i>&nbsp;&nbsp;Cetak</button>
			</td>
		</tr>
	</table>
</form>