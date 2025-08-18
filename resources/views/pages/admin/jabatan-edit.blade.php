<x-admin.layout>
    <div class="card pb-5">
        <div class="card-header">
            <h5 class="text-dark text-2xl font-semibold sm:mb-0 mb-0">Edit jabatan</h5>
        </div>
        <div class="row pb-2 pt-3 text-xs w-full items-center">
            <div class="col-md-7 flex ">

                <img class="p-10 " src="{{ asset('assets/images/logos/logo-text.png') }}" alt="">
            </div>
            <div class="col-md-5 justify-end">
                <form action="{{ route('admin.jabatan-update', $jabatan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-form.input id="nama" label="Nama" type="text" name="nama"
                        value="{{ $jabatan->nama }}" helperText="" />
                    <x-form.input id="deskripsi" label="Deskripsi" type="text" name="deskripsi"
                    value="{{ $jabatan->deskripsi }}"  helperText="" />
                    <x-form.input id="code" label="Code" type="text" name="code"
                        value="{{ $jabatan->code }}" />

                    <div class="flex justify-end mt-4">
                        <x-component.button label="Simpan" type="submit" color="primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin.layout>
