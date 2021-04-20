<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">
				Data Pelanggan
			</h4>
			<div class="table-responsive">
				<table id="order-listing" class="table table-bordered">
					<thead>
					<tr>
						<th style="width: 1%;">No</th>
						<th>Username</th>
						<th>Email</th>
						<th style="text-align: center"><i class="icon-settings"></i></th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach ($pelanggan as $ket=>$value):
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$value['pengguna_username']?></td>
						<td><?=$value['pengguna_email']?></td>
						<td class="text-center">
							<a href="#" class="btn social-btn btn-rounded btn-primary" title="Lihat"><i class="icon-eye"></i></a>
						</td>
					</tr>
					<?php
					$no++;
					endforeach;
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
