<!DOCTYPE html>
<html>

<head>

	<?php include '../template/css.php'; ?>
</head>

<body>

	<?php
	include "../koneksi.php";
	$no = 1;
	$data = mysqli_query($koneksi, " select 
		id_user,
		username,
		password,
		status,
		tgl_join,
		level



		from 
		tbl_user
		where id_user = $_GET[id]");
	$row = mysqli_fetch_array($data);

	?>





	<form class="form-horizontal" action="pengguna_edit_action.php" method="post">
		<div class="box-body">
			<div class="form-group">
				&nbsp;&nbsp; &nbsp;&nbsp;<label for="inputEmail3" class="col-sm-13 control-label">Username</label>
				<input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
				<div class="col-sm-4">
					<input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?> " placeholder="Username" autofocus>
				</div>
			</div>
			<div class="form-group">
				&nbsp;&nbsp; &nbsp;&nbsp;<label for="inputPassword3" class="col-sm-12 control-label">Password</label>

				<div class="col-sm-4">
					<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" value="<?php echo $row['password']; ?>">
				</div>
			</div>





			<div class="form-group">
				&nbsp;&nbsp; &nbsp;&nbsp;<label for="inputEmail3" class="col-sm-13 control-label">tanggal Join</label>

				<div class="col-sm-4">
					<input type="date" name="tgl_join" class="form-control" value="<?php echo $row['tgl_join']; ?>" placeholder="tgl_join" autofocus>
				</div>
			</div>

			<div class="form-group">
				&nbsp;&nbsp; &nbsp;&nbsp;<label for="dep" class="col-sm-13 control-label">Status</label>

				<div class="col-sm-4">
					<select name="status" class="form-control" value="<?php echo $row['status']; ?>" autofocus>
						<option value="ACTIVE" selected="selected">Active</option>
						<option value="NOACTIVE">No Active</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				&nbsp;&nbsp; &nbsp;&nbsp;<label for="dep" class="col-sm-13 control-label">Level</label>

				<div class="col-sm-4">
					<select name="level" class="form-control" value="<?php echo $row['level']; ?>" autofocus>
						<option value="user" selected="selected">User</option>
						<option value="admin">Admin</option>
					</select>
				</div>
			</div>
		</div>


		<div class="form-group-inner">
			<div class="login-btn-inner">
				<div class="row">


					<div class="col-lg-12">

					</div>

					<div class="col-lg-9">

						<div class="login-horizental cancel-wp pull-left form-bc-ele">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
						</div>

					</div>
				</div>




			</div>
		</div>

	</form>
	</div>
	</div>

</body>

</html>