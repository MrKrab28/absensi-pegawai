<x-admin.layout>
    <h2 class="text-2xl font-semibold mb-0">Data User</h2>
    <div class="card">
        <div class="overflow-x-auto p-4 py-0">
            {{-- <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow"> --}}
            <!-- Table -->
            <div class="relative overflow-x-auto">
               <x-form.modal id="userModal" title="Tambah User" label="Pegawai" size="large-2"></x-form.modal>
                    <x-component.datatable id="userTable" title="User" label="Pegawai">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Color</th>
                                <th>Category</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="bold">{{ $user->nama }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-component.datatable>



            </div>
        </div>
    </div>
</x-admin.layout>
