<?php                
require 'config.php'; 
include_once('tcpdf_6_2_13/tcpdf/tcpdf.php');

$id=$_GET['id'];

$contrat_query = "SELECT name1, name2, PRIX FROM contrat1 WHERE id='".$id."' ";             
$contrat_results = mysqli_query($conn,$contrat_query);   
$count = mysqli_num_rows($contrat_results);   
if($count>0) 
{
	$contrat_data_row = mysqli_fetch_array($contrat_results, MYSQLI_ASSOC);

	//----- Code for generate pdf
	$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);  
	//$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
	$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	$pdf->SetDefaultMonospacedFont('helvetica');  
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	$pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
	$pdf->setPrintHeader(false);  
	$pdf->setPrintFooter(false);  
	$pdf->SetAutoPageBreak(TRUE, 10);  
	$pdf->SetFont('helvetica', '', 12);  
	$pdf->AddPage(); //default A4
	//$pdf->AddPage('P','A5'); //when you require custome page size 
	
	$content = ''; 

	$content .= '
<style type="text/css">
	body{
	font-size:12px;
	line-height:24px;
	font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
	color:#000;
	}
	</style>    
	<table cellpadding="0" cellspacing="0" style="border:1px solid #ddc;width:100%;">
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="2" align="center"><b>partenariat link </b></td></tr>
	<tr><td colspan="2"><b>Marque : '.$contrat_data_row['name1'].' </b></td></tr>
	<tr><td><b>Influenceur: '.$contrat_data_row['name2'].' </b></td><td align="right"><b>DATE: '.date("d-m-Y").'</b> </td></tr>
	<tr><td>&nbsp;</td><td align="right"><b>prix: '.$contrat_data_row['PRIX'].'</b></td></tr>
	<tr><td colspan="2" align="center"><b>SIGNATURE</b></td></tr>	
	</table>
'; 

$pdf->writeHTML($content);

$file_location = "/home/fbi1glfa0j7p/public_html/examples/generate_pdf/uploads/"; //add your full path of your server
//$file_location = "/opt/lampp/htdocs/examples/generate_pdf/uploads/"; //for local xampp server

$datetime=date('dmY_hms');
$file_name = "INV_".$datetime.".pdf";
ob_end_clean();

if($_GET['ACTION']=='DOWNLOAD')
{
	$pdf->Output($file_location.$file_name, 'D'); // D means download
}

}
else
{
	echo 'Record not found for PDF.';
}?>
