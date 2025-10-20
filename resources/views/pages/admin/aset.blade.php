    <x-admin.layout>
        <div class="card pb-5">
            <div class="card-header">
                <div class="row pb-2 pt-3 text-xs w-full">
                    <div class="col-md-6">

                        <h5 class="text-dark text-2xl font-semibold sm:mb-0 mb-0">Data Kalibrasi Aset</h5>
                    </div>
                    <div class="col-md-6">

                        <x-form.modal id="asetModal" title="Tambah aset" label="Tambah Data" size="large"
                            action="{{ route('admin.aset-store') }}">

                            <div class="row">
                                <div class="col-md-6">
                                    <x-form.input id="kode" label="Kode" name="kode" :required="true" />
                                    <x-form.input id="name" label="Nama" name="nama" :required="true" />
                                    <x-form.input id="merk" label="Merk" name="merk" :required="true" />
                                    <x-form.select-tom id="status" name="status" label="Status" :required="true">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="laik">Laik</option>
                                        <option value="tidak laik">Tidak Laik</option>
                                    </x-form.select-tom>
                                </div>
                                <div class="col-md-6">

                                    <x-form.input id="type" label="Type" name="type" :required="true" />
                                    <x-form.input id="no_seri" label="No Seri" name="no_seri" :required="true" />
                                    <x-form.input id="lokasi" label="Lokasi" name="lokasi" :required="true" />
                                    <x-form.input id="waktu_kalibrasi" type="date" label="Tanggal Kalibrasi"
                                        name="waktu_kalibrasi" :required="true" />


                                </div>
                            </div>






                        </x-form.modal>
                    </div>
                </div>
            </div>
            <div class="relative overflow-x-auto pt-3">

                <div class="overflow-x-auto  pt-0  pb-5 mb-5 ps-5 ms-5 me-10 py-0">
                    {{-- <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow"> --}}
                    <!-- Table -->


                    <x-component.datatable id="asetTable" title="aset" label="aset">
                        <thead>
                            <tr>

                                <th class="w-[50px] text-center">#</th>
                                <th class="">Kode</th>
                                <th class="">Nama</th>
                                <th class="">Merk</th>
                                <th class="">Tipe</th>
                                <th class="">No. Seri</th>
                                <th class="">Lokasi</th>
                                <th class="">Status <br>( LAIK / TIDAK LAIK )</th>
                                <th class="">Waktu Kalibrasi</th>
                                <th class=""></th>
                                <th class=""></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($asets as $aset)
                                @php
                                    $hari = $aset->hari_sejak_kalibrasi;

                                    if ($hari > 180) {
                                        $bgColor = 'bg-green-500 text-white'; // masih lama
                                    } elseif ($hari <= 180 && $hari >= 0) {
                                        $bgColor = 'bg-yellow-400 text-black'; // mendekati waktu kalibrasi
                                    } else {
                                        $bgColor = 'bg-red-600 text-white'; // sudah lewat jadwal kalibrasi
                                    }
                                @endphp
                                <tr>
                                    <td class="w-[50px] text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $aset->kode }}</td>
                                    <td>{{ $aset->nama }}</td>
                                    <td>{{ $aset->merk }}</td>
                                    <td>{{ $aset->type }}</td>
                                    <td>{{ $aset->no_seri }}</td>
                                    <td>{{ $aset->lokasi }}</td>
                                    <td>{{ strtoupper($aset->status) }}</td>
                                    <td>{{ Carbon\Carbon::parse($aset->waktu_kalibrasi)->format('d-m-Y') }} </td>
                                    <td class="text-center font-semibold">
                                        <span class="block px-3 py-1 rounded-md {{ $bgColor }}">
                                            {{ $hari }} Hari
                                        </span>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="{{ route('admin.aset-edit', $aset->id) }}"
                                                    class="inline-flex items-center p-1 bg-blue-500 hover:bg-blue-700 text-white rounded-md text-sm font-small focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-blue-500"">
                                                    <x-icon name="edit" class="w-1 h-1" />
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <form id="form-delete-{{ $aset->id }}"
                                                    action="{{ route('admin.aset-delete', $aset->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-component.button-icon type="button" color="danger"
                                                        class="btn-delete" icon="trash" data-id="{{ $aset->id }}"
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
