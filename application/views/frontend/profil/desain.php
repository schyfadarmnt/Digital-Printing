<div class="gap"></div>
<div class="container">
	<div class="row row-col-gap" data-gutter="60">
		<div class="col-md-3">
			<h3 class="widget-title"><?= $this->session->userdata('session_username');?></h3>
			<div class="box">
				<a href="<?=base_url('profil')?>" class="btn btn-default btn-block" style="text-align: left"><i class="fa fa-user-circle"></i> Profil</a>
				<a href="<?=base_url('pesanan')?>" class="btn btn-primary btn-block" style="text-align: left"><i class="fa fa-list"></i> Data Pemesanan</a>
				<a href="<?=base_url('logout')?>" onclick="return confirm('Logout? ')"  class="btn btn-default btn-block" style="text-align: left"><i class="fa fa-sign-out"></i> Logout</a>
			</div>
		</div>
		<div class="col-md-9">
			<h3 class="widget-title"><i class="fa fa-list"></i> Data Desain</h3>
			<div class="box">
				<?php
				if ($spanduk == !null):
					?>
					<h5>Spanduk</h5>
					<table class="table table-bordered">
						<thead>
						<tr>
							<th>No</th>
							<th>Ukuran (m)</th>
							<th>Jenis Bahan</th>
							<th>Jumlah</th>
							<th>Foto</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						foreach ($spanduk as $key => $value):
							?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value['spanduk_panjang'] ?> x <?= $value['spanduk_lebar'] ?> </td>
								<td><?= $value['spanduk_bahan'] ?></td>
								<td><?= $value['spanduk_jumlah'] ?></td>
								<td>
									<a href="<?= base_url('detail-desain/' . $value['spanduk_id']) ?>"
									   class="label label-primary"><i class="fa fa-eye"></i> Lihat</a>
								</td>
							</tr>
							<?php
							$no++;
						endforeach;
						?>
						</tbody>
					</table>
				<?php
				endif;
				?>
				<hr>
				<?php
				if ($stiker == !null):
					?>
					<h5>Stiker</h5>
					<table class="table table-bordered">
						<thead>
						<tr>
							<th>No</th>
							<th>Ukuran (m)</th>
							<th>Jenis Bahan</th>
							<th>Jumlah</th>
							<th>Foto</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						foreach ($stiker as $key => $value):
							?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value['stiker_panjang'] ?> x <?= $value['stiker_lebar'] ?> </td>
								<td><?= $value['stiker_bahan'] ?></td>
								<td><?= $value['stiker_jumlah'] ?></td>
								<td>
									<a href="<?= base_url('detail-desain/' . $value['stiker_id']) ?>"
									   class="label label-primary"><i class="fa fa-eye"></i> Lihat</a>
								</td>
							</tr>
							<?php
							$no++;
						endforeach;
						?>
						</tbody>
					</table>
				<?php
				endif;
				?>
				<hr>
				<?php
				if ($kartu == !null):
					?>
					<h5>Kartu Nama</h5>
					<table class="table table-bordered">
						<thead>
						<tr>
							<th>No</th>
							<th>Jenis Bahan</th>
							<th>Jumlah</th>
							<th>Foto</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						foreach ($kartu as $key => $value):
							?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value['kartu_bahan'] ?></td>
								<td><?= $value['kartu_jumlah'] ?></td>
								<td>
									<a href="<?= base_url('detail-desain/' . $value['kartu_id']) ?>"
									   class="label label-primary"><i class="fa fa-eye"></i> Lihat</a>
								</td>
							</tr>
							<?php
							$no++;
						endforeach;
						?>
						</tbody>
					</table>
				<?php
				endif;
				?>
				<hr>
				<?php
				if ($brosur == !null):
					?>
					<h5>Brosur</h5>
					<table class="table table-bordered">
						<thead>
						<tr>
							<th>No</th>
							<th>Ukuran</th>
							<th>Jenis Bahan</th>
							<th>Jumlah</th>
							<th>Foto</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						foreach ($brosur as $key => $value):
							?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value['brosur_ukuran'] ?></td>
								<td><?= $value['brosur_bahan'] ?></td>
								<td><?= $value['brosur_jumlah'] ?></td>
								<td>
									<a href="<?= base_url('detail-desain/' . $value['brosur_id']) ?>"
									   class="label label-primary"><i class="fa fa-eye"></i> Lihat</a>
								</td>
							</tr>
							<?php
							$no++;
						endforeach;
						?>
						</tbody>
					</table>
				<?php
				endif;
				?>
				<hr>
			</div>
		</div>
	</div>
</div>
