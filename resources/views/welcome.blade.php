<!DOCTYPE html>
<html>

<head>
	<title>Reporting System</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		{{-- <div class="main">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">Login</a></li>
		</ul>
		</div> --}}
		<!-- <div class="title">
			
		</div> -->
		<form class="login-box" method="POST" action="/dashboard">
		{{-- <form method="POST" action="/"> --}}
            @csrf 
			<h1>Log Masuk</h1>
			<div class="textbox">
				
				<i class="fa fa-user"></i>
				{{-- <input type="text" placeholder="Email" name="" value=""> --}}
				<input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                	        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
			</div>

			<div class="textbox">
				<i class="fa fa-lock"></i>
				{{-- <input type="password" placeholder="Kata Laluan" name="" value=""> --}}
				<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
			</div>

			{{-- <input class="btn btn link" type="button" value="Hantar" onclick="dashboard"/> --}}
			{{-- <a class="btn btn-link" href="/dashboard" role="button">Hantar</a> --}}
			{{-- <a  href="/dashboard" class="btn btn-success" type="button" name="" value="">Hantar</a> --}}
			<div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
				{{ __('Hantar') }}
                </button>
					
			</div>
			{{-- <a class="btn" type="submit">Hantar</a> --}}
			{{-- <a href="/dashboard" class="btn">Hantar</a> --}}
			{{-- </form> --}}
		{{-- {{ method_field('POST') }} --}}
		</form>
	</header>
</body>

</html>
