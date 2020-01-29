//======================================================
$(document).ready(function () {
    //==========================================================
    function updatestatus(id) {
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
                        url: '/updatestatus/' + id,
                        success: function () {
                            $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Pembaharuan berhasi disimpan</p>', {
                                type: 'success',
                                delay: 3000,
                                allow_dismiss: true,
                                offset: { from: 'top', amount: 20 }
                            });
                            $('#example-datatable').DataTable().ajax.reload();
                        }, complete: function () {
                            $('#tabelnya').loading('stop');
                        }
                    });
                }
            });

    }
    window.updatestatus = updatestatus;
    //==================================================================
    function updatedenda(id, id_anggota) {
        $('#kode_user').val(id_anggota);
        $('#kode').val(id);
        $('#jumlah_lain').val('');
        $('#keterangan').val('');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'caripeminjaman/' + id,
            success: function (data) {
                $.each(data, function (key, value) {
                    var tgl = value.tgl_harus_kembali;
                    const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                    const firstDate = new Date();
                    const secondDate = new Date(tgl);
                    const diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay));
                    var denda = diffDays*parseInt($('#biayadenda').val());
                    $('#jumlah').val(denda);
                });
                $('#modal-fade').modal('show');
            }, error: function () {
                alert('error');
            }
        });
    }
    window.updatedenda = updatedenda;
    //================================================================
    $('#simpandenda').on('click', function (e) {
        if ($('#jumlah').val() != '') {
            $('#tabelnya').loading('toggle');
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
                    'kode': $('#kode').val(),
                    'kode_user': $('#kode_user').val(),
                    'jumlah': $('#jumlah').val(),
                    'jumlah_lain': $('#jumlah_lain').val(),
                    'keterangan': $('#keterangan').val(),
                },
                success: function () {
                    $('#modal-fade').modal('hide');
                    $.bootstrapGrowl('<h4><strong>Pemberitahuan</strong></h4> <p>Data berhasi disimpan</p>', {
                        type: 'success',
                        delay: 3000,
                        allow_dismiss: true,
                        offset: { from: 'top', amount: 20 }
                    });
                    $('#example-datatable').DataTable().ajax.reload();
                }, complete: function () {
                    $('#tabelnya').loading('stop');
                }
            });
        }
    });
});
