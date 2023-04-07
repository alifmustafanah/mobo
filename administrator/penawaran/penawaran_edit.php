<!DOCTYPE html>
<html>

<head>
	<title></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body style="font-family: century gothic;">
	<style type="text/css">
		body {
			background-color: #ffffff;
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

	$data = mysqli_query($koneksi, "SELECT * FROM tbl_penawaran WHERE id_penawaran = $_GET[id_penawaran]");
	$row  = mysqli_fetch_array($data);

	?>

	<form method="post" action="penawaran_action_edit.php" enctype="multipart/form-data">
		<page size="A4">
			<div id="label" style="background-color: #ffffff;">
				<br>
				<div style="display: flex;justify-content: space-between;width: auto;">
					<div class="text text-center  ">
						<p></p>
					</div>
					<div class="text text-center  ">
						<a href="penawaran.php" class="btn btn-info btn-block text-left">Kembali</a>
					</div>
				</div>
				<br>
			</div>

			<img src="../assets/header.jpg" style="width: 794px; height: 220px">
			<br>
			<br>


			<div align="right">
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;Tanggal :</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" value="<?php echo $row['tgl_penawaran'] ?>" name="tgl_penawaran" placeholder="24-10-2021"></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
			</div>
			<table border="0">


				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor </td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" value="<?php echo $row['no_penawaran'] ?>" name="no_penawaran" placeholder="QM-001-2021"></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Perihal </td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" value="<?php echo $row['prhl_penawaran'] ?>" name="prhl_penawaran" placeholder="System HRD"></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" value="<?php echo $row['cust_penawaran'] ?>" name="cust_penawaran" placeholder="PT.ABC"></td>
				</tr>
			</table>

			<br>
			<br>
			<table>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<p style="font-size: 15px">Dengan hormat,<br>
							Dengan ini kami kirimkan penawaran harga untuk pelayanan jasa system development sesuai kebutuhan anda, Berikut penawaran dari kami :</p><br>

						<!-- membuat form  -->
						<!-- gunakan tanda [] untuk menampung array  -->
						<input type="hidden" value="<?php echo $row['id_penawaran']; ?>" name="id_penawaran" class="form-control">

						<?php
						$jumlah_item    = 0;
						$id_penawaran   = $_GET['id_penawaran'];
						$data           = mysqli_query($koneksi, "SELECT * FROM tbl_penawaran WHERE id_penawaran=$id_penawaran ");
						$no = 1;
						while ($shihab = mysqli_fetch_array($data)) {
							foreach (json_decode($shihab['ket_penawaran'])->transaksi as $mydata) {
								$jumlah_item = $jumlah_item + $mydata->hrg_penawaran

						?>

								<div class="control-group after-add-more">
									<label>Deskripsi</label>
									<input type="text" value="<?php echo $mydata->des_penawaran; ?>" name="des_penawaran[]" class="form-control">
									<br>
									<label>Harga</label>
									<input type="number" value="<?php echo $mydata->hrg_penawaran; ?>" id="uang1" name="hrg_penawaran[]" class="form-control">
									<br>

									<hr>
								</div>
								<br>

						<?php
							}
						}
						?>

						<button class="btn btn-success btn-block" type="submit">Submit</button>



						<!-- class hide membuat form disembunyikan  -->
						<!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
						<div class="copy hide">
							<div class="control-group">
								<label>Deskripsi</label>
								<input type="text" name="des_penawaran[]" class="form-control">
								<br>
								<label>Harga</label>
								<input type="number" id="uang1" name="hrg_penawaran[]" class="form-control">

								<br>
								<br>
								<button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
								<hr>

							</div>
						</div>

						<p style="font-size: 15px">Atas perhatian dan kerjasamanya,<br> kami ucapkan terima kasih.</p>
					</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
			</table>


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
			<hr>

			<br>
		</page>
	</form>

	<script>
		$(document).ready(function() {
			$(".add-more").click(function() {
				var html = $(".copy").html();
				$(".after-add-more").after(html);
			});

			// saat tombol remove dklik control group akan dihapus 
			$("body").on("click", ".remove", function() {
				$(this).parents(".control-group").remove();
			});
		});
	</script>
</body>

</html>