{{-- <form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="email">Email Address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>
    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>
    <div>
        <button type="submit">
            Login
        </button>
    </div>
    <div>
        <a href="{{ route('forget.password') }}">Forgot Your Password?</a>
    </div>
</form> --}}


<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funime</title>
  @include('auth.css')
</head>
<body>
  <div class="wrapper">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <h2>Login</h2>
        <div class="input-field">
        <input type="text" id="email" type="email" name="email" value="{{ old('email') }}" required>
        <label>Enter your email</label>
      </div>
      @error('email')
          
          <p style="color: red;">{{ $message }}</p>
      @enderror
      <div class="input-field">
        <input type="password" id="password" type="password" name="password" required>
        <label>Enter your password</label>
        @error('password')
        <input type="password" id="password" type="password" placeholder="{}" name="password" required>
            <p style="color: red;">{{ $message }}</p>
        @enderror
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="{{ route('forget.password') }}">Forgot password?</a>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>