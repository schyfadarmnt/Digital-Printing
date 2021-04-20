<div class="gap"></div>
<div class="container">
	<div class="row row-col-gap" data-gutter="60">
		<div class="col-md-3">
			<h3 class="widget-title"><?= $this->session->userdata('session_username'); ?></h3>
			<div class="box">
				<a href="<?= base_url('profil') ?>" class="btn btn-default btn-block" style="text-align: left"><i
						class="fa fa-user-circle"></i> Profil</a>
				<a href="#" class="btn btn-primary btn-block" style="text-align: left"><i class="fa fa-list"></i> Data
					Pemesanan</a>
				<a href="<?= base_url('logout') ?>" onclick="return confirm('Logout? ')"
				   class="btn btn-default btn-block" style="text-align: left"><i class="fa fa-sign-out"></i> Logout</a>
			</div>
		</div>
		<div class="col-md-9">
			<h3 class="widget-title"><i class="fa fa-list"></i> Detail Desain</h3>
			<div class="box">
				<?php
				if ($produk == null):
					?>
					<div class="alert alert-warning alert-dismissible animated fadeInDown round" style="" id="feedback"
						 role="alert">
						Desain belum ada
					</div>
				<?php
				else:
					?>
					<h3 class="card-title">
						Foto Hasil Desain
					</h3>
					<img src="<?= base_url('assets/images/desain/' . $produk['desain_foto']) ?>" style="width: 100%"
						 alt="">
					<br>
					<?php
					if ($produk['desain_status'] == 'belum'):
						?><br>
						<?= form_open('detail-desain/' . $produk['desain_id'], array('enctype' => 'multipart/form-data')) ?>
						<p>Masukkan Komentar : </p>
						<input type="hidden" value="<?=$produk['desain_id']?>" name="id">
						<textarea name="komentar" id="" cols="30" rows="10" class="form-control"></textarea><br>
						<button type="button" onclick="return window.history.back();" class="btn btn-secondary">
							Kembali
						</button>
						<button type="submit" class="btn btn-primary" name="desain">Simpan</button>
						<?= form_close() ?>
					<?php
					elseif ($produk['desain_status'] == 'tunggu'):
						?><br>
						<div class="alert alert-warning animated fadeInDown round" style="" id="feedback"
							 role="alert">
							Menunggu dicetak
						</div><?php
					elseif ($produk['desain_status'] == 'selesai'):
						?><br>
						<div class="alert alert-success animated fadeInDown round" style="" id="feedback"
							 role="alert">
							Pesanan selesai dicetak, silahkan datang ke alamat kami
						</div>
					<?php
					endif;
					?>
				<?php
				endif;
				?>
			</div>
		</div>
	</div>
</div>
