$(document).ready(function(){
	$('#cari_anggota').select2({
		ajax:{
			url:'/carianggota',
			dataType:'json',
			delay:250,
			processResults: function (data){
				return {
					results : $.map(data, function (item){
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
$('#cari_anggota').on('select2:select',function(e){
			var kode = $(this).val();
			$.ajax({
                type: 'GET',
                url: '/carihasilanggota/'+kode,
                success:function (data){
				return {
					results : $.map(data, function (item){
						$('#kode_anggota').val(item.id);
						$("#nama_anggota").val(item.nama);
						$('#alamat_anggota').val(item.alamat);
						$('#telp_anggota').val(item.notelp);
					})
				}
			},
            });
});
//======================================================
$('#buku').select2({
	ajax:{
		url:'/caribuku',
		dataType:'json',
		delay:250,
		processResults: function (data){
				return {
					results : $.map(data, function (item){
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
$('#buku').on('select2:select',function(e){
		var kode = $(this).val();
		$.ajax({
            type: 'GET',
            url: '/carihasilbuku/'+kode,
            success:function (data){
				return{
					results : $.map(data, function (item){
						$('#kode_buku').val(item.id);
						$('#judul_buku').val(item.judul);
						$('#penulis_buku').val(item.penulis);
					})
				}
			},
		});
});

//========================================================
$('#btnsimpan').click(function(){
	if($('#kode_anggota').val()=='' || $('#kode_buku').val()=='' || $('#tanggal_kembali').val()==''){
		$.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Maaf, Data tidak boleh kosong</p>', {
                    type: 'danger',
                    delay: 3000,
                    allow_dismiss: true,
                    offset: {from: 'top', amount: 20}
                });
	}else{
		 $('#halinput').loading('toggle');
		 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
		});
		$.ajax({
                type: 'POST',
                url: '/pinjam',
                data: {
                    'kode_anggota'	: $('#kode_anggota').val(),
                    'kode_buku'		: $('#kode_buku').val(),
                    'kode_user'		: $('#kodeuser').val(),
					'tanggal_pinjam': $('#tanggal_pinjam').val(),
					'tanggal_kembali': $('#tanggal_kembali').val()
				},
                success:function(){
                     $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Data berhasi disimpan</p>', {
                        type: 'success',
                        delay: 3000,
                        allow_dismiss: true,
                        offset: {from: 'top', amount: 20}
                        });
                    $('#kode_anggota').val('');
                    $('#kode_buku').val('');
					$('#tanggal_kembali').val('');
					$('#nama_anggota').val('');
					$('#telp_anggota').val('');
					$('#alamat_anggota').val('');
					$('#judul_buku').val('');
					$('#penulis_buku').val('');
					$("#buku").val(null).trigger('change');
					$("#cari_anggota").val(null).trigger('change');
					$('#cari_anggota').focus();
                }
            }).always(
            function() {
                $('#halinput').loading('stop');
            });
	}
});	
});