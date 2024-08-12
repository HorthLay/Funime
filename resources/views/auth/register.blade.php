{{-- <form method="POST" action="{{ route('register') }}">
    @csrf
    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
    </div>
    <div>
        <label for="email">Email Address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>
    <div>
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" name="password_confirmation" required>
    </div>
    <div>
        <button type="submit">
            Register
        </button>
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
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <h2>Login</h2>


      <div class="input-field">
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        <label>Enter your Name</label>
      </div>


        <div class="input-field">
        <input type="text" id="email" type="email" name="email" value="{{ old('email') }}" required>
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" id="password" type="password" name="password" required>
        <label>Enter your password</label>
      </div>

      <div class="input-field">
        <input id="password-confirm" type="password" name="password_confirmation" required>
        <label>Confirm your password</label>
      </div>
      <button type="submit">Register</button>
      <div class="register">
        <p>have an account <a href="{{ route('login') }}">Login</a></p>
      </div>
    </form>
  </div>
</body>
</html>