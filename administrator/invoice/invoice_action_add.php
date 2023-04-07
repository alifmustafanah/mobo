<?php
include '../../koneksi.php';

$ID_I    = $_POST['ID_I'];
$TGL1_I    = $_POST['TGL1_I'];
$TGL2_I    = $_POST['TGL2_I'];
$PRHL_I    = $_POST['PRHL_I'];
$CUST_I    = $_POST['CUST_I'];

$DES1_I    = $_POST['DES1_I'];
$HRG1_I    = $_POST['HRG1_I'];
$DES2_I    = $_POST['DES2_I'];
$HRG2_I    = $_POST['HRG2_I'];
$DES3_I    = $_POST['DES3_I'];
$HRG3_I    = $_POST['HRG3_I'];
$DES4_I    = $_POST['DES4_I'];
$HRG4_I    = $_POST['HRG4_I'];
$DP_I    = $_POST['DP_I'];

$TAC1_I    = $_POST['TAC1_I'];
$TAC2_I    = $_POST['TAC2_I'];
$TAC3_I    = $_POST['TAC3_I'];
$TAC4_I    = $_POST['TAC4_I'];

$STS_I    = $_POST['STS_I'];


//-----------------------------------------
$array      = array();

$array[] = "id_invoice 		 = '$ID_I'";
$array[] = "date_invoice 	 = '$TGL1_I'";
$array[] = "due_date_invoice = '$TGL2_I'";
$array[] = "prhl_invoice 	 = '$PRHL_I'";
$array[] = "cust_invoice 	 = '$CUST_I'";

$array[] = "des1_invoice	 = '$DES1_I'";
$array[] = "hrg1_invoice	 = '$HRG1_I'";
$array[] = "des2_invoice	 = '$DES2_I'";
$array[] = "hrg2_invoice	 = '$HRG2_I'";
$array[] = "des3_invoice	 = '$DES3_I'";
$array[] = "hrg3_invoice	 = '$HRG3_I'";
$array[] = "des4_invoice	 = '$DES4_I'";
$array[] = "hrg4_invoice	 = '$HRG4_I'";
$array[] = "dp_invoice	 	 = '$DP_I'";

$array[] = "tac1_invoice	 = '$TAC1_I'";
$array[] = "tac2_invoice	 = '$TAC2_I'";
$array[] = "tac3_invoice	 = '$TAC3_I'";
$array[] = "tac4_invoice	 = '$TAC4_I'";

$array[] = "sts_invoice		 = '$STS_I'";


//-----------------------------------------
$value = implode(",", $array);
$query = "INSERT INTO tbl_invoice SET $value";
mysqli_query($koneksi, $query) or die("GAGAL UPLOAD" . mysqli_error($koneksi));
header("location:invoice_view.php?id='$ID_I'");
