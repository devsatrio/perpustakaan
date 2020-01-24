$(document).ready(function () {
    //=========================================================
    $("#simpan").click(function (e) {
        var nama = $("#input_nama").val();
        if (nama == '') {
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
                    url: '/kategori',
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
                        $("#input_nama").val('');
                        $("#input_aksi").val('tambah');
                        $("#input_kode").val('');
                    },
                    complete: function (data) {
                        $('#halinput').loading('stop');
                    }
                });
            });
        }
    });
    //==========================================================

    function editdata(id) {
        caridata(id);
    }
    window.editdata = editdata;
    //=============================================================
    function caridata(id) {
        $('#tabelnya').loading('toggle');
        $('#halinput').loading('toggle');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'kategori/' + id,
            success: function (data) {
                $.each(data, function (key, value) {
                    $('#input_nama').val(value.nama);
                    $('#input_kode').val(value.id);
                    $('#input_aksi').val('edit');
                });
            }, error: function () {
                alert('error');
            }, complete: function () {
                $('#tabelnya').loading('stop');
                $('#halinput').loading('stop');
            }
        });
    }
    //==========================================================
    function hapusdata(id) {
        swal({
            title: "Hapus Data ?",
            text: "Data Tidak Dapat Dipulihkan Kembali Setelah Di Hapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if(willDelete) {
                $('#tabelnya').loading('toggle');
                $.ajax({
                    type: 'DELETE',
                    url: 'kategori/' + id,
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
});