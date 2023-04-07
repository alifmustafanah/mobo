<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">



</head>

<body style="font-family: century gothic;">
	<?php

	function format_rupiah($angka)
	{
		$rupiah = number_format($angka, 0, ',', '.');
		return $rupiah;
	}

	?>
	<style type="text/css">
		body {
			background-color: rgba(0, 0, 0, 0.5);
		}

		page {
			background: white;
			display: block;
			margin: 0 auto;
			margin-bottom: 0.5cm;
			box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
		}

		page[size="A4"] {
			width: 21cm;
			height: 29.7cm;
		}


		@media print {

			#label {
				display: none;
			}



			page[size="A4"] {
				width: 21cm;
				height: 30cm;
			}





		}

		.styled-table {
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 0.9em;
			font-family: century gothic;
			min-width: 700px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}

		.styled-table thead tr {
			background-image: linear-gradient(60deg, #2f00f7 40%, #8f00ff 100%);
			color: #ffffff;
			text-align: left;
		}

		.styled-table th,
		.styled-table td {
			padding: 12px 15px;
		}

		.styled-table tbody tr {
			border-bottom: 1px solid #dddddd;
		}

		.styled-table tbody tr:nth-of-type(even) {
			background-color: #f3f3f3;
		}

		.styled-table tbody tr:last-of-type {
			border-bottom: 2px solid #3721ff;
		}

		.styled-table tbody tr.active-row {
			font-weight: bold;
			color: #3721ff;
		}
	</style>


	<?php
	include "../koneksi.php";

	$data = mysqli_query($koneksi, "SELECT * FROM tbl_penawaran WHERE id_penawaran = $_GET[id_penawaran]");
	$row  = mysqli_fetch_array($data);

	?>

	<page size="A4">
		<div id="label">
			<br>
			<div style="display: flex;justify-content: space-between;width: auto;">
				<div class="text  ">
					<a onclick="window.print()" class="btn btn-info text-right">Print</a>
				</div>
				<div class="text  ">
					<a href="penawaran.php" class="btn btn-info text-right">Kembali</a>
				</div>
			</div>
			<br>
		</div>


		<img src="../assets/header_quotation.jpg" style="width: 794px; height: auto;">
		<br>
		<br>




		<div align="right">
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;Bekasi, <?php echo $row['tgl_penawaran']; ?></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
		</div>
		<table border="0">


			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor </td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['no_penawaran']; ?></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Perihal </td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['prhl_penawaran']; ?></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['cust_penawaran']; ?></td>
			</tr>
		</table>

		<br>
		<br>
		<table>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>
					<p style="font-size: 15px">Dengan hormat,<br>
						PT. MOBOID JET INDONESIA berdedikasi dalam memberikan pelayanan jasa perancangan system aplikasi yang akan mempermudah pekerjaan anda . berikut penawaran dari kami :</p><br>
					<table class="table table-earning">
						<thead>
							<tr>
								<th>No</th>
								<th>Deskripsi</th>
								<th>Harga</th>

							</tr>
						</thead>
						<?php
						$jumlah_item    = 0;
						$id_penawaran   = $_GET['id_penawaran'];
						$data           = mysqli_query($koneksi, "SELECT * FROM tbl_penawaran WHERE id_penawaran=$id_penawaran ");
						$no = 1;
						while ($shihab = mysqli_fetch_array($data)) {
							foreach (json_decode($shihab['ket_penawaran'])->transaksi as $mydata) {
								$jumlah_item = $jumlah_item + $mydata->hrg_penawaran

						?>


								<tbody>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $mydata->des_penawaran; ?></td>
										<td><?php echo number_format($mydata->hrg_penawaran); ?></td>

									</tr>
								</tbody>

						<?php
							}
						}
						?>
						<tr>
							<td colspan="2"> <strong>Jumlah</strong> </td>
							<td>
								<?php echo number_format($jumlah_item); ?>
							</td>
						</tr>
						</tbody>
					</table>
					<br>
					<br>


					<p style="font-size: 15px">Atas perhatian dan kerjasamanya,<br> kami ucapkan terima kasih.</p>
				</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
		</table>

		<br>
		<table border="0">

			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><img src="../assets/ttd.png" style="width: 150px;"></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>Ari Hanggara(CEO)</td>
			</tr>
		</table>
		<br>
		<br>
		<br>

		<img src="../assets/footer.jpg" style="width: 794px;">

	</page>


</body>

</html>