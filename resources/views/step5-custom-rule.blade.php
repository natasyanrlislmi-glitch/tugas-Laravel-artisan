<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Step 5 - Validasi Kustom (Custom Rule)</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 60px auto; }
        input { padding: 8px; width: 100%; box-sizing: border-box; margin-bottom: 8px; }
        button { padding: 8px 20px; cursor: pointer; }
        .error { color: red; margin-bottom: 10px; }
        .success { color: green; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Step 5: Validasi Kustom - Rule "Uppercase"</h2>
    <p>Masukkan nama dalam HURUF KAPITAL untuk lolos validasi.</p>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="/register-custom-rule">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <div class="error">{{ $message }}</div> @enderror

        <button type="submit">Submit</button>
    </form>
</body>
</html>
