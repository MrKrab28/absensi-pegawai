<x-admin.layout>

    <div class="container">
        <h2>Absensi</h2>

        {{-- Absen Masuk --}}
        <form action="{{ route('absensi.masuk') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="shift_id" value="1"> {{-- nanti sesuaikan dengan shift aktif --}}
            <input type="hidden" name="longitude" id="longitude">
            <input type="hidden" name="latitude" id="latitude">

            <div class="mb-3">
                <label for="foto" class="form-label">Foto Absensi</label>
                <input type="file" name="foto" class="form-control" accept="image/*" capture="camera">
            </div>

            <button type="submit" class="btn btn-success">Absen Masuk</button>
        </form>

        <hr>

        {{-- Absen Keluar --}}
        <form action="{{ route('absensi.keluar') }}" method="POST">
            @csrf
            <input type="hidden" name="shift_id" value="1"> {{-- nanti sesuaikan dengan shift aktif --}}
            <button type="submit" class="btn btn-danger">Absen Keluar</button>
        </form>
    </div>

    <script>
        // Ambil lokasi otomatis
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                document.getElementById('longitude').value = position.coords.longitude;
                document.getElementById('latitude').value = position.coords.latitude;
            });
        }
    </script>


</x-admin.layout>
