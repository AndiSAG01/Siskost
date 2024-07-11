 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login web</title>
     <link rel="stylesheet" href="/user/css/style1.css">
     <link rel="stylesheet" href="/user/css/style.css">
     <link rel="stylesheet" href="/user/css/all.min.css">
 </head>
 <body>
     <div class="wrapper">
         <form method="POST" action="{{ route('login') }}" class="form">
            @csrf
             <h1 class="title">Login</h1>
             <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    <input id="email" style="width: 120%" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" style="width: 130%" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
             <button class="submit">Login</button>
             <p class="footer">¿No tienes cuenta?  <a href="{{ route('register') }}" class="link">Por favor, Registrate</a></p>   
         </form>
         <div></div>
         <div class="banner">
             <h1 class="wel_text">SISKO_@</h1><br>
             <p class="para"></p>
         </div>
     </div>
 </body>
 </html>