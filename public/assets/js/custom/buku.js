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
//========================================================
$(document).ready(function(){

//========================================================
	$(document).on('click', '.pagination a',function(event){
	    event.preventDefault();
	    $('li').removeClass('active');
	    $(this).parent('li').addClass('active');
	    var myurl = $(this).attr('href');
	    var page=$(this).attr('href').split('page=')[1];
	    getData(page);
	});

//=========================================================
	$("#tambah").click(function(e){
		$("#tabelnya").hide(700);
		$("#halinput").show(700);
        $('#input_judul').focus();
	});

//=========================================================
	$("#kembali").click(function(e){
		$("#tabelnya").show(700);
		$("#halinput").hide(700);
	});

//=========================================================
	$("#simpan").click(function(e){
		var judul 	= $("#input_judul").val();
		var penulis = $("#input_penulis").val();

		if(judul=='' || penulis==''){
			$.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Maaf, Data tidak boleh kosong</p>', {
                type: 'danger',
                delay: 3000,
                allow_dismiss: true,
                offset: {from: 'top', amount: 20}
            });
            return false;
		}else{
			$('#halinput').loading('toggle');
			
			$("#forminput").submit(function(e){
               	e.preventDefault();
                e.stopImmediatePropagation();    
                var formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/buku',
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
                    $("#input_judul").val('');
                    $("#input_penulis").val('');
                    $("#input_foto").val('');
                    },
                    complete: function (data) {
                      $('#halinput').loading('stop');
                     }
                });
            });
		}
	})
//==========================================================
	function hapusdata(id){
        swal({
			  title: "Hapus Data ?",
			  text: "Data Tidak Dapat Dipulihkan Kembali Setelah Di Hapus",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			}).then((willDelete) => {
  		
  		if (willDelete) {
    		$('#tabelnya').loading('toggle');
    			
    		$.ajax({
                type: 'DELETE',
                url: 'buku/' + id,
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
//==========================================================

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
                url: 'buku/'+id,
                success:function(data){
                    $.each(data,function(key, value){
                        $('#edit_judul').val(value.judul);
                        $('#edit_penulis').val(value.penulis);
                        $('#kode_edit').val(value.id);
                        $('#edit_fotolama').val(value.gambar);
                        if(value.gambar!='n'){
                            $("#imagebuku").attr("src","img/buku/"+value.gambar);
                        }else{
                            $("#imagebuku").attr("src","img/default/noimage.jpg");
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
        var judul   = $('#edit_judul').val();
        var penulis = $("#edit_penulis").val();
        var kode    = $('#kode_edit').val();
        if(judul==''||penulis==''){
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
                    url: '/buku/'+kode,
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
});


//==========================================================
function getData(page){
	$.ajax({
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