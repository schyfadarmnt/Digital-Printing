<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">
				Data Pesanan
			</h4>
			<div class="table-responsive">
				<table id="order-listing" class="table table-bordered">
					<thead>
					<tr>
						<th style="width: 1%;">No</th>
						<th>Nomor Faktur</th>
						<th>Nama Pemesan</th>
						<th>Tanggal Pemesanan</th>
						<th>Total</th>
						<th style="text-align: center"><i class="icon-settings"></i></th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach ($transaksi as $key=>$value):
						if ($value['faktur_status'] == 'sudah'):
						?>
						<tr>
							<td><?=$no?></td>
							<td><?=$value['faktur_id']?></td>
							<td><?=$value['pengguna_nama']?></td>
							<td><?=$value['faktur_date_created']?></td>
							<td><?=nominal($value['keranjang_total'])?></td>
							<td><a href="<?=base_url('admin/pesanan/lihat/'.$value['faktur_id'])?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a></td>
						</tr>
						<?php
						$no++;
						endif;
					endforeach;
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
