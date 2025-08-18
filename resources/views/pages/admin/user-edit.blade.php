<x-admin.layout>
    <div class="card pb-5">
        <div class="card-header">
            <h5 class="text-dark text-2xl font-semibold sm:mb-0 mb-0">Edit User</h5>
        </div>
        <div class="row pb-2 pt-3 text-xs w-full items-center">
            <div class="col-md-7 flex ">

                <img class="p-10 " src="{{ asset('assets/images/logos/logo-text.png') }}" alt="">
            </div>
            <div class="col-md-5 justify-end">
                <form action="{{ route('admin.user-update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-form.input id="" label="Nama" type="text" name="nama"
                        value="{{ $user->nama }}" helperText="" />
                    <x-form.input id="" label="Email" type="email" name="email"
                        value="{{ $user->email }}" helperText="" />
                    <x-form.input id="" label="Password" type="password" name="password" value=""
                        helperText="Kosongkan jika tidak mengganti Password" />

                    <div class="flex justify-end mt-4">
                        <x-component.button label="Simpan" type="submit" color="primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin.layout>
