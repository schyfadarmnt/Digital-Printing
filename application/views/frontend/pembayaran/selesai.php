<div class="gap"></div>
<div class="container">
	<div class="payment-success-icon fa fa-check-circle-o"></div>
	<div class="payment-success-title-area">
		<h1 class="payment-success-title"><?= $this->session->userdata('session_username');?>, Terima Kasih Telah Memesan</h1>
		<p class="lead">Silahkan transfer ke rekening <b><?=$bank?></b> sebesar <b>Rp. <?=nominal($pesanan['keranjang_total'])?></b> sebelum 1x24 jam.
		</p>
	</div>
	<div class="gap gap-small"></div>
	<div class="gap gap-small"></div>
	<div class="gap gap-small"></div>
	<div class="gap gap-small"></div>
</div>
