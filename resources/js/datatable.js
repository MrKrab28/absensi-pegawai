// resources/js/datatables.js

// Import jQuery
import $ from 'jquery';

// Import DataTables
import 'datatables.net';
import 'datatables.net-bs4';
import 'datatables.net-responsive';
import 'datatables.net-responsive-bs4';

// Make jQuery global
window.$ = window.jQuery = $;

// Initialize DataTables
$(document).ready(function() {
    // Function untuk initialize DataTables
    function initDataTables() {
        // Cek apakah ada table dengan class datatable
        if ($('.datatable').length > 0) {
            $('.datatable').each(function() {
                $(this).DataTable({
                    responsive: true,
                    language: {
                        "sProcessing": "Sedang memproses...",
                        "sLengthMenu": "Tampilkan _MENU_ data",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                        "sInfoFiltered": "(disaring dari _MAX_ data keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    },
                    pageLength: 10,
                    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"]],
                    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                         "<'row'<'col-sm-12'tr>>" +
                         "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    ordering: true,
                    searching: true,
                    paging: true,
                    info: true,
                    // Destroy jika sudah ada instance
                    destroy: true
                });
            });
        }
    }

    // Initialize saat document ready
    initDataTables();

    // Re-initialize jika ada content yang di-load via AJAX
    $(document).on('content-loaded', function() {
        initDataTables();
    });
});
