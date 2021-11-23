                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <img class="img-responsive" src="<?php echo base_url('uploads/logo/Laporan.png');?>">
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-file"></i> Laporan
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <?php echo form_open_multipart(base_url("index.php/Laporan/kategori_perbulan")); ?>
                        <table>
                            <tr>
                                <th> Pilih Tanggal</th>
                                <td>&nbsp;</td>
                                <td>
                                    <select name="bulan" class="form-control">
                                        <option value="" selected >Bulan</option>
                                        <?php for($i=1; $i<10; $i++){ 
                                            echo "<option value='0$i'>0$i</option>";
                                        }; ?>
                                        <?php for($i=10; $i<13; $i++){ 
                                            echo "<option value='$i'>$i</option>";
                                        }; ?>       
                                    </select>
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <select name="tahun" class="form-control">
                                        <option value="" selected >Tahun</option>
                                        <?php for($i=2010; $i<2017; $i++){ 
                                            echo "<option value='$i'>$i</option>";
                                        };
                                        ?>       
                                    </select>
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <button type="submit" name="tmblSubmit" class="btn btn-success"><strong><i class="fa fa-eye"></i>&nbsp;Tampil</strong></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo '<a class="btn btn-primary" href="'.base_url().'index.php/laporan/pdf_kategori_perbulan/'.$bulan.'/'.$tahun.'"><strong><i class="fa fa-print"></i>&nbsp;Cetak</strong></a>'; ?>
                                    
                                </td>
                            </tr>
                        </table>
                        <?php form_close(); ?>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Laporan PerKategori Perbulan</h4>
                        <?php 
                        if(isset($tanggal)){
                           // if ($tanggalawal==$tanggalakhir) {
                                echo "<h5> Per ".$tanggal."</h5>";
                            //} else {
                             //   echo "<h5> Per Tanggal ".$tanggalawal." Sampai ".$tanggalakhir."</h5>";
                        } else {
                        echo "<h5> Per Bulan ".date('m')." Tahun ".date('Y')."</h5>";
                        }
                        ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Total Views</th>
                                        <th>Total Likes</th>
                                    </tr>
                                </thead>
                                <?php
                                if (!empty($record)) {
                                foreach ($record as $row) {
                                 ?>
                                <tr>
                                    <td><?php echo $row['kategori'];?></td>
                                    <td><?php echo $row['views'];?></td>
                                    <td><?php echo $row['likes'];?></td>
                                </tr>
                                <?php } }?>
                            </table>
                        </div>
                    </div>
                </div>