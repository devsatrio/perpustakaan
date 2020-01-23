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
//==========================================================
	function updatestatus(id){
        swal({
  title: "Buku Dikembalikan ?",
  text: "Apakah Buku Telah Di Kembalikan Ke Perpus",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $('#tabelnya').loading('toggle');
		$.ajax({
                type: 'GET',
                url: '/updatestatus/'+id,
                success:function (){
				$.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Pembaharuan berhasi disimpan</p>', {
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
    window.updatestatus=updatestatus;
//==================================================================
function updatedenda(id,id_anggota){
$('#jumlah').val('');    
$('#modal-fade').modal('show');
$('#kode_user').val(id_anggota);
$('#kode').val(id);
}
 window.updatedenda=updatedenda;
 //================================================================
 $('#simpandenda').on('click',function(e){
    if($('#jumlah').val()!=''){
        e.preventDefault();
                e.stopImmediatePropagation();    
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/simpandenda',
                    type: 'POST',
                    data: {
                        'kode':$('#kode').val(),
                        'kode_user':$('#kode_user').val(),
                        'jumlah':$('#jumlah').val()
                    },
                    success: function () {
                        $('#modal-fade').modal('hide');
                       $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Data berhasi disimpan</p>', {
                    type: 'success',
                    delay: 3000,
                    allow_dismiss: true,
                    offset: {from: 'top', amount: 20}
                    });
                    getData(1);
                    }
                });
    }
 });
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
