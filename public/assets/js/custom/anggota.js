$(document).ready(function () {

    //=========================================================
    $("#tambah").click(function (e) {
        $("#tabelnya").hide(700);
        $("#halinput").show(700);
        $('#input_nama').focus();
    });

    //=========================================================
    $("#kembali").click(function (e) {
        $("#tabelnya").show(700);
        $("#halinput").hide(700);
    });

    //===============================================================
    function hapusdata(id) {
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
                        url: 'anggota/' + id,
                        data: {
                            '_token': $('input[name=_token]').val(),
                        },
                        success: function () {
                            $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Data berhasi dihapus</p>', {
                                type: 'success',
                                delay: 3000,
                                allow_dismiss: true,
                                offset: { from: 'top', amount: 20 },
                            });
                            $('#example-datatable').DataTable().ajax.reload();
                        }, complete: function () {
                            $('#tabelnya').loading('stop');
                        }
                    });
                }
            });

    }
    window.hapusdata = hapusdata;

    //============================================================
    $("#simpan").click(function (e) {
        var nama = $("#input_nama").val();
        var alamat = $("#input_alamat").val();
        var notelp = $("#input_notelp").val();
        var username = $("#input_user").val();
        var password = $("#input_pass").val();
        var kpassword = $("#input_kpass").val();

        if (nama == '' || alamat == '' || notelp == '' || username == '' || password == '' || kpassword == '') {
            $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Maaf, Data tidak boleh kosong</p>', {
                type: 'danger',
                delay: 3000,
                allow_dismiss: true,
                offset: { from: 'top', amount: 20 }
            });
            return false;
        } else {
            if (password != kpassword) {
                $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Maaf, Konfirmasi password salah</p>', {
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
                        url: 'anggota',
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
                            $("#input_nama").val('');
                            $("#input_alamat").val('');
                            $("#input_notelp").val('');
                            $("#input_user").val('');
                            $('#input_status').val('Umum');
                            $("#input_pass").val('');
                            $("#input_kpass").val('');
                            $('#input_foto').val('');
                        },
                        complete: function (data) {
                            $('#halinput').loading('stop');
                        }
                    });
                });
            }
        }
    });
    //=============================================================
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
            url: 'anggota/' + id,
            success: function (data) {
                $.each(data, function (key, value) {
                    $('#edit_username').val(value.username);
                    $('#edit_nama').val(value.nama);
                    $('#edit_alamat').val(value.alamat);
                    $('#edit_notelp').val(value.notelp);
                    $('#kode_edit').val(value.id);
                    $('#edit_status').val(value.status_anggota);
                    $('#edit_fotolama').val(value.gambar);
                    if (value.gambar != 'n') {
                        $("#imageuser").attr("src", "img/anggota/" + value.gambar);
                    } else {
                        $("#imageuser").attr("src", "img/default/noimage.jpg");
                    }
                });
            }, error: function () {
                alert('error');
            }
        });
    }
    //================================================================
    $('#btnedit').click(function (e) {
        var username = $('#edit_username').val();
        var nama = $("#edit_nama").val();
        var alamat = $("#edit_alamat").val();
        var notelp = $("#edit_notelp").val();
        var kode = $('#kode_edit').val();
        var password = $('#edit_password').val();
        var kpassword = $('#edit_kpassword').val();

        if (username == '' || nama == '' || alamat == '' || notelp == '') {
            $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Maaf, Data tidak boleh kosong</p>', {
                type: 'danger',
                delay: 3000,
                allow_dismiss: true,
                offset: { from: 'top', amount: 20 }
            });
            return false;
        } else {
            if (password == '') {
                $('#haledit').loading('toggle');
                $('#formedit').submit(function (e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    var formData = new FormData(this);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: 'anggota/' + kode,
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function () {
                            $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Perubahan Data berhasi disimpan</p>', {
                                type: 'success',
                                delay: 3000,
                                allow_dismiss: true,
                                offset: { from: 'top', amount: 20 }
                            });
                            $('#example-datatable').DataTable().ajax.reload();
                            $("#tabelnya").show(700);
                            $("#haledit").hide(700);
                            $('#edit_foto').val('');
                            $('#edit_password').val('');
                            $('#edit_kpassword').val('');
                            $('#edit_status').val('Umum');
                        }, complete: function () {
                            $('#haledit').loading('stop');
                        }
                    });
                })
            } else {
                if (password == kpassword) {
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
                            url: 'anggota/' + kode,
                            type: 'POST',
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function () {
                                $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Perubahan Data berhasi disimpan</p>', {
                                    type: 'success',
                                    delay: 3000,
                                    allow_dismiss: true,
                                    offset: { from: 'top', amount: 20 }
                                });
                                $('#example-datatable').DataTable().ajax.reload();
                                $("#tabelnya").show(700);
                                $("#haledit").hide(700);
                                $('#edit_foto').val('');
                                $('#edit_password').val('');
                                $('#edit_kpassword').val('');
                            }, complete: function () {
                                $('#haledit').loading('stop');
                            }
                        });
                    });
                } else {
                    $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Maaf, Konfirmasi password salah</p>', {
                        type: 'danger',
                        delay: 3000,
                        allow_dismiss: true,
                        offset: { from: 'top', amount: 20 }
                    });
                    return false;
                }

            }
        }

    });
    //================================================================
    $("#kembaliedit").click(function (e) {
        $("#tabelnya").show(700);
        $("#haledit").hide(700);
    });


});