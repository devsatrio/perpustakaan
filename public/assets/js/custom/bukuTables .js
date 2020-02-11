/*
 *  Document   : uiTables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables page
 */

var UiTables = function() {

    return {
        init: function() {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();

            /* Initialize Datatables */
            $('#example-datatable').dataTable({
                processing: true,
                serverSide: true,
                order: [[0, "desc" ]],
                ajax: 'buku/get/json',
                columns: [
                    { data: 'id', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    { data: 'kode', name: 'kode' },
                    { data: 'isbn', name: 'isbn' },
                    { data: 'judul', name: 'judul' },
                    { data: 'penulis', name: 'penulis'},
                    { data: 'namakategori', name: 'namakategori'},
                    { data: 'penerbit', name: 'penerbit' },
                    { data: 'jumlah', name: 'jumlah' },
                    { render: function (data, type, row) {
                        return '<button class="btn btn-warning btn-sm" onclick="showdetail('+ row['id'] +')"><i class="fa fa-eye"></i></button> <button class="btn btn-success btn-sm" onclick="editdata('+ row['id'] +')"><i class="fa fa-wrench"></i></button> <button class="btn btn-danger btn-sm" onclick="hapusdata('+ row['id'] +')"><i class="fa fa-trash"></i></button>'
                    },
                        "className": 'text-center',
                        "orderable": false,
                        "data": null,
                    },
                ],
                pageLength: 10,
                lengthMenu: [[5, 10, 20], [5, 10, 20]]
            });

            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Search');

            /* Select/Deselect all checkboxes in tables */
            $('thead input:checkbox').click(function() {
                var checkedStatus   = $(this).prop('checked');
                var table           = $(this).closest('table');

                $('tbody input:checkbox', table).each(function() {
                    $(this).prop('checked', checkedStatus);
                });
            });

            /* Table Styles Switcher */
            var genTable        = $('#general-table');
            var styleBorders    = $('#style-borders');

            $('#style-default').on('click', function(){
                styleBorders.find('.btn').removeClass('active');
                $(this).addClass('active');

                genTable.removeClass('table-bordered').removeClass('table-borderless');
            });

            $('#style-bordered').on('click', function(){
                styleBorders.find('.btn').removeClass('active');
                $(this).addClass('active');

                genTable.removeClass('table-borderless').addClass('table-bordered');
            });

            $('#style-borderless').on('click', function(){
                styleBorders.find('.btn').removeClass('active');
                $(this).addClass('active');

                genTable.removeClass('table-bordered').addClass('table-borderless');
            });

            $('#style-striped').on('click', function() {
                $(this).toggleClass('active');

                if ($(this).hasClass('active')) {
                    genTable.addClass('table-striped');
                } else {
                    genTable.removeClass('table-striped');
                }
            });

            $('#style-condensed').on('click', function() {
                $(this).toggleClass('active');

                if ($(this).hasClass('active')) {
                    genTable.addClass('table-condensed');
                } else {
                    genTable.removeClass('table-condensed');
                }
            });

            $('#style-hover').on('click', function() {
                $(this).toggleClass('active');

                if ($(this).hasClass('active')) {
                    genTable.addClass('table-hover');
                } else {
                    genTable.removeClass('table-hover');
                }
            });
        }
    };
}();