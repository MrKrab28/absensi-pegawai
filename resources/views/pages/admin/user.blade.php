<x-admin.layout>
    <div class="card pb-5">
        <div class="card-header">
            <div class="row pb-2 pt-3 text-xs w-full">
                <div class="col-md-6">

                    <h5 class="text-xl ms-6 font-medium mb-0">Data User</h5>
                </div>
                <div class="col-md-6">

                    <x-form.modal id="userModal" title="Tambah User" label="Tambah Data" size="large-2"></x-form.modal>
                </div>
            </div>
        </div>
        <div class="relative overflow-x-auto pt-3">

            <div class="overflow-x-auto  pt-0  pb-5 mb-5 ps-5 ms-5 me-10 py-0">
                {{-- <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow"> --}}
                <!-- Table -->


                <x-component.datatable id="userTable" title="User" label="User">
                    <thead>
                        <tr>

                            <th class="w-[50px] text-center">#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($users as $user)
                            <tr>
                                <td class="w-[50px] text-center">{{ $loop->iteration }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ route('admin.user-edit', $user->id) }}"
                                                class="inline-flex items-center p-1 bg-blue-500 hover:bg-blue-700 text-white rounded-md text-sm font-small focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-blue-500"">
                                                <x-icon name="edit" class="w-1 h-1" />
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{ route('admin.user-delete', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-component.button-icon type="submit" color="danger" icon="trash"
                                                    :small="true" />
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-component.datatable>
            </div>
        </div>
    </div>
</x-admin.layout>
