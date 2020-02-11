$(document).ready(function () {


    //=========================================================
    $("#tambah").click(function (e) {
        $("#tabelnya").hide(700);
        $("#halinput").show(700);
        $('#input_judul').focus();
    });

    //=========================================================
    $("#kembali").click(function (e) {
        $("#tabelnya").show(700);
        $("#halinput").hide(700);
    });

    //=========================================================
    $("#simpan").click(function (e) {
        var judul = $("#input_judul").val();
        var kode = $("#input_kode").val();
        var jumlah = $("#input_jumlah").val();
        var lokasi = $("#input_lokasi").val();
        var penulis = $("#input_penulis").val();
        var halaman = $("#input_halaman").val();
        var tgl = $("#input_tgl").val();
        var penerbit = $("#input_penerbit").val();
        var isbn = $("#input_isbn").val();
        var bahasa = $("#input_bahasa").val();
        var berat = $("#input_berat").val();
        var lebar = $("#input_lebar").val();
        var deskripsi = $('#input_deskripsi').val();
        var foto = $('#input_foto').val();

        if (lokasi == '' || jumlah == '' || kode == '' || judul == '' || penulis == '' || penerbit == '' || foto == '' || halaman == '' || deskripsi == '' || tgl == '' || isbn == '' || bahasa == '' || berat == '' || lebar == '') {
            $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Maaf, Data tidak boleh kosong</p>', {
                type: 'danger',
                delay: 3000,
                allow_dismiss: true,
                offset: { from: 'top', amount: 20 }
            });
            return false;
        } else {
            $('#halinput').loading('toggle');
            $("#forminput").submit(function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                var formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: 'buku',
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
                            offset: { from: 'top', amount: 20 }
                        });
                        $('#example-datatable').DataTable().ajax.reload();
                        $("#tabelnya").show(700);
                        $("#halinput").hide(700);
                        $("#input_judul").val('');
                        $("#input_penulis").val('');
                        $("#input_halaman").val('');
                        $("#input_tgl").val('');
                        $("#input_isbn").val('');
                        $("#input_kode").val('');
                        $("#input_jumlah").val('');
                        $("#input_lokasi").val('');
                        $("#input_umum").prop('checked',false);
                        $("#input_bahasa").val('');
                        $("#input_penerbit").val('');
                        $("#input_berat").val('');
                        $("#input_lebar").val('');
                        $("#input_deskripsi").val('');
                        $("#input_foto").val('');
                    },
                    complete: function (data) {
                        $('#halinput').loading('stop');
                    }
                });
            });
        }
    });
    //==========================================================
    function hapusdata(id) {
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
                    success: function () {
                        $('#example-datatable').DataTable().ajax.reload();
                        $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Data berhasi dihapus</p>', {
                            type: 'success',
                            delay: 3000,
                            allow_dismiss: true,
                            offset: { from: 'top', amount: 20 }
                        });
                    }, complete: function () {
                        $('#tabelnya').loading('stop');
                    }
                });
            }
        });

    }
    window.hapusdata = hapusdata;
    //==========================================================

    function showdetail(id) {
        window.location.href="buku/detail/"+id;
    }
    window.showdetail = showdetail;
    //==========================================================

    function editdata(id) {
        caridata(id);
        $("#tabelnya").hide(700);
        $("#haledit").show(700);
    }
    window.editdata = editdata;
    //=============================================================
    function caridata(id) {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'buku/' + id,
            success: function (data) {
                $.each(data, function (key, value) {
                    $('#edit_judul').val(value.judul);
                    $('#edit_penulis').val(value.penulis);
                    $("#edit_halaman").val(value.halaman);
                    $("#edit_tgl").val(value.tanggal_terbit);
                    $("#edit_isbn").val(value.isbn);
                    $("#edit_bahasa").val(value.bahasa);
                    $("#edit_penerbit").val(value.penerbit);
                    $("#edit_berat").val(value.berat);
                    $("#edit_lebar").val(value.lebar);
                    $("#edit_deskripsi").val(value.deskripsi);
                    $("#edit_kode").val(value.kode);
                    $("#edit_jumlah").val(value.jumlah);
                    $("#edit_lokasi").val(value.lokasi);
                    $('#kode_edit').val(value.id);
                    $('#edit_kode_lama').val(value.kode);
                    if(value.umum=='ya'){
                        $("#edit_umum").prop('checked',true);
                    }else{
                        $("#edit_umum").prop('checked',false);
                    }
                    $('#edit_fotolama').val(value.gambar);
                    var url = '../perpustakaan/public/img/buku/';
                    console.log(url);
                    $('#edit_kategori').val(value.id_kategori);
                    if (value.gambar != 'n') {
                        $("#imagebuku").attr("src", "img/buku/" + value.gambar);
                    } else {
                        $("#imagebuku").attr("src", "img/default/noimage.jpg");
                    }
                });
            }, error: function () {

                alert('error');
            }
        });
    }
    //================================================================
    $("#kembaliedit").click(function (e) {
        $("#tabelnya").show(700);
        $("#haledit").hide(700);
    });
    //===================================================================
    $("#input_kode").keyup(function(){

        var kode = $(this).val().trim();
  
        if(kode != ''){
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'bukukode/' + kode,
                success: function (data) {
                    if(data>0){
                        $("#error_kode").html('Kode telah dipakai,coba yang lain');
                        $("#input_kode").val('');
                    }else{
                        $("#error_kode").html('');
                    }
                }, error: function () {
    
                    alert('error');
                }
            });
        }
  
      });
    //===================================================================
    $("#edit_kode").keyup(function(){

        var kode = $(this).val().trim();
  
        if(kode != '' && kode != $('#edit_kode_lama').val()){
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'bukukode/' + kode,
                success: function (data) {
                    if(data>0){
                        $("#error_edit_kode").html('Kode telah dipakai,coba yang lain');
                        $("#edit_kode").val('');
                    }else{
                        $("#error_edit_kode").html('');
                    }
                }, error: function () {
    
                    alert('error');
                }
            });
        }
  
      });
    //===================================================================
    $('#btnedit').click(function (e) {
        var judul = $('#edit_judul').val();
        var kodebuku = $("#edit_kode").val();
        var jumlah = $("#edit_jumlah").val();
        var lokasi = $("#edit_lokasi").val();
        var penulis = $("#edit_penulis").val();
        var kode = $('#kode_edit').val();
        var halaman = $("#edit_halaman").val();
        var tgl = $("#edit_tgl").val();
        var isbn = $("#edit_isbn").val();
        var bahasa = $("#edit_bahasa").val();
        var penerbit = $("#edit_penerbit").val();
        var berat = $("#edit_berat").val();
        var lebar = $("#edit_lebar").val();
        var deskripsi = $("#edit_deskripsi").val();
        if (lokasi==''||jumlah==''||kodebuku==''||judul == '' || penulis == '' || halaman == '' || tgl == '' || isbn == '' || bahasa == '' || penerbit == '' || berat == '' || lebar == '' || deskripsi == '') {
            $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Maaf, Data tidak boleh kosong</p>', {
                type: 'danger',
                delay: 3000,
                allow_dismiss: true,
                offset: { from: 'top', amount: 20 }
            });
            return false;
        } else {
            $('#haledit').loading('toggle');
            $("#formedit").submit(function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                var formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'buku/' + kode,
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function () {
                        $('#example-datatable').DataTable().ajax.reload();
                        $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Data berhasi disimpan</p>', {
                            type: 'success',
                            delay: 3000,
                            allow_dismiss: true,
                            offset: { from: 'top', amount: 20 }
                        });

                        $('#edit_foto').val('');
                        $("#tabelnya").show(700);
                        $("#haledit").hide(700);
                    }, complete: function () {
                        $('#haledit').loading('stop');
                    }
                });
            });

        }

    });
});

function isNumberKey2(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;

    return true;
}
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}


