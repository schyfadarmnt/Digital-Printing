<div class="gap"></div>
<div class="container">
	<div class="row row-col-gap" data-gutter="60">
		<div class="col-md-3">
			<h3 class="widget-title"><?= $this->session->userdata('session_username');?></h3>
			<div class="box">
				<a href="<?=base_url('profil')?>" class="btn btn-default btn-block" style="text-align: left"><i class="fa fa-user-circle"></i> Profil</a>
				<a href="#" class="btn btn-primary btn-block" style="text-align: left"><i class="fa fa-list"></i> Data Pemesanan</a>
				<a href="<?=base_url('logout')?>" onclick="return confirm('Logout? ')"  class="btn btn-default btn-block" style="text-align: left"><i class="fa fa-sign-out"></i> Logout</a>
			</div>
		</div>
		<div class="col-md-9">
			<h3 class="widget-title"><i class="fa fa-list"></i> Data Pemesanan</h3>
			<div class="box">
				<table class="table">
					<thead>
					<tr>
						<th>Nomor Faktur</th>
						<th>Waktu Pemesanan</th>
						<th>Total</th>
						<th>Status</th>
						<th class="text-center"><i class="fa fa-cog"></i></th>
					</tr>
					</thead>
					<tbody>
						<?php
						foreach ($pesanan as $key=>$value):
						?>
						<tr>
							<td><?=$value['faktur_id']?></td>
							<td><?php
								$tanggal = explode(" ",$value['faktur_date_created']);
								echo date_indo($tanggal[0]);
								echo '<br>';
								echo $tanggal[1];
								?>
							</td>
							<td>Rp. <?=nominal($value['keranjang_total'])?></td>
							<td>
								<?php if ($value['faktur_status'] == 'belum'):?>
									<label class="label label-warning">Belum dikonfirmasi</label>
								<?php elseif ($value['faktur_status'] == 'sudah'):?>
									<label class="label label-success">Selesai</label>
								<?php elseif ($value['faktur_status'] == 'tunggu'):?>
									<label class="label label-primary">Menunggu </label>
								<?php endif;?>
							</td>
							<td class="text-center">
								<a href="<?=base_url('detail-pesanan/'.$value['faktur_id'])?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a>
							</td>
						</tr>
						<?php
						endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
