<div class="container">
	<div class="row">
		<div class="col-md-8">
			<header class="page-header">
				<h1 class="page-title">My Account</h1>
			</header>
			<div class="box-lg">
				<div class="row" data-gutter="60">
					<div class="col-md-6">
						<h3 class="widget-title">Login</h3>
						<?=form_open('login')?>
							<div class="form-group">
								<label>Username</label>
								<input class="form-control" type="text" name="username" required autocomplete="off"/>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" type="password" name="password" required autocomplete="off"/>
							</div>
							<input class="btn btn-primary" type="submit" value="Login" name="login" />
						<?=form_close()?>
					</div>
					<div class="col-md-6">
						<h3 class="widget-title">Buat Akun</h3>
						<?=form_open('register')?>
							<div class="form-group">
								<label>Username</label>
								<input class="form-control" type="text" required name="username" autocomplete="off"/>
							</div>
							<div class="form-group">
								<label>E-mail</label>
								<input class="form-control" type="text" required name="email" autocomplete="off"/>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" type="password" required name="password" autocomplete="off"/>
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input class="form-control" type="text" required name="nama" autocomplete="off"/>
							</div>
							<div class="form-group">
								<label>Nomor HP</label>
								<input class="form-control" type="number" required name="no_hp" autocomplete="off"/>
							</div>
							<input class="btn btn-primary" type="submit" value="Buat Akun" name="register"/>
						<?=form_close()?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="gap gap-small"></div>
