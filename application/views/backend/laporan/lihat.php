<style>
	.laporan-header {
		text-align: center;
	}
</style>
<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="row d-print-none">
				<div class="col-6">
					<button type="button" onclick="return window.history.back();" class="btn btn-sm btn-outline-primary"><i
							class="fa fa-arrow-left"></i></button>
				</div>
				<div class="col-6">
					<button style="float: right" type="button" onclick="window.print()"
							class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
				</div>
			</div>
			<br>
			<div>
				<div class="laporan-header"><h3>Rahmatika Digital Printing</h3></div>
				<div class="laporan-header"><h4>Laporan Penjualan <?php
						if ($tipe != 'kartu') {
							echo ucfirst($tipe);
						} else {
							echo 'Kartu Nama';
						}
						?>  <?php
						if ($tanggal != null){
							echo 'Tanggal '.date_indo($tanggal);
						} else {
							echo 'Bulan '.bulan($bulan) .' '. date('Y');
						}
						?></h4></div>
				<table class="table table-bordered">
					<?php
					if ($tipe == 'spanduk'):
						?>
						<thead>
						<tr>
							<th>No</th>
							<th>Nama Pemesan</th>
							<th>Ukuran</th>
							<th>Jenis Bahan</th>
							<th>Jumlah</th>
							<th>Total</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$total = 0;
						$no = 1;
						foreach ($spanduk as $key => $value):
							?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value['pengguna_nama'] ?></td>
								<td><?= $value['spanduk_panjang'] ?> m x <?= $value['spanduk_lebar'] ?> m</td>
								<td>
									<?php
									if ($value['spanduk_bahan'] == 'bagus') {
										echo '340g (Bagus)';
									} elseif ($value['spanduk_bahan'] == 'menengah') {
										echo '320g (Menengah)';
									} elseif ($value['spanduk_bahan'] == 'biasa') {
										echo '280g (Biasa)';
									}
									?>
								</td>
								<td><?= $value['spanduk_jumlah'] ?></td>
								<td>Rp. <?= nominal($value['spanduk_total']) ?></td>
							</tr>
							<?php
							$total = $total + $value['spanduk_total'];
							$no++;
						endforeach; ?>
						</tbody>
						<tfoot>
						<tr>
							<td colspan="5">TOTAL</td>
							<td>Rp. <?= nominal($total) ?></td>
						</tr>
						</tfoot>
					<?php
					endif;
					?>

					<?php
					if ($tipe == 'stiker'):
						?>
						<thead>
						<tr>
							<th>No</th>
							<th>Nama Pemesan</th>
							<th>Ukuran</th>
							<th>Jenis Bahan</th>
							<th>Jumlah</th>
							<th>Total</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$total = 0;
						$no = 1;
						foreach ($stiker as $key => $value):
							?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value['pengguna_nama'] ?></td>
								<td><?= $value['stiker_panjang'] ?> m x <?= $value['stiker_lebar'] ?> m</td>
								<td>
									<?php
									if ($value['stiker_bahan'] == 'biasa') {
										echo 'Biasa (China)';
									} elseif ($value['stiker_bahan'] == 'bagus') {
										echo 'Bagus (Ritrama)';
									}
									?>
								</td>
								<td><?= $value['stiker_jumlah'] ?> </td>
								<td>Rp. <?= nominal($value['stiker_total']) ?></td>
							</tr>
							<?php
							$total = $total + $value['stiker_total'];
							$no++;
						endforeach; ?>
						</tbody>
						<tfoot>
						<tr>
							<td colspan="5">TOTAL</td>
							<td>Rp. <?= nominal($total) ?></td>
						</tr>
						</tfoot>
					<?php
					endif;
					?>

					<?php
					if ($tipe == 'kartu'):
						?>
						<thead>
						<tr>
							<th>No</th>
							<th>Nama Pemesan</th>
							<th>Jenis Bahan</th>
							<th>Jumlah</th>
							<th>Total</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$total = 0;
						$no = 1;
						foreach ($kartu as $key => $value):
							?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value['pengguna_nama'] ?></td>
								<td>
									<?php
									if ($value['kartu_bahan'] == 'biasa') {
										echo 'Biasa (BCT)';
									} elseif ($value['kartu_bahan'] == 'bagus') {
										echo 'Bagus (Glossy)';
									}
									?>
								</td>
								<td><?= $value['kartu_jumlah'] ?> kotak</td>
								<td>Rp. <?= nominal($value['kartu_total']) ?></td>
							</tr>
							<?php
							$total = $total + $value['kartu_total'];
							$no++;
						endforeach; ?>
						</tbody>
						<tfoot>
						<tr>
							<td colspan="4">TOTAL</td>
							<td>Rp. <?= nominal($total) ?></td>
						</tr>
						</tfoot>
					<?php
					endif;
					?>
					<?php
					if ($tipe == 'brosur'):
						?>
						<thead>
						<tr>
							<th>No</th>
							<th>Ukuran Kertas</th>
							<th>Nama Pemesan</th>
							<th>Jenis Bahan</th>
							<th>Jumlah</th>
							<th>Total</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$total = 0;
						$no = 1;
						foreach ($brosur as $key => $value):
							?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value['pengguna_nama'] ?></td>
								<td><?= $value['brosur_ukuran'] ?></td>
								<td><?= ucfirst($value['brosur_bahan']) ?></td>
								<td><?= $value['brosur_jumlah'] ?> rim</td>
								<td>Rp. <?= nominal($value['brosur_total']) ?></td>
							</tr>
							<?php
							$total = $total + $value['brosur_total'];
							$no++;
						endforeach; ?>
						</tbody>
						<tfoot>
						<tr>
							<td colspan="5">TOTAL</td>
							<td>Rp. <?= nominal($total) ?></td>
						</tr>
						</tfoot>
					<?php
					endif;
					?>
				</table>
				<br>
				<div class="row">
					<div class="col-6 text-center" >
					</div>
					<div class="col-6 text-center">
						<p>Tangerang,Banten <?= date_indo(date('Y-m-d')) ?></p>
						<p>Manajer</p>
						<br>
						<br>
						<br>
						<p><b><u>Nurul vivi S.Kom</u></b></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
