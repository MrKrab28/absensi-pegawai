<x-admin.layout>
    <div class="card">
        <style></style>
        <div class="overflow-x-auto p-4">
            <div class="bg-white shadow-md rounded-2xl overflow-hidden">
                <table id="example" class="class="w-full">
                    <thead class="bg-gray-50/80 backdrop-blur-sm">
                        <tr class="border-b border-gray-200">
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Position</th>
                            <th class="px-6 py-4">Office</th>
                            <th class="px-6 py-4">Age</th>
                            <th class="px-6 py-4">Start date</th>
                            <th class="px-6 py-4">Salary</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-blue-50/50 transition-colors duration-300 group">
                            <td class="px-6 py-4 font-medium text-gray-800">Cedric Kelly</td>
                            <td class="px-6 py-4">Senior Javascript Developer</td>
                            <td class="px-6 py-4">Edinburgh</td>
                            <td class="px-6 py-4">22</td>
                            <td class="px-6 py-4">2012-03-29</td>
                            <td class="px-6 py-4">$433,060</td>
                        </tr>
                        <!-- Tambah baris lainnya di sini -->
                    </tbody>
                    <tfoot class="bg-gray-50/80 backdrop-blur-sm border-t border-gray-200">
                        <tr>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Position</th>
                            <th class="px-6 py-3">Office</th>
                            <th class="px-6 py-3">Age</th>
                            <th class="px-6 py-3">Start date</th>
                            <th class="px-6 py-3">Salary</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>


    </div>
    {{-- <script>new DataTable('#example');</script> --}}
</x-admin.layout>
