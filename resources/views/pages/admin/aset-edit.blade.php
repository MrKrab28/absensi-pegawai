<x-admin.layout>
    <a href="{{ route('admin.aset') }}" class="flex items-center gap-2 text-gray-700 hover:text-gray-900">
        <x-icon name="arrow-left" class="w-6 h-6" />
        <span>Kembali</span>
    </a>
    <div class="card pb-5">
        <div class="card-header">
            <h5 class="text-dark text-2xl font-semibold sm:mb-0 mb-0">Edit aset</h5>
        </div>

        <div class="row pb-2 pt-3 text-xs w-full items-center">
            <div class="col-md-5 flex ">

                <img class="p-10 " src="{{ asset('assets/images/logos/logo-text.png') }}" alt="">
            </div>
            <div class="col-md-7 justify-end">
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
                <h1 class="inline-block px-3 py-1 rounded-md font-bold text-2xl mb-4  {{ $bgColor }}">
                    {{ $hari }} Hari
                </h1>

                <form action="{{ route('admin.aset-update', $aset->id) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <div class="row">
                        <div class="col-md-6">
                            <x-form.input id="kode" label="Kode" name="kode" value="{{ $aset->kode }}"
                                :required="true" />
                            <x-form.input id="name" label="Nama" name="nama" value="{{ $aset->nama }}"
                                :required="true" />
                            <x-form.input id="merk" label="Merk" name="merk" value="{{ $aset->merk }}"
                                :required="true" />
                            <x-form.select-tom id="status" name="status" label="Status" :required="true">
                                <option value="{{ $aset->status }}">{{ $aset->status }}</option>

                                <option value="laik">Laik</option>
                                <option value="tidak laik">Tidak Laik</option>
                            </x-form.select-tom>
                        </div>
                        <div class="col-md-6">

                            <x-form.input id="type" label="Type" name="type" value="{{ $aset->type }}"
                                :required="true" />
                            <x-form.input id="no_seri" label="No Seri" name="no_seri" value="{{ $aset->no_seri }}"
                                :required="true" />
                            <x-form.input id="lokasi" label="Lokasi" name="lokasi" value="{{ $aset->lokasi }}"
                                :required="true" />
                            <x-form.input id="waktu_kalibrasi" type="date" value="{{ $aset->waktu_kalibrasi }}"
                                label="Tanggal Kalibrasi" name="waktu_kalibrasi" :required="true" />

                            <div class="flex justify-end mt-4">
                                <x-component.button label="Simpan" type="submit" color="primary" />
                            </div>
                        </div>
                    </div>






                </form>
            </div>
        </div>
    </div>
</x-admin.layout>
