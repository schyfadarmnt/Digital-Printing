<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/node_modules/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/node_modules/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/node_modules/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/css/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="<?=base_url()?>assets/backend/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
	<div class="container-fluid page-body-wrapper">
		<div class="row">
			<div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-full-bg">
				<div class="row w-100">
					<div class="col-lg-4 mx-auto">
						<?php if ($this->session->flashdata('alert') == 'belum_login'): ?>
							<div class="alert alert-warning alert-dismissible animated fadeInDown round" style="" id="feedback"
								 role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								Silahkan Login terlebih dahulu
							</div>
						<?php
						elseif ($this->session->flashdata('alert') == 'login_gagal'):
							?>
							<div class="alert alert-danger alert-dismissible animated fadeInDown round" style="" id="feedback"
								 role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								Username atau password salah
							</div>
						<?php
						endif;
						?>
						<div class="auth-form-dark text-left p-5">
							<h2>Login</h2>
							<h4 class="font-weight-light">Hello! let's get started</h4>
							<?=form_open('admin/login')?>
								<div class="form-group">
									<label for="exampleInputEmail1">Username</label>
									<input type="name" class="form-control" id="exampleInputEmail1" placeholder="Username" name="username" required>
									<i class="mdi mdi-account"></i>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
									<i class="mdi mdi-eye"></i>
								</div>
								<div class="mt-5">
									<button class="btn btn-block btn-warning btn-lg font-weight-medium" name="login">Login</button>
								</div>
								<div class="mt-3 text-center">
									<a href="#" class="auth-link text-white">Forgot password?</a>
								</div>
							<?=form_close()?>
						</div>
					</div>
				</div>
			</div>
			<!-- content-wrapper ends -->
		</div>
		<!-- row ends -->
	</div>
	<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?=base_url()?>assets/backend/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/backend/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="<?=base_url()?>assets/backend/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/backend/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?=base_url()?>assets/backend/js/off-canvas.js"></script>
<script src="<?=base_url()?>assets/backend/js/hoverable-collapse.js"></script>
<script src="<?=base_url()?>assets/backend/js/misc.js"></script>
<script src="<?=base_url()?>assets/backend/js/settings.js"></script>
<script src="<?=base_url()?>assets/backend/js/todolist.js"></script>
<!-- endinject -->
</body>

</html>
