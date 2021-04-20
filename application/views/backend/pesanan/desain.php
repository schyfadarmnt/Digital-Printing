<div class="col-12">
	<div class="card">
		<div class="card-body">
			<?php
			if ($produk == null):
				?>
				<div class="alert alert-warning alert-dismissible animated fadeInDown round" style="" id="feedback"
					 role="alert">
					Desain belum ada
				</div>
				<?= form_open('admin/pesanan/desain/' . $id, array('enctype' => 'multipart/form-data')) ?>
				<p>Upload Desain : </p>
				<input type="file" class="dropify" name="foto"/>
				<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
				<button type="submit" class="btn btn-primary" name="desain">Simpan</button>
				<?= form_close() ?>
			<?php
			else:
				?>
				<h3 class="card-title">
					Foto Hasil Desain
				</h3>
				<img src="<?= base_url('assets/images/desain/' . $produk['desain_foto']) ?>" style="width: 100%" alt="">
				<br>
				<?php
				if ($produk['desain_status'] == 'belum'):
					?><br>
					<div class="alert alert-warning alert-dismissible animated fadeInDown round" style="" id="feedback"
						 role="alert">
						Menunggu persetujuan pelanggan
					</div>
					<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
				<?php
				elseif ($produk['desain_status'] == 'tunggu'):
					?><br>
				<p>Komentar : </p>
				<p><?=$produk['desain_komentar']?></p>
					<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
					<a href="<?=base_url('admin/pesanan/selesai/'.$produk['desain_produk_id'])?>" class="btn btn-primary" onclick="return confirm('Pesanan sudah selesai dicetak? ')">Selesai</a><?php
				elseif ($produk['desain_status'] == 'selesai'):
					?><br>
				<p>Komentar : </p>
				<p><?=$produk['desain_komentar']?></p>
					<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
				<?php
				endif;
				?>
			<?php
			endif;
			?>
		</div>
	</div>
</div>
