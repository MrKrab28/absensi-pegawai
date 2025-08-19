<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
</div>
<x-admin.layout>
    <div class="card pb-5">
        <div class="card-header">
            <div class="row pb-2 pt-3 text-xs w-full">
                <div class="col-md-6">

                    <h5 class="text-dark text-2xl font-semibold sm:mb-0 mb-0">Data Work Type</h5>
                </div>
                <div class="col-md-6">

                    <x-form.modal id="workTypeModal" title="Tambah WorkType" label="Tambah Data" size="medium"
                        action="{{ route('admin.work-type-store') }}">

                        {{-- <x-form.input id="code" label="Code" name="code" :required="true" /> --}}
                        <x-form.input id="name" label="Nama" name="nama" :required="true" />
                        <x-form.input id="deskripsi" label="Deskripsi" name="deskripsi"
                            placeholder="Beri deskripsi jika ada" />
                    </x-form.modal>
                </div>
            </div>
        </div>
        <div class="relative overflow-x-auto pt-3">

            <div class="overflow-x-auto  pt-0  pb-5 mb-5 ps-5 ms-5 me-10 py-0">
                {{-- <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow"> --}}
                <!-- Table -->


                <x-component.datatable id="workTypeTable" title="workType" label="workType">
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
                        @foreach ($workTypes as $workType)
                            <tr>
                                <td class="w-[50px] text-center">{{ $loop->iteration }}</td>
                                <td>{{ $workType->code }}</td>
                                <td>{{ $workType->nama }}</td>
                                <td>{{ $workType->deskripsi }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ route('admin.work-type-edit', $workType->id) }}"
                                                class="inline-flex items-center p-1 bg-blue-500 hover:bg-blue-700 text-white rounded-md text-sm font-small focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-blue-500"">
                                                <x-icon name="edit" class="w-1 h-1" />
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <form id="form-delete-{{ $workType->id }}"
                                                action="{{ route('admin.work-type-delete', $workType->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-component.button-icon type="button" color="danger"
                                                    class="btn-delete" icon="trash" data-id="{{ $workType->id }}"
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
