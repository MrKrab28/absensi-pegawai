import $ from 'jquery';
import 'datatables.net';
import 'datatables.net-responsive';

window.$ = window.jQuery = $;

$(document).ready(function() {
    function initDataTables() {
        $('.datatable').each(function() {
            $(this).DataTable({
                responsive: true,
                pageLength: 10,
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"]],
                language: {
                    sProcessing: "Sedang memproses...",
                    sLengthMenu: "Tampilkan _MENU_ data",
                    sZeroRecords: "Tidak ditemukan data yang sesuai",
                    sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                    sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
                    sSearch: "Cari:",
                    oPaginate: {
                        sFirst: "Pertama",
                        sPrevious: "Sebelumnya",
                        sNext: "Selanjutnya",
                        sLast: "Terakhir"
                    }
                },
                destroy: true
            });
        });
    }

    initDataTables();

    // Re-init jika content di-load via AJAX
    $(document).on('content-loaded', function() {
        initDataTables();
    });

    // Delete row via AJAX
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        let button = $(this);
        let form = button.closest('form');
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
            reverseButtons: true
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response){
                        if(response.success){
                            // Hapus row dari tabel
                            let row = button.closest('tr');
                            row.fadeOut(300, function(){ $(this).remove(); });

                            if(window.toast) toast(response.message, 'success');
                        } else {
                            if(window.toast) toast(response.message || 'Gagal menghapus data', 'error');
                        }
                    },
                    error: function(xhr){
                        if(window.toast) toast('Terjadi kesalahan', 'error');
                    }
                });
            }
        });
    });
});
