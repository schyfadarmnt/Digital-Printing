$(document).ready(function () {
	var root = window.location.origin + '/sipesan/';

	setTimeout(function () {
	$('.hide-it').addClass('fadeOutUpBig')
	},5000);

});

function showTotal() {
	var panjang = $('#panjang').val();
	var lebar = $('#lebar').val();
	var bahan = $('#bahan').val();
	var jumlah = $('#jumlah').val();
	var luas = parseFloat(panjang) * parseFloat(lebar);
	var total = 0;
	var html = '';
	if (bahan === 'Biasa'){
		total = luas * jumlah * 20000;
		html = '' +
			'<h3> Rp. '+formatRupiah(parseInt(total).toString())+'</h3>';
		$('#total').html(html);
	} else if (bahan === 'Menengah'){
		total = luas * jumlah * 30000;
		html = '' +
			'<h3> Rp. '+formatRupiah(parseInt(total).toString())+'</h3>';
		$('#total').html(html);
	} else if (bahan === 'Bagus'){
		total = luas * jumlah * 35000;
		html = '' +
			'<h3> Rp. '+formatRupiah(parseInt(total).toString())+'</h3>';
		$('#total').html(html);
	}
}

function showTotalStiker() {
	var panjang = $('#panjang').val();
	var lebar = $('#lebar').val();
	var bahan = $('#bahan').val();
	var jumlah = $('#jumlah').val();
	var luas = parseFloat(panjang) * parseFloat(lebar);
	var total = 0;
	var html = '';
	if (bahan === 'biasa'){
		total = luas * jumlah * 75000;
		html = '' +
			'<h3> Rp. '+formatRupiah(parseInt(total).toString())+'</h3>';
		$('#total').html(html);
	}  else if (bahan === 'bagus'){
		total = luas * jumlah * 95000;
		html = '' +
			'<h3> Rp. '+formatRupiah(parseInt(total).toString())+'</h3>';
		$('#total').html(html);
	}
}

function showTotalKartu() {
	var bahan = $('#bahan').val();
	var jumlah = $('#jumlah').val();
	var total = 0;
	var html = '';
	if (bahan === 'biasa'){
		total = jumlah * 35000;
		html = '' +
			'<h3> Rp. '+formatRupiah(total.toString())+'</h3>';
		$('#total').html(html);
	}  else if (bahan === 'bagus'){
		total = jumlah * 45000;
		html = '' +
			'<h3> Rp. '+formatRupiah(total.toString())+'</h3>';
		$('#total').html(html);
	}
}

function showTotalBrosur() {
	var bahan = $('#bahan').val();
	var jumlah = $('#jumlah').val();
	var total = 0;
	var html = '';
	if (bahan === 'hvs'){
		total = jumlah * 500000;
		html = '' +
			'<h3> Rp. '+formatRupiah(total.toString())+'</h3>';
		$('#total').html(html);
	}  else if (bahan === 'konstruk'){
		total = jumlah * 750000;
		html = '' +
			'<h3> Rp. '+formatRupiah(total.toString())+'</h3>';
		$('#total').html(html);
	}
}

// ------------------------------------------------------------------------------------------
// Fungsi-fungsi
// ------------------------------------------------------------------------------------------

function formatRupiah(angka, prefix){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}

	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
