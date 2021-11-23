<?php
  
//require(APPPATH.'third_party/fpdf.php'); // file fpdf.php harus diincludekan
require(APPPATH.'third_party/mpdf/mpdf.php');

//$mpdf = new mPDF('utf-8', 'A4-L');
$mpdf = new mPDF('utf-8','A4-L', 0, '', 15, 15, 60, 16, 9, 9, 'L');
$mpdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins

$header = '
<table width="100%" height="221">
	<tr>
		<td width="10%" align="right"><img src="http://localhost/webpklonline/uploads/logo/jabar.png" style="width:150px;height:160px;"></td>
		<td align="center" width="80%">
			<H2><b>PEMERINTAH PROVINSI JAWA BARAT<br>DINAS KOMUNIKASI DAN INFORMATIKA (DISKOMINFO)</b></H2>
			<P style="font-size:18px;">Jalan Tamansari No. 55 Telepon (022) 2502898 Fax. (022) 2511505<br>http://diskominfo.jabaprov.go.id/<br>email : diskominfo@jabarprov.go.id<br>BANDUNG - 40132</P>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<hr>
		</td>
	</tr>
</table>
';

$headerE = '
<table width="100%" height="221">
	<tr>
		<td width="10%" align="right"><img src="http://localhost/webpklonline/uploads/logo/jabar.png" style="width:150px;height:160px;"></td>
		<td align="center" width="80%">
			<H2><b>PEMERINTAH PROVINSI JAWA BARAT<br>DINAS KOMUNIKASI DAN INFORMATIKA (DISKOMINFO)</b></H2>
			<P style="font-size:18px;">Jalan Tamansari No. 55 Telepon (022) 2502898 Fax. (022) 2511505<br>http://diskominfo.jabaprov.go.id/<br>email : diskominfo@jabarprov.go.id<br>BANDUNG - 40132</P>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<hr>
		</td>
	</tr>
</table>
';


$footer = '<div align="center">{PAGENO}</div>';
$footerE = '<div align="center">{PAGENO}</div>';


$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLHeader($headerE,'E');
$mpdf->SetHTMLFooter($footer);
$mpdf->SetHTMLFooter($footerE,'E');


$html = '
<TABLE border="1" style="width:100%;border-collapse: collapse;border:1px solid #3851d0;"  class="bpmTopicC">
  <thead>
   <tr bgcolor="#3851d0" class="headerrow">
    <td align="center" height="30" style="padding:5px;"><span style="color:#fff; font-family:arial;">&nbsp;NO&nbsp;</span></td>
    <td align="center" style="padding:5px;"><span style="color:#fff; font-family:arial;">NIS/NIM</span></td>
    <td align="center" style="padding:5px;"><span style="color:#fff; font-family:arial;">NAMA LENGKAP</span></td>
    <td align="center" style="padding:5px;"><span style="color:#fff; font-family:arial;">SEKOLAH</span></td>
    <td align="center" style="padding:5px;"><span style="color:#fff; font-family:arial;">PROVINSI</span></td>
    <td align="center" style="padding:5px;"><span style="color:#fff; font-family:arial;">KOTA</span></td>
    <td align="center" style="padding:5px;"><span style="color:#fff; font-family:arial;">JURUSAN</span></td>
    <td align="center" style="padding:5px;"><span style="color:#fff; font-family:arial;">STATUS</span></td>
    <td align="center" style="padding:5px;"><span style="color:#fff; font-family:arial;">NAMA PEMBIMBING</span></td>
    <td align="center" style="padding:5px;"><span style="color:#fff; font-family:arial;">BAGIAN</span></td>
    <td align="center" style="padding:5px;"><span style="color:#fff; font-family:arial;">TANGGAL MULAI</span></td>
    <td align="center" style="padding:5px;"><span style="color:#fff; font-family:arial;">TANGGAL SELESAI</span></td>
    <td align="center" style="padding:5px;"><span style="color:#fff; font-family:arial;">KET.</span></td>
   </tr>
  </thead>';
    $no=1;
    $jumlah=0;
    if (count($daftar)>0) {
    foreach ($daftar as $permohonan) 
       $html .="<tr>
                  <td align='center' height='30' style='padding:5px;'>".$no++."</td>
                  <td style='padding:5px;'>".$permohonan->NIS_NIM."</td>
                  <td style='padding:5px;'>".$permohonan->nama_lengkap."</td>
                  <td style='padding:5px;'>".$permohonan->nama_sekolah_perguruantinggi."</td>
                  <td style='padding:5px;'>".$permohonan->nama_provinsi."</td>
                  <td style='padding:5px;'>".$permohonan->nama_kota."</td>
                  <td style='padding:5px;'>".$permohonan->nama_jurusan."</td>
                  <td style='padding:5px;'>".$permohonan->status."</td>
                  <td align='justify' style='padding:5px;'>".$permohonan->nama_pembimbing."</td>
                  <td align='justify' style='padding:5px;'>".$permohonan->nama_bagian."</td>
                  <td align='justify' style='padding:5px;'>".tgl_indo($permohonan->tanggal_mulai)."</td>
                  <td align='justify' style='padding:5px;'>".tgl_indo($permohonan->tanggal_selesai)."</td>
                  <td style='padding:5px;'>".$permohonan->keterangan."</td>
                  
                </tr>";
      }else{
       $html .="<tr>
                  <td colspan=13 align='center' height='80' style='padding:5px;'>DATA YANG DIPILIH TIDAK ADA</td>
                </tr>";

      }
    
$html.='</TABLE>';


$html .= '<BR><BR><BR><table width="100%">
          <tr>
            <td width="75%" colspan="7"></td>
            <td width="25%">
              Bandung,&nbsp;'.(date('d M Y')).'<br>
              Kabid PDE,<br><br><br><br><br><br>
              <b><U>Drs. Kiagus Denny Sopian, M.Si</U></b>
              <b>NIP. 19610329 198703 1 006</b>
            </td>
          </tr>
        </table>';

// LOAD a stylesheet
$mpdf->SetTitle("Laporan Data Praktek Kerja Lapangan");
$mpdf->WriteHTML($html);

$mpdf->Output('Laporan Data PKL.pdf', 'I');

?>