<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funime</title>
    @include('auth.css')
</head>
<body>
    @if (session('status'))
        <div id="status-message" data-message="{{ session('status') }}"></div>
    @endif

    @if (session('error'))
        <div id="error-message" data-message="{{ session('error') }}"></div>
    @endif

    <div class="wrapper">
        <form method="POST" action="{{ route('forget.password.post') }}">
            @csrf
            <div class="input-field">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                <label for="email">Email Address</label>
            </div>

            @error('email')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <div>
                <button type="submit">
                    Send Password Reset Link
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const statusMessage = document.getElementById('status-message');
            const errorMessage = document.getElementById('error-message');

            if (statusMessage) {
                alert(statusMessage.getAttribute('data-message'));
            }

            if (errorMessage) {
                alert(errorMessage.getAttribute('data-message'));
            }
        });
    </script>
</body>
</html>
