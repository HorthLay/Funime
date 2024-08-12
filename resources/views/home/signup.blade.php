<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>sign up</h3>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
			@csrf
            <div class="row">
                 <label for="username-2">
                    Username:
                    <input type="text" id="name" name="name" :value="old('name')" required autofocus autocomplete="name" />
					@error('name')
						<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
					@enderror
                </label>
            </div>
           
            <div class="row">
                <label for="email-2">
                    your email:
                    <input type="email" name="email" id="email" :value="old('email')" required autocomplete="username" />
					@error('email')
						<p class="text-red-500 text-sm mt-1">{{ $message }}</p>	
					@enderror
                </label>
            </div>
             <div class="row">
                <label for="password-2">
                    Password:
                    <input type="password" id="password" name="password" required autocomplete="new-password" />
					@error('password')
						<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
					@enderror		
                </label>
            </div>
             <div class="row">
                <label for="repassword-2">
                    re-type Password:
                    <input type="password" name="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" />
                </label>
            </div>
           <div class="row">
             <button type="submit">sign up</button>
           </div>
        </form>
    </div>
</div>