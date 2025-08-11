<div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">

    <!-- Bagian atas -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-4 gap-2">
        <!-- Search -->
        <input type="text" id="searchInput"
            placeholder="Search..."
            class="w-48 px-2 py-1 text-sm border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500" />

        <!-- Entries per page -->
        <div class="flex items-center gap-2">
            <label for="entriesPerPage" class="text-gray-700 dark:text-gray-300 text-sm">Entries per page</label>
            <div class="relative">
                <select id="entriesPerPage"
                    class="appearance-none border border-gray-300 text-sm rounded-md pl-2 pr-8 py-1 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <!-- Icon Chevron -->
                <svg class="pointer-events-none absolute right-2 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500"
                    fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">Product name</th>
                    <th class="px-6 py-3">Color</th>
                    <th class="px-6 py-3">Category</th>
                    <th class="px-6 py-3">Price</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $product->name }}
                        </td>
                        <td class="px-6 py-4">{{ $product->color }}</td>
                        <td class="px-6 py-4">{{ $product->category }}</td>
                        <td class="px-6 py-4">{{ $product->price }}</td>
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
</div>

<!-- JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
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

            tableInfo.textContent = `Showing ${filteredRows.length === 0 ? 0 : start + 1} to ${Math.min(end, filteredRows.length)} of ${filteredRows.length} entries`;

            renderPagination();
        }

        function renderPagination() {
            paginationControls.innerHTML = "";
            const totalPages = Math.ceil(filteredRows.length / entriesPerPage);

            // Previous Button
            const prevBtn = document.createElement("button");
            prevBtn.textContent = "Previous";
            prevBtn.className = `px-3 py-1 border rounded ${currentPage === 1 ? 'bg-gray-200 text-gray-500 cursor-not-allowed' : 'bg-white hover:bg-gray-100'}`;
            prevBtn.disabled = currentPage === 1;
            prevBtn.addEventListener("click", () => {
                if (currentPage > 1) {
                    currentPage--;
                    renderTable();
                }
            });
            paginationControls.appendChild(prevBtn);

            // Page Numbers
            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement("button");
                btn.textContent = i;
                btn.className = `px-3 py-1 border rounded ${i === currentPage ? 'bg-blue-500 text-white' : 'bg-white hover:bg-gray-100'}`;
                btn.addEventListener("click", () => {
                    currentPage = i;
                    renderTable();
                });
                paginationControls.appendChild(btn);
            }

            // Next Button
            const nextBtn = document.createElement("button");
            nextBtn.textContent = "Next";
            nextBtn.className = `px-3 py-1 border rounded ${currentPage === totalPages ? 'bg-gray-200 text-gray-500 cursor-not-allowed' : 'bg-white hover:bg-gray-100'}`;
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






        <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">

            <!-- Bagian atas: Search & Entries per page -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-4 gap-2">
                <!-- Search -->


                <!-- Entries per page -->
                <div class="flex items-center gap-2">
                    <label for="entriesPerPage" class="text-gray-700 dark:text-gray-300 text-sm">Entries per
                        page</label>

                    <div class="relative">
                        <select id="entriesPerPage"
                            class="appearance-none border border-gray-300 text-sm rounded-md pl-2 pr-7 py-1 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>

                        <!-- Icon Chevron -->
                        {{-- <svg class="pointer-events-none absolute right-2 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg> --}}
                    </div>
                </div>

                <div>
                    <input type="text" id="searchInput" placeholder="Search..."
                        class="w-60 px-2 py-1 text-sm border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
            </div>

            <!-- Table -->
            <div class="relative overflow-x-auto">
                <table id="productTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">Product name</th>
                            <th class="px-6 py-3">Color</th>
                            <th class="px-6 py-3">Category</th>
                            <th class="px-6 py-3">Price</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody"></tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex justify-between items-center mt-4">
                <div id="tableInfo" class="text-sm text-gray-600 dark:text-gray-300"></div>
                <div id="pagination" class="flex space-x-1"></div>
            </div>
        </div>

        <script>
            const products = [{
                    name: 'Apple MacBook Pro 17"',
                    color: 'Silver',
                    category: 'Laptop',
                    price: '$2999'
                },
                {
                    name: 'Microsoft Surface Pro',
                    color: 'White',
                    category: 'Laptop PC',
                    price: '$1999'
                },
                {
                    name: 'Magic Mouse 2',
                    color: 'Black',
                    category: 'Accessories',
                    price: '$99'
                },
                {
                    name: 'Logitech Keyboard',
                    color: 'Black',
                    category: 'Accessories',
                    price: '$49'
                },
                {
                    name: 'Dell XPS 13',
                    color: 'White',
                    category: 'Laptop',
                    price: '$1200'
                },
                {
                    name: 'HP Spectre x360',
                    color: 'Silver',
                    category: 'Laptop',
                    price: '$1500'
                },
                {
                    name: 'Google Pixelbook',
                    color: 'Gray',
                    category: 'Laptop',
                    price: '$999'
                },
                {
                    name: 'Samsung Monitor',
                    color: 'Black',
                    category: 'Monitor',
                    price: '$300'
                },
                {
                    name: 'Apple Magic Trackpad',
                    color: 'Silver',
                    category: 'Accessories',
                    price: '$129'
                },
                {
                    name: 'Asus ZenBook',
                    color: 'Blue',
                    category: 'Laptop',
                    price: '$1400'
                },
            ];

            let rowsPerPage = parseInt(document.getElementById('entriesPerPage').value);
            let currentPage = 1;
            let filteredProducts = [...products];

            const tableBody = document.getElementById('tableBody');
            const pagination = document.getElementById('pagination');
            const searchInput = document.getElementById('searchInput');
            const entriesPerPageSelect = document.getElementById('entriesPerPage');
            const tableInfo = document.getElementById('tableInfo');

            function renderTable() {
                tableBody.innerHTML = '';

                const start = (currentPage - 1) * rowsPerPage;
                const end = start + rowsPerPage;
                const pageItems = filteredProducts.slice(start, end);

                if (pageItems.length === 0) {
                    tableBody.innerHTML = '<tr><td colspan="4" class="text-center py-4">No data found.</td></tr>';
                    tableInfo.textContent = 'Showing 0 to 0 of 0 entries';
                    return;
                }

                pageItems.forEach(product => {
                    const row = document.createElement('tr');
                    row.className = 'bg-white border-b dark:bg-gray-800 dark:border-gray-700';
                    row.innerHTML = `
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${product.name}</th>
                <td class="px-6 py-4">${product.color}</td>
                <td class="px-6 py-4">${product.category}</td>
                <td class="px-6 py-4">${product.price}</td>
            `;
                    tableBody.appendChild(row);
                });

                tableInfo.textContent =
                    `Showing ${start + 1} to ${Math.min(end, filteredProducts.length)} of ${filteredProducts.length} entries`;
            }

            function renderPagination() {
                pagination.innerHTML = '';
                const totalPages = Math.ceil(filteredProducts.length / rowsPerPage);

                if (totalPages <= 1) return;

                // Previous button
                const prevBtn = document.createElement('button');
                prevBtn.textContent = '‹';
                prevBtn.className = 'px-3 py-1 border rounded-md ' + (currentPage === 1 ? 'text-gray-400 cursor-not-allowed' :
                    'hover:bg-gray-100');
                prevBtn.disabled = currentPage === 1;
                prevBtn.onclick = () => {
                    if (currentPage > 1) {
                        currentPage--;
                        renderTable();
                        renderPagination();
                    }
                };
                pagination.appendChild(prevBtn);

                for (let i = 1; i <= totalPages; i++) {
                    const btn = document.createElement('button');
                    btn.textContent = i;
                    btn.className = 'px-3 py-1 border rounded-md ' + (i === currentPage ?
                        'bg-blue-600 text-white border-blue-600' :
                        'bg-white text-gray-700 border-gray-300 hover:bg-gray-100');
                    btn.onclick = () => {
                        currentPage = i;
                        renderTable();
                        renderPagination();
                    };
                    pagination.appendChild(btn);
                }

                // Next button
                const nextBtn = document.createElement('button');
                nextBtn.textContent = '›';
                nextBtn.className = 'px-3 py-1 border rounded-md ' + (currentPage === totalPages ?
                    'text-gray-400 cursor-not-allowed' : 'hover:bg-gray-100');
                nextBtn.disabled = currentPage === totalPages;
                nextBtn.onclick = () => {
                    if (currentPage < totalPages) {
                        currentPage++;
                        renderTable();
                        renderPagination();
                    }
                };
                pagination.appendChild(nextBtn);
            }

            // Search
            searchInput.addEventListener('input', () => {
                const searchTerm = searchInput.value.toLowerCase();
                filteredProducts = products.filter(product =>
                    Object.values(product).some(val => val.toLowerCase().includes(searchTerm))
                );
                currentPage = 1;
                renderTable();
                renderPagination();
            });

            // Change rows per page
            entriesPerPageSelect.addEventListener('change', () => {
                rowsPerPage = parseInt(entriesPerPageSelect.value);
                currentPage = 1;
                renderTable();
                renderPagination();
            });

            // Initial render
            renderTable();
            renderPagination();
        </script>

