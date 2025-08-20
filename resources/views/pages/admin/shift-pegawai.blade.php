    <x-admin.layout>
        <div class="card pb-5">
            <div class="card-header">
                <div class="row pb-2 pt-3 text-xs w-full">
                    <div class="col-md-6">

                        <h5 class="text-dark text-2xl font-semibold sm:mb-0 mb-0">Data Employee Shifts</h5>
                    </div>
                    <div class="col-md-6">

                        <x-form.modal id="employeeShiftModal" title="Tambah Employee Shift" label="Tambah Data"
                            size="medium" action="{{ route('admin.pegawai-shift-store') }}">
                            <x-form.select-tom name="pegawai_id" label="Employee" required>
                                <option value="Employee">  Select Employee...</option>

                                @foreach ($pegawais as $code => $nama)
                                    <option value="{{ $code }}">{{ $code }}-{{ $nama }}</option>
                                @endforeach
                            </x-form.select-tom>
                            <x-form.select-tom name="shift_id" label="Shift" required class="text-2xl">
                                <option value="Shift">  Select Shift...</option>
                                @foreach ($shifts as $code => $nama)
                                    <option class="text-2xl" value="{{ $code }}">{{ $code }} |
                                        {{ $nama }}</option>
                                @endforeach
                            </x-form.select-tom>
                            <x-form.input id="name" label="Nama" name="nama" :required="true"
                                type="text" />
                            <x-form.input id="tgl" label="Tanggal" name="tgl" :required="true"
                                type="time" />

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
                                <th>Pegawai</th>
                                <th>Shift</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($pegawaiShifts as $pegawaiShift)
                                <tr>
                                    <td class="w-[50px] text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $pegawaiShift->code }}</td>
                                    <td>{{ $pegawaiShift->nama }}</td>
                                    <td>{{ $pegawaiShift->start_time }} - WITA</td>
                                    <td>{{ $pegawaiShift->end_time }} - WITA</td>
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
