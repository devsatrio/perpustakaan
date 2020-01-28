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
        var tgl = $("#input_tgl").val();
        var isbn = $("#input_isbn").val();
        var penerbit = $("#input_penerbit").val();
        var deskripsi = $('#input_deskripsi').val();
        var pdffile = $('#input_pdf').val();
        var foto = $('#input_foto').val();
        if (judul == '' || penerbit == '' || deskripsi == '' || tgl == '' || isbn == ''|| pdffile=='' || foto=='') {
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
                    url: '/ebook',
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
                        $("#input_tgl").val('');
                        $("#input_isbn").val('');
                        $("#input_penerbit").val('');
                        $("#input_deskripsi").val('');
                        $("#input_foto").val('');
                        $('#input_pdf').val('');
                        $("#input_halaman").val('');
                        $('#input_bahasa').val('');
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
                    $("#edit_tgl").val(value.tanggal_terbit);
                    $("#edit_isbn").val(value.isbn);
                    $("#edit_penerbit").val(value.penerbit);
                    $("#edit_deskripsi").val(value.deskripsi);
                    $('#kode_edit').val(value.id);
                    $('#edit_fotolama').val(value.gambar);
                    $('#edit_filelama').val(value.ebook);
                    $('#edit_kategori').val(value.id_kategori);
                    $('#edit_halaman').val(value.halaman);
                    $('#edit_bahasa').val(value.bahasa);
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
    $('#btnedit').click(function (e) {
        var judul = $('#edit_judul').val();
        var kode = $('#kode_edit').val();
        var tgl = $("#edit_tgl").val();
        var isbn = $("#edit_isbn").val();
        var penerbit = $("#edit_penerbit").val();
        var deskripsi = $("#edit_deskripsi").val();
        if (judul == '' || tgl == '' || isbn == '' || penerbit == '' || deskripsi == '') {
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
                    url: '/ebook/' + kode,
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
                        $('#edit_pdf').val('');
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


