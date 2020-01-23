$(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });
//======================================================
$(document).ready(function(){
    $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            getData(page);
        });

	$("#tambah").click(function(e){
		$("#tabelnya").hide(700);
		$("#halinput").show(700);
        $('#input_nama').focus();
	});
//=========================================================
	$("#kembali").click(function(e){
		$("#tabelnya").show(700);
		$("#halinput").hide(700);
	});
//==========================================================
	function hapusdata(id){
        swal({
  title: "Hapus Data ?",
  text: "Data Tidak Dapat Dipulihkan Kembali Setelah Di Hapus",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $('#tabelnya').loading('toggle');
    $.ajax({
                type: 'DELETE',
                url: 'user/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function() {
                     $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Data berhasi dihapus</p>', {
                    type: 'success',
                    delay: 3000,
                    allow_dismiss: true,
                    offset: {from: 'top', amount: 20}
                    });
                    getData(1);
                },complete:function(){
                    $('#tabelnya').loading('stop');
                }
            });
  }
});
        
    }
    window.hapusdata=hapusdata;
//============================================================
	function editdata(id){
		caridata(id);
		$("#tabelnya").hide(700);
		$("#haledit").show(700);
	}
	window.editdata=editdata;
//=============================================================
    function caridata(id){
         $.ajax({
                type:'GET',
                dataType:'json',
                url: 'user/'+id,
                success:function(data){
                    $.each(data,function(key, value){
                        $('#edit_username').val(value.username);
                        $('#edit_nama').val(value.name);
                        $('#edit_alamat').val(value.alamat);
                        $('#edit_email').val(value.email);
                        $('#edit_notelp').val(value.notelp);
                        $('#kode_edit').val(value.id);
                        $('#edit_fotolama').val(value.foto);
                        if(value.foto!='n'){
                            $("#imageuser").attr("src","img/"+value.foto);
                        }else{
                            $("#imageuser").attr("src","img/default/noimage.jpg");
                        }
                        });
                },error:function(){
                    
                    alert('error');
                }
            });
    }
//================================================================
	$("#kembaliedit").click(function(e){
		$("#tabelnya").show(700);
		$("#haledit").hide(700);
	});
//===================================================================
    $('#btnedit').click(function(e){
        var username    = $('#edit_username').val();
        var nama        = $("#edit_nama").val();
        var alamat      = $("#edit_alamat").val();
        var notelp      = $("#edit_notelp").val();
        var email       = $('#edit_email').val();
        var kode        = $('#kode_edit').val();
        if(username==''||nama=='' || alamat=='' || notelp=='' || email==''){
            $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Maaf, Data tidak boleh kosong</p>', {
                    type: 'danger',
                    delay: 3000,
                    allow_dismiss: true,
                    offset: {from: 'top', amount: 20}
                });
            return false;
        }else{
            $('#haledit').loading('toggle');
            $("#formedit").submit(function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();    
                var formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/user/'+kode,
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function () {
                       $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Data berhasi disimpan</p>', {
                    type: 'success',
                    delay: 3000,
                    allow_dismiss: true,
                    offset: {from: 'top', amount: 20}
                    });
                    getData(1);
                     $("#tabelnya").show(700);
                    $("#haledit").hide(700);
                    },complete:function(){
                        $('#haledit').loading('stop');
                    }
                });
            });

        }

    });
	//==============================
	$("#simpan").click(function(e){
		var nama 		= $("#input_nama").val();
		var alamat 		= $("#input_alamat").val();
		var notelp 		= $("#input_notelp").val();
		var username 	= $("#input_user").val();
		var password	= $("#input_pass").val();
		var kpassword	= $("#input_kpass").val();
        var email       = $('#input_email').val();

		if(nama=='' || alamat=='' || notelp=='' || username=='' || password=='' ||kpassword==''||email==''){
				
                $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Maaf, Data tidak boleh kosong</p>', {
                    type: 'danger',
                    delay: 3000,
                    allow_dismiss: true,
                    offset: {from: 'top', amount: 20}
                });
                return false;
		}else{
			if(password!=kpassword){
				$.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Maaf, Konfirmasi password salah</p>', {
                    type: 'danger',
                    delay: 3000,
                    allow_dismiss: true,
                    offset: {from: 'top', amount: 20}
                });
                return false;
			}else{
                $('#halinput').loading('toggle');
				$("#forminput").submit(function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();    
                var formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/user',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function () {
                       $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Data berhasi disimpan</p>', {
                        type: 'success',
                        delay: 3000,
                        allow_dismiss: true,
                        offset: {from: 'top', amount: 20}
                        });
                    getData(1);
                    $("#tabelnya").show(700);
                    $("#halinput").hide(700);
                    $("#input_nama").val('');
                    $("#input_alamat").val('');
                    $("#input_notelp").val('');
                    $("#input_user").val('');
                    $("#input_pass").val('');
                    $("#input_kpass").val('');
                    $('#input_email').val('');
                    $('#input_foto').val('');
                    },
                    complete: function (data) {
                      $('#halinput').loading('stop');
                     }
                });
            });
				
			}
			
		}
	})
});
function getData(page){

        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#listdata").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
