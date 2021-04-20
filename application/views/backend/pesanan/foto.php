<div class="col-12">
	<div class="card">
		<div class="card-body">
			<?php
			if ($spanduk != null):
			?>
			<h3 class="card-title">
				Foto Spanduk
			</h3>
			<img src="<?=base_url('assets/images/spanduk/'.$spanduk['spanduk_foto'])?>" style="width: 100%" alt="">
				<div class="row">
					<div class="col-12">
						<br>
						<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
						<a href="<?=base_url('admin/pesanan/desain/'.$spanduk['spanduk_id'])?>" class="btn btn-primary">Lihat hasil desain</a>
					</div>
				</div>
			<?php
			endif;
			?>
			<?php
			if ($stiker != null):
			?>
			<h3 class="card-title">
				Foto Stiker
			</h3>
			<img src="<?=base_url('assets/images/stiker/'.$stiker['stiker_foto'])?>" style="width: 100%" alt="">
				<div class="row">
					<div class="col-12">
						<br>
						<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
						<a href="<?=base_url('admin/pesanan/desain/'.$stiker['stiker_id'])?>" class="btn btn-primary">Lihat hasil desain</a>
					</div>
				</div>
			<?php
			endif;
			?>
			<?php
			if ($kartu != null):
			?>
			<h3 class="card-title">
				Foto Kartu Nama
			</h3>
			<img src="<?=base_url('assets/images/kartu/'.$kartu['kartu_foto'])?>" style="width: 100%" alt="">				<div class="row">
				<div class="col-12">
					<br>
					<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
					<a href="<?=base_url('admin/pesanan/desain/'.$kartu['kartu_id'])?>" class="btn btn-primary">Lihat hasil desain</a>
				</div>
			</div>
			<?php
			endif;
			?>
			<?php
			if ($brosur != null):
			?>
			<h3 class="card-title">
				Foto Brosur
			</h3>
			<img src="<?=base_url('assets/images/brosur/'.$brosur['brosur_foto'])?>" style="width: 100%" alt="">
				<div class="row">
					<div class="col-12">
						<br>
						<button type="button" onclick="return window.history.back();" class="btn btn-secondary">Kembali</button>
						<a href="<?=base_url('admin/pesanan/desain/'.$brosur['brosur_id'])?>" class="btn btn-primary">Lihat hasil desain</a>
					</div>
				</div>
			<?php
			endif;
			?>
		</div>
	</div>
</div>
