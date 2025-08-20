    <x-admin.layout>
        <div class="card pb-5">
            <div class="card-header">
                <div class="row pb-2 pt-3 text-xs w-full">
                    <div class="col-md-6">

                        <h5 class="text-dark text-2xl font-semibold sm:mb-0 mb-0">Data Shifts</h5>
                    </div>
                    <div class="col-md-6">

                        <x-form.modal id="shiftModal" title="Tambah Shift" label="Tambah Data" size="medium"
                            action="{{ route('admin.shift-store') }}">

                            <x-form.input id="name" label="Nama" name="nama" :required="true" type="text" />
                            <x-form.input id="start_time" label="Start Time" name="start_time" :required="true" type="time" />
                            <x-form.input id="end_time" label="End Time" name="end_time" :required="true" type="time" />

                        </x-form.modal>
                    </div>
                </div>
            </div>
            <div class="relative overflow-x-auto pt-3">

                <div class="overflow-x-auto  pt-0  pb-5 mb-5 ps-5 ms-5 me-10 py-0">
                    {{-- <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow"> --}}
                    <!-- Table -->


                    <x-component.datatable id="shiftsTable" title="Position" label="Position">
                        <thead>
                            <tr>

                                <th class="w-[50px] text-center">#</th>
                                <th>Code</th>
                                <th>Nama</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($shifts as $shift)
                                <tr>
                                    <td class="w-[50px] text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $shift->code }}</td>
                                    <td>{{ $shift->nama }}</td>
                                    <td>{{ $shift->start_time }} - WITA</td>
                                    <td>{{ $shift->end_time }} - WITA</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="{{ route('admin.shift-edit', $shift->id) }}"
                                                    class="inline-flex items-center p-1 bg-blue-500 hover:bg-blue-700 text-white rounded-md text-sm font-small focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-blue-500"">
                                                    <x-icon name="edit" class="w-1 h-1" />
                                                </a>

                                            </div>
                                            <div class="col-md-6">
                                                <form id="form-delete-{{ $shift->id }}"
                                                    action="{{ route('admin.shift-delete', $shift->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-component.button-icon type="button" color="danger"
                                                        class="btn-delete" icon="trash" data-id="{{ $shift->id }}"
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
