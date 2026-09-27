<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Step 1 & 2 - Validasi di Controller + Error</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 60px auto; }
        input { padding: 8px; width: 100%; box-sizing: border-box; margin-bottom: 8px; }
        button { padding: 8px 20px; cursor: pointer; }
        .alert-danger { color: red; border: 1px solid red; padding: 10px; margin-bottom: 10px; }
        .success { color: green; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Validasi di Controller + Menampilkan Error</h2>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    {{-- Menampilkan semua pesan error (Step 2) --}}
    @if ($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register-basic">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" value="{{ old('name') }}">

        <label>Email:</label>
        <input type="text" name="email" value="{{ old('email') }}">

        <label>Password:</label>
        <input type="password" name="password">

        <label>Konfirmasi Password:</label>
        <input type="password" name="password_confirmation">

        <button type="submit">Submit</button>
    </form>
</body>
</html>
