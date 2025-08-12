<x-admin.layout>
    <div class="card">
        <div class="overflow-x-auto p-4">
            {{-- <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow"> --}}

            <!-- Table -->
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <h2 class="text-2xl font-semibold mb-4">Data User</h2>
                    <div class="flex justify-end mb-2">
                        <a href=""
                            class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-3 py-1 rounded-md shadow">
                            + Tambah Data
                        </a>
                    </div>

                    <!-- Bagian atas -->
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4 gap-2">
                        <div class="flex items-center gap-2">
                            <!-- Entries per page -->
                            <div class="flex items-center gap-2">
                                <label for="entriesPerPage" class="text-gray-700 dark:text-gray-300 text-sm">Entries per
                                    page</label>
                                <div class="relative">
                                    <select id="entriesPerPage"
                                        class="appearance-none border border-gray-300 text-sm rounded-md pl-2 pr-8 py-1 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="5">5</option>
                                        <option value="10" selected>10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    {{-- <svg class="pointer-events-none absolute right-2 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg> --}}
                                </div>
                            </div>
                        </div>

                        <!-- Search -->
                        <input type="text" id="searchInput" placeholder="Search..."
                            class="w-48 px-2 py-1 text-sm border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <!-- Table -->
                    <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">Product name</th>
                            <th class="px-6 py-3">Color</th>
                            <th class="px-6 py-3">Category</th>
                            <th class="px-6 py-3">Price</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($users as $user)
                            <tr class="bg-white border-b border-gray-200 dark:bg-gray-500 dark:border-gray-400 hover:bg-gray-100 dark:hover:bg-gray-600"
                                hover:bg-gray-100 dark:hover:bg-gray-600>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $user->nama }}
                                </td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex flex-col sm:flex-row justify-between items-center mt-4 gap-2">
                <div class="text-sm text-gray-600 dark:text-gray-300" id="tableInfo"></div>
                <div id="paginationControls" class="flex gap-1"></div>
            </div>
            {{-- </div> --}}

            <!-- JavaScript -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const tableBody = document.getElementById("tableBody");
                    const rows = Array.from(tableBody.querySelectorAll("tr"));
                    const searchInput = document.getElementById("searchInput");
                    const entriesPerPageSelect = document.getElementById("entriesPerPage");
                    const tableInfo = document.getElementById("tableInfo");
                    const paginationControls = document.getElementById("paginationControls");

                    let currentPage = 1;
                    let entriesPerPage = parseInt(entriesPerPageSelect.value);
                    let filteredRows = [...rows];

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

                        // Tombol «
                        const prevBtn = document.createElement("button");
                        prevBtn.innerHTML = "&laquo;";
                        prevBtn.className =
                            `px-3 py-1 rounded-full ${currentPage === 1 ? 'text-gray-400 cursor-not-allowed' : 'hover:bg-gray-200'}`;
                        prevBtn.disabled = currentPage === 1;
                        prevBtn.addEventListener("click", () => {
                            if (currentPage > 1) {
                                currentPage--;
                                renderTable();
                            }
                        });
                        paginationControls.appendChild(prevBtn);

                        // Nomor halaman
                        for (let i = 1; i <= totalPages; i++) {
                            const btn = document.createElement("button");
                            btn.textContent = i;
                            btn.className =
                                `px-3 py-1 rounded-full ${i === currentPage ? 'bg-gray-100 font-bold' : 'hover:bg-gray-200'}`;
                            btn.addEventListener("click", () => {
                                currentPage = i;
                                renderTable();
                            });
                            paginationControls.appendChild(btn);
                        }

                        // Tombol »
                        const nextBtn = document.createElement("button");
                        nextBtn.innerHTML = "&raquo;";
                        nextBtn.className =
                            `px-3 py-1 rounded-full ${currentPage === totalPages ? 'text-gray-400 cursor-not-allowed' : 'hover:bg-gray-200'}`;
                        nextBtn.disabled = currentPage === totalPages;
                        nextBtn.addEventListener("click", () => {
                            if (currentPage < totalPages) {
                                currentPage++;
                                renderTable();
                            }
                        });
                        paginationControls.appendChild(nextBtn);
                    }

                    searchInput.addEventListener("input", () => {
                        const searchValue = searchInput.value.toLowerCase();
                        filteredRows = rows.filter(row =>
                            row.textContent.toLowerCase().includes(searchValue)
                        );
                        currentPage = 1;
                        renderTable();
                    });

                    entriesPerPageSelect.addEventListener("change", () => {
                        entriesPerPage = parseInt(entriesPerPageSelect.value);
                        currentPage = 1;
                        renderTable();
                    });

                    renderTable();
                });
            </script>
        </div>
    </div>
</x-admin.layout>
