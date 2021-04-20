<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div>
				<h4 class="card-title">Laporan Perhari</h4>
				<?php echo form_open('admin/laporan/'.$tipe, array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group row">
							<label for="nomorSurat" class="col-sm-2 col-form-label">Tanggal</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" id="nomorSurat" name="tanggal" required autocomplete="off">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group row">
							<label for="nomorSurat" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<a href="<?=base_url('admin')?>" class="btn btn-outline-primary">Kembali</a>
								<button type="submit" class="btn btn-primary" name="lihat">Lihat Laporan</button>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
			<div>
				<h4 class="card-title">Laporan Perbulan</h4>
				<?php echo form_open('admin/laporan/'.$tipe, array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group row">
							<label for="nomorSurat" class="col-sm-2 col-form-label">Bulan</label>
							<div class="col-sm-10">
								<select name="bulan" class="form-control" id="" required>
									<option selected disabled>- Pilih Bulan -</option>
									<option value="01">Januari</option>
									<option value="02">Februari</option>
									<option value="03">Maret</option>
									<option value="04">April</option>
									<option value="05">Mei</option>
									<option value="06">Juni</option>
									<option value="07">Juli</option>
									<option value="08">Agustus</option>
									<option value="09">September</option>
									<option value="10">Oktober</option>
									<option value="11">November</option>
									<option value="12">Desember</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group row">
							<label for="nomorSurat" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<a href="<?=base_url('admin')?>" class="btn btn-outline-primary">Kembali</a>
								<button type="submit" class="btn btn-primary" name="lihatBulan">Lihat Laporan</button>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>

		</div>
	</div>
</div>
