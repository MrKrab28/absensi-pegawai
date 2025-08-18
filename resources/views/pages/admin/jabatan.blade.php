    <x-admin.layout>
        <div class="card pb-5">
            <div class="card-header">
                <div class="row pb-2 pt-3 text-xs w-full">
                    <div class="col-md-6">

                        <h5 class="text-dark text-2xl font-semibold sm:mb-0 mb-0">Data Positions</h5>
                    </div>
                    <div class="col-md-6">

                        <x-form.modal id="jabatanModal" title="Tambah jabatan" label="Tambah Data" size="medium"
                            action="{{ route('admin.jabatan-store') }}">

                            <x-form.input id="name" label="Nama" name="nama" :required="true" />
                            <x-form.input id="deskripsi" label="Deskripsi" name="deskripsi" :required="true" />

                        </x-form.modal>
                    </div>
                </div>
            </div>
            <div class="relative overflow-x-auto pt-3">

                <div class="overflow-x-auto  pt-0  pb-5 mb-5 ps-5 ms-5 me-10 py-0">
                    {{-- <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow"> --}}
                    <!-- Table -->


                    <x-component.datatable id="positionsTable" title="Position" label="Position">
                        <thead>
                            <tr>

                                <th class="w-[50px] text-center">#</th>
                                <th>Code</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($jabatans as $jabatan)
                                <tr>
                                    <td class="w-[50px] text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $jabatan->code }}</td>
                                    <td>{{ $jabatan->nama }}</td>
                                    <td>{{ Str::limit($jabatan->deskripsi, 50) }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="{{ route('admin.jabatan-edit', $jabatan->id) }}"
                                                    class="inline-flex items-center p-1 bg-blue-500 hover:bg-blue-700 text-white rounded-md text-sm font-small focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-blue-500"">
                                                    <x-icon name="edit" class="w-1 h-1" />
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <form id="form-delete-{{ $jabatan->id }}"
                                                    action="{{ route('admin.jabatan-delete', $jabatan->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-component.button-icon type="button" color="danger"
                                                        class="btn-delete" icon="trash" data-id="{{ $jabatan->id }}"
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
