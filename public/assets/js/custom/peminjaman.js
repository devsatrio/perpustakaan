$(document).ready(function () {
	$('#cari_anggota').select2({
		ajax: {
			url: 'carianggota',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results: $.map(data, function (item) {
						return {
							id: item.id,
							text: item.nama
						}

					})
				}
			},
			cache: true
		}
	});
	//======================================================
	$('#cari_anggota').on('select2:select', function (e) {
		$('#halinput').loading('toggle');
		var kode = $(this).val();
		$.ajax({
			type: 'GET',
			url: 'carihasilanggota/' + kode,
			success: function (data) {
				return {
					results: $.map(data, function (item) {
						if(item.status_pinjam=='y'){
							swal('Peringatan','Anggota ini masih meminjam buku, cek di list peminjaman','error');
							$('#cari_anggota').empty();
							$('#kode_anggota').val('');
							$('#nama_anggota').val('');
							$('#telp_anggota').val('');
							$('#alamat_anggota').val('');
							$('#status_anggota').val('');
						}else{
							$('#kode_anggota').val(item.id);
							$("#nama_anggota").val(item.nama);
							$('#alamat_anggota').val(item.alamat);
							$('#telp_anggota').val(item.notelp);
							$('#status_anggota').val(item.status_anggota);
						}
					})
				}
			},
			complete: function (data) {
				$('#halinput').loading('stop');
			}
		});
	});
	//======================================================
	$('#buku').select2({
		ajax: {
			url: 'caribuku',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results: $.map(data, function (item) {
						return {
							id: item.id,
							text: item.judul
						}

					})
				}
			},
			cache: true
		}
	});

	//======================================================
	$('#buku').on('select2:select', function (e){
		var kode = $(this).val();
		$('#halinput').loading('toggle');
		$.ajax({
			type: 'GET',
			url: 'carihasilbuku/' + kode,
			success: function (data) {
				return {
					results: $.map(data, function (item) {
						
						if($('#status_anggota').val()!=''){
							if($('#status_anggota').val()=='Umum'){
								if(item.umum=='tidak'){
									swal('Peringatan','Maaf, buku ini tidak untuk anggota umum','error');
									$('#buku').empty();
									$('#kode_buku').val('');
									$('#judul_buku').val('');
									$('#penulis_buku').val('');
									$('#isbn_buku').val('');
									$('#jumlah_buku').val('');
									$('#penerbit_buku').val('');
								}else{
									$('#kode_buku').val(item.id);
									$('#judul_buku').val(item.judul);
									$('#penulis_buku').val(item.penulis);
									$('#jumlah_buku').val(item.jumlah);
									$('#isbn_buku').val(item.isbn);
									$('#penerbit_buku').val(item.penerbit);

								}
							}
						}else{
							swal('Peringatan','Maaf, pilih anggota terlebih dahulu','error');
							$('#buku').empty();
						}
					})
				}
			},
			complete: function (data) {
				$('#halinput').loading('stop');
			}
		});
	});

	//========================================================
	$('#btnsimpan').click(function () {
		if ($('#kode_anggota').val() == '' || $('#kode_buku').val() == '' || $('#tanggal_kembali').val() == '') {
			$.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Maaf, Data tidak boleh kosong</p>', {
				type: 'danger',
				delay: 3000,
				allow_dismiss: true,
				offset: { from: 'top', amount: 20 }
			});
		} else {
			$('#halinput').loading('toggle');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type: 'POST',
				url: 'pinjam',
				data: {
					'kode_anggota': $('#kode_anggota').val(),
					'kode_buku': $('#kode_buku').val(),
					'kode_user': $('#kodeuser').val(),
					'tanggal_pinjam': $('#tanggal_pinjam').val(),
					'tanggal_kembali': $('#tanggal_kembali').val()
				},
				success: function () {
					swal('Informasi','Peminjaman Buku Sukses','success');
					$('#kode_anggota').val('');
					$('#kode_buku').val('');
					$('#tanggal_kembali').val('');
					$('#nama_anggota').val('');
					$('#telp_anggota').val('');
					$('#alamat_anggota').val('');
					$('#judul_buku').val('');
					$('#penulis_buku').val('');
					$('#isbn_buku').val('');
					$('#status_anggota').val('');
					$('#penerbit_buku').val('');
					$('#jumlah_buku').val('');
					$("#buku").val(null).trigger('change');
					$("#cari_anggota").val(null).trigger('change');
					$('#cari_anggota').focus();
				}
			}).always(
				function () {
					$('#halinput').loading('stop');
				});
		}
	});
});