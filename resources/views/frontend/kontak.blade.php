<!-- resources/views/frontend/kontak.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Kontak Kami</title>
</head>
<body>
    <h1>Hubungi Kami</h1>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('kirim.ulasan') }}" method="POST">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Pesan / Ulasan:</label><br>
        <textarea name="pesan" rows="5" required></textarea><br><br>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>
