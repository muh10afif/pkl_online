<h3>Data Pengajuan Peserta PKL</h3>
    <style type="text/css">
        table{width: 78%; border:1px solid #000; margin:20px 0 30px 0; }
        table tr th{text-align: center; font-size: 9px; background: #efefef; border:none; padding:10px;}
        table tr td{ padding: 10px;}
    </style>

<hr>
<table class="table table-bordered">
                                    <tr>
                                    <th>No</th>
                                    <th>NIS/NIM</th>
                                    <th>Nama</th>
                                    <th>Sekolah/Perguruan Tinggi</th>
                                    <th>Jurusan</th><th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Status</th>
                                    <th>Pembimbing</th>
                                    <th>Bagian</th>
                                    </tr>
                                    <?php
                                    $no=1+$this->uri->segment(3);
                                    foreach ($record->result() as $r)
                                    { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo$r->NIS_NIM ?></td>
                                            <td><?php echo$r->nama_lengkap ?></td>
                                            <td><?php echo$r->sekolah_universitas ?></td>
                                            <td><?php echo$r->jurusan ?></td>
                                            <td><?php echo$r->tanggal_mulai ?></td>
                                            <td><?php echo$r->tanggal_selesai ?></td>
                                            <td><?php echo$r->status ?></td>
                                            <td><?php echo$r->pembimbing ?></td>
                                            <td><?php echo$r->bidang ?></td>
                                            </tr>
                                    <?php }
                                    ?>
                                </table>
<?php
echo $paging;
?>


