<!DOCTYPE html>
<html>

<head>
	<title></title>
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
			background: rgb(204, 204, 204);
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
			height: 31.2cm;
		}

		@media print {

			body,
			page {
				margin: 0;
				box-shadow: 0;
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

	$data = mysqli_query($koneksi, "SELECT * FROM tbl_invoice WHERE id_invoice = $_GET[id]");
	$row  = mysqli_fetch_array($data);
	?>

	<center>
		<h2><a href="invoice_print.php" style="height:800px;
	width:900px;
	background:blue;
	border-radius:360px; color: white; ">&nbsp;&nbsp;Simpan&nbsp;&nbsp;</a></h2>
		<h2><a href="invoice.php" style="height:800px;
	width:900px;
	background:green;
	border-radius:360px; color: white; ">&nbsp;&nbsp;Kembali&nbsp;&nbsp;</a></h2>
	</center>

	<page size="A4">

		<img src="../assets/header.jpg" style="width: 794px;">




		<table border="0">
			<tr>
				<td rowspan="3">
					<h3 style="color:#6d6d6d; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO</h3>
				</td>
				<td rowspan="3">
					<h3>&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['cust_invoice']; ?></h3>
				</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
				<td>No</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['id_invoice']; ?></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
				<td>Date </td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['date_invoice']; ?></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
				<td>Due date</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['due_date_invoice']; ?></td>
			</tr>
		</table>


		<table>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

				<td>

					<p style="font-size: 20px"><?php echo $row['prhl_invoice']; ?></p>
					<table class="styled-table">
						<thead>
							<tr>
								<th>No</th>
								<th>Deskripsi</th>
								<th>Harga</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td><?php echo $row['des1_invoice']; ?></td>
								<td><?php echo format_rupiah($row['hrg1_invoice']); ?></td>
							</tr>
							<tr>
								<td>2</td>
								<td><?php echo $row['des2_invoice']; ?></td>
								<td><?php echo format_rupiah($row['hrg2_invoice']); ?></td>
							</tr>
							<tr>
								<td>3</td>
								<td><?php echo $row['des3_invoice']; ?></td>
								<td><?php echo format_rupiah($row['hrg3_invoice']); ?></td>
							</tr>
							<tr>
								<td>4</td>
								<td><?php echo $row['des4_invoice']; ?></td>
								<td><?php echo format_rupiah($row['hrg4_invoice']); ?></td>
							</tr>
							<tr class="active-row">
								<td colspan="2">Sub Total</td>
								<td>
									<?php
									$a  = $row['hrg1_invoice'];
									$b  = $row['hrg2_invoice'];
									$c  = $row['hrg3_invoice'];
									$d  = $row['hrg4_invoice'];
									$st = $a + $b + $c + $d;
									echo format_rupiah($st);
									?>
								</td>
							</tr>
							<tr>
								<td colspan="2">DP </td>
								<td><?php echo format_rupiah($row['dp_invoice']); ?></td>
							</tr>
							<tr>
								<td colspan="2">Grand Total</td>
								<td>
									<?php
									$e  = $row['dp_invoice'];
									$gt = $st - $e;
									echo format_rupiah($gt);
									?>
								</td>
							</tr>
							<!-- and so on... -->
						</tbody>
					</table>

		</table>
		<table border="0" style="font-size: 15px;">
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>Payment Info </td>
				<td>:</td>

			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>Account </td>
				<td>: 15600-11399-369</td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>A/C </td>
				<td>: Ari Hanggara</td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>Bank Name </td>
				<td>: Mandiri</td>
			</tr>


			</tr>
		</table>


		<table border="0">

			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td colspan="6">
					<p>Terms and Condition</p>
					<?php echo $row['tac1_invoice']; ?> <br>
					<?php echo $row['tac2_invoice']; ?> <br>
					<?php echo $row['tac3_invoice']; ?> <br>
					<?php echo $row['tac4_invoice']; ?> <br>
				</td>

				<td><img src="../assets/ttd.png" style="width: 200px;"></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>Ari Hanggara<br>(CEO MOBOID)</td>
			</tr>
		</table>
		<br>
		<br>
		<br>

		<img src="../assets/footer.jpg" style="width: 794px;">
		<hr>

		<hr>
		<br>
		<br>
	</page>

</body>

</html>