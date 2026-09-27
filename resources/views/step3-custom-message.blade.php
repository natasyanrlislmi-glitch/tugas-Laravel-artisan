<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Step 3 - Custom Validation Message</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 60px auto; }
        input { padding: 8px; width: 100%; box-sizing: border-box; margin-bottom: 8px; }
        button { padding: 8px 20px; cursor: pointer; }
        .error { color: red; margin-bottom: 4px; font-size: 14px; }
        .success { color: green; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Step 3: Custom Validation Message</h2>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="/register-custom-message">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <div class="error">{{ $message }}</div> @enderror

        <label>Email:</label>
        <input type="text" name="email" value="{{ old('email') }}">
        @error('email') <div class="error">{{ $message }}</div> @enderror

        <label>Password:</label>
        <input type="password" name="password">
        @error('password') <div class="error">{{ $message }}</div> @enderror

        <label>Konfirmasi Password:</label>
        <input type="password" name="password_confirmation">

        <button type="submit">Submit</button>
    </form>
</body>
</html>
