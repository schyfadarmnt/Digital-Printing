<div class="col-12">
	<div class="row">
		<div class="col-md-6 col-lg-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-md-center">
						<a href="<?=base_url('admin')?>"><i class="mdi mdi-account-multiple icon-lg text-primary"></i></a>
						<div class="ml-3">
							<p class="mb-0">Jumlah Pelanggan</p>
							<h6><?=count($pelanggan)?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-md-center">
						<a href="<?=base_url('admin')?>"><i class="mdi mdi-cart icon-lg text-danger"></i></a>
						<div class="ml-3">
							<p class="mb-0">Transaksi Belum Bayar</p>
							<h6><?php
								$total = 0;
								foreach ($transaksi as $value){
									if ($value['faktur_status'] == 'belum'){
										$total++;
									}
								}
								echo $total;
								?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-md-center">
						<a href="<?=base_url('admin')?>"><i class="mdi mdi-cart icon-lg text-warning"></i></a>
						<div class="ml-3">
							<p class="mb-0">Transaksi Menunggu</p>
							<h6>
								<?php
								$total = 0;
								foreach ($transaksi as $value){
									if ($value['faktur_status'] == 'tunggu'){
										$total++;
									}
								}
								echo $total;
								?>
							</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-md-center">
						<a href="<?=base_url('admin')?>"><i class="mdi mdi-cart icon-lg text-success"></i></a>
						<div class="ml-3">
							<p class="mb-0">Transaksi Selesai</p>
							<h6>
								<?php
								$total = 0;
								foreach ($transaksi as $value){
									if ($value['faktur_status'] == 'sudah'){
										$total++;
									}
								}
								echo $total;
								?>
							</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
