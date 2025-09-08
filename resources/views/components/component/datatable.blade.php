@props(['id', 'title', 'label'])

<table id="{{ $id }}" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

    <!-- Kontrol entries & search -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-4 gap-2">
        <div class="flex items-center gap-1">
            <label for="entriesPerPage" class="text-gray-700 dark:text-gray-300 text-sm">Show</label>
            <select id="entriesPerPage" class="appearance-none border border-gray-300 text-sm rounded-md pl-1 pr-1 py-1 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="5">5</option>
                <option value="10" selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <label class="text-gray-700 dark:text-gray-300 text-sm">entries</label>
        </div>

        <input type="text" id="searchInput" placeholder="Search..." class="w-60 mt-2 sm:mt-0 px-2 py-1 text-sm border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <!-- Table slot -->
    {{ $slot }}
</table>

<!-- Info & Pagination -->
<div class="flex flex-col sm:flex-row justify-between items-center mt-4 gap-2">
    <div class="text-sm text-gray-600 dark:text-gray-300 ms-5 me-5" id="tableInfo"></div>
    <div id="paginationControls" class="flex gap-1"></div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const tableBody = document.querySelector("#{{ $id }} tbody");
    let rows = Array.from(tableBody.querySelectorAll("tr"));
    let filteredRows = [...rows];

    const searchInput = document.getElementById("searchInput");
    const entriesPerPageSelect = document.getElementById("entriesPerPage");
    const tableInfo = document.getElementById("tableInfo");
    const paginationControls = document.getElementById("paginationControls");

    let currentPage = 1;
    let entriesPerPage = parseInt(entriesPerPageSelect.value);

    function renderTable() {
        const start = (currentPage - 1) * entriesPerPage;
        const end = start + entriesPerPage;
        const paginatedRows = filteredRows.slice(start, end);

        tableBody.innerHTML = "";
        paginatedRows.forEach(row => tableBody.appendChild(row));

        tableInfo.textContent =
            `Showing ${filteredRows.length === 0 ? 0 : start + 1} to ${Math.min(end, filteredRows.length)} of ${filteredRows.length} entries`;

        renderPagination();
    }

    function renderPagination() {
        paginationControls.innerHTML = "";
        const totalPages = Math.ceil(filteredRows.length / entriesPerPage);

        // Prev button
        const prevBtn = document.createElement("button");
        prevBtn.innerHTML = "&laquo;";
        prevBtn.disabled = currentPage === 1;
        prevBtn.className = `px-3 py-1 rounded-full ${currentPage === 1 ? 'text-gray-400 cursor-not-allowed' : 'hover:bg-gray-200'}`;
        prevBtn.addEventListener("click", () => { currentPage--; renderTable(); });
        paginationControls.appendChild(prevBtn);

        // Page numbers
        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement("button");
            btn.textContent = i;
            btn.className = `px-3 py-1 rounded-full ${i === currentPage ? 'bg-gray-100 font-bold' : 'hover:bg-gray-200'}`;
            btn.addEventListener("click", () => { currentPage = i; renderTable(); });
            paginationControls.appendChild(btn);
        }

        // Next button
        const nextBtn = document.createElement("button");
        nextBtn.innerHTML = "&raquo;";
        nextBtn.disabled = currentPage === totalPages;
        nextBtn.className = `px-3 py-1 rounded-full ${currentPage === totalPages ? 'text-gray-400 cursor-not-allowed' : 'hover:bg-gray-200'}`;
        nextBtn.addEventListener("click", () => { currentPage++; renderTable(); });
        paginationControls.appendChild(nextBtn);
    }

    // Search filter
    searchInput.addEventListener("input", () => {
        const searchValue = searchInput.value.toLowerCase();
        filteredRows = rows.filter(row => row.textContent.toLowerCase().includes(searchValue));
        currentPage = 1;
        renderTable();
    });

    // Entries per page
    entriesPerPageSelect.addEventListener("change", () => {
        entriesPerPage = parseInt(entriesPerPageSelect.value);
        currentPage = 1;
        renderTable();
    });

    renderTable();

    // ==========================
    // Tombol Hapus AJAX
    // ==========================
    document.addEventListener("click", function(e) {
        if (!e.target.closest(".btn-delete")) return;
        e.preventDefault();

        const btn = e.target.closest(".btn-delete");
        const form = btn.closest("form");
        const row = form.closest("tr");

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: form.action,
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function(response) {
                        if (response.success) {
                            // Hapus row dari array
                            rows = rows.filter(r => r !== row);
                            filteredRows = filteredRows.filter(r => r !== row);

                            renderTable();

                            Toastify({
                                text: response.message || "Data berhasil dihapus",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#4fbe87"
                            }).showToast();
                        } else {
                            Toastify({
                                text: response.message || "Gagal menghapus data",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#f44336"
                            }).showToast();
                        }
                    },
                    error: function() {
                        Toastify({
                            text: "Terjadi kesalahan saat menghapus data",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#f44336"
                        }).showToast();
                    }
                });
            }
        });
    });
});
</script>
