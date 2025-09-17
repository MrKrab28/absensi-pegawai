<x-admin.layout>

    <div class="container">
        <h2>Absensi</h2>


        <form action="{{ route('admin.absensi-masuk') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="shift_id" value="1">
            <input type="hidden" name="longitude" id="longitude">
            <input type="hidden" name="latitude" id="latitude">

            <div class="mb-3">
                <label for="foto" class="form-label">Foto Absensi</label>
                <input type="file" name="foto" class="form-control" accept="image/*" capture="camera">
            </div>

            <button type="submit" class="btn btn-success">Absen Masuk</button>
        </form>

        <hr>


        <form action="{{ route('admin.absensi-keluar') }}" method="POST">
            @csrf
            <input type="hidden" name="shift_id" value="1">
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


    <script>
        // Ambil lokasi otomatis
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    document.getElementById('longitude').value = position.coords.longitude;
                    document.getElementById('latitude').value = position.coords.latitude;
                },
                function(error) {
                    alert('Lokasi tidak bisa diambil, pastikan GPS aktif.');
                }, {
                    enableHighAccuracy: true, // GPS akurat
                    timeout: 5000, // 5 detik timeout
                    maximumAge: 0
                }
            );
        } else {
            alert("Browser tidak mendukung GPS");
        }
    </script>
</x-admin.layout>
