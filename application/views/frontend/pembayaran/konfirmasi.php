<div class="gap"></div>

<div class="container">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<h4><i class="fa fa-check"></i> Konfirmasi Pembayaran</h4>
			<div class="row" data-gutter="10">
				<div class="col-md-12">
					<div class="box">
						<?=form_open('konfirmasi/'.$pesanan['faktur_id'],array('enctype' => 'multipart/form-data'))?>
						<div class="form-group">
							<label for="">Nomor Rekening :</label>
							<input type="number" class="form-control" id="rekening" name="rekening"
								   placeholder="Nomor Rekening" required autocomplete="off">
						</div>
						<div class="form-group">
							<label for="">Atas Nama :</label><br>
							<input type="text" class="form-control" id="atas_nama" name="atas_nama"
								   placeholder="Nomor Rekening" required autocomplete="off">
						</div>
						<div class="form-group">
							<label for="">Nominal Transfer (Rp.) :</label>
							<input type="number" name="nominal" class="form-control" id="nominal"
								   required autocomplete="off">
						</div>
						<div class="form-group">
							<label for="">Upload Struk :</label>
							<input type="file" class="form-control" required name="struk">
						</div>
						<br>
						<button type="submit" class="btn btn-block btn-primary" name="konfirmasi"><i
								class="fa fa-check"></i>Konfirmasi
						</button>
						<?=form_close()?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
