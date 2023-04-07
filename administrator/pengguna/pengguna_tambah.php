<?php

session_start();

if (empty($_SESSION['username']) || $_SESSION['level'] != 'admin') {

	header('location:login.php');
} else {
?>
	<!DOCTYPE html>
	<html>

	<head>

		<?php include '../template/css.php'; ?>
	</head>

	<body>


		<form class="form-horizontal" action="pengguna_action.php" method="post">
			<div class="box-body">
				<div class="form-group">
					&nbsp;&nbsp; &nbsp;&nbsp;<label for="inputEmail3" class="col-sm-13 control-label">Username</label>
					<div class="col-sm-4">
						<input type="text" name="username" class="form-control" placeholder="Username" autofocus>
					</div>
				</div>
				<div class="form-group">
					&nbsp;&nbsp; &nbsp;&nbsp;<label for="inputPassword3" class="col-sm-12 control-label">Password</label>

					<div class="col-sm-4">
						<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					&nbsp;&nbsp; &nbsp;&nbsp;<label for="inputEmail3" class="col-sm-13 control-label">JOIN</label>
					<div class="col-sm-4">
						<input type="date" name="tgl_join" class="form-control" placeholder="Tanggal Join" autofocus>
					</div>
				</div>

				<div class="form-group">
					&nbsp;&nbsp; &nbsp;&nbsp;<label for="status" class="col-sm-13 control-label">Status</label>

					<div class="col-sm-4">
						<select name="status" class="form-control" autofocus>
							<option value="aktiv" selected="selected">Aktiv</option>
							<option value="nonaktiv">No Aktiv</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					&nbsp;&nbsp; &nbsp;&nbsp;<label for="dep" class="col-sm-13 control-label">Level</label>

					<div class="col-sm-4">
						<select name="level" class="form-control" autofocus>
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

		</form>

		</div>
		</div>
	<?php
}
	?>
	</body>

	</html>