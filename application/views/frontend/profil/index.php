<div class="gap"></div>
<div class="container">
	<div class="row row-col-gap" data-gutter="60">
		<div class="col-md-3">
			<h3 class="widget-title"><?= $this->session->userdata('session_username');?></h3>
			<div class="box">
				<a href="#" class="btn btn-primary btn-block" style="text-align: left"><i class="fa fa-user-circle"></i> Profil</a>
				<a href="<?=base_url('pesanan')?>" class="btn btn-default btn-block" style="text-align: left"><i class="fa fa-list"></i> Data Pemesanan</a>
				<a href="<?=base_url('logout')?>"  onclick="return confirm('Logout? ')" class="btn btn-default btn-block" style="text-align: left"><i class="fa fa-sign-out"></i> Logout</a>
			</div>
		</div>
		<div class="col-md-9">
			<h3 class="widget-title">Akun Saya</h3>
			<div class="box">
				<div class="row">
					<div class="col-md-8">
						<?=form_open('profil')?>
						<div class="form-group">
							<label for="">Nama :</label>
							<input type="text" name="nama" class="form-control" placeholder="Nama"
								   required autocomplete="off" value="<?= $this->session->userdata('session_nama');?>">
						</div>
						<div class="form-group">
							<label for="">Username :</label>
							<input type="text" name="username" class="form-control"
								   required autocomplete="off" value="<?= $this->session->userdata('session_username');?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Nomor HP :</label>
							<input type="number" name="nohp" class="form-control" placeholder="Nomor HP"
								   required autocomplete="off" value="<?= $this->session->userdata('session_nomor_hp');?>">
						</div>
						<div class="form-group">
							<label for="">Email :</label>
							<input type="email" name="email" class="form-control" placeholder="Email"
								   required autocomplete="off" value="<?= $this->session->userdata('session_email');?>">
						</div>
						<button type="submit" class="btn btn-block btn-primary" name="simpan"><i
								class="fa fa-save"></i>Simpan
						</button>
						<?=form_close()?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
