{{-- LOGIN PAGE GUNA --}}
{{-- <!doctype html>
<html>
<head>
<title>Sistem Laporan</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

{{ Form::open(array('url' => 'login')) }}
<h1>Login</h1> --}}
<!-- if there are login errors, show them here -->
{{-- <p>
    {{ $errors->first('username') }}
    {{ $errors->first('password') }}
</p> --}}

{{-- <header>
<form class="login-box">
<div class="textbox">
<i class="fa fa-user"></i>
<p>
    {{ Form::label('username', 'Username') }}
    {{ Form::text('username', Request::old('username'), array('placeholder' => 'username')) }}
</p>
</div>

<div class="textbox">
<i class="fa fa-lock"></i>
<p>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
</p>
</div>

<div class="col-md-8 offset-md-4">
<p>{{ Form::submit('Submit!') }}</p>
{{ Form::close() }}
</div>

</form>
<header>
</body>
</html> --}}

<!DOCTYPE html>
<html>
 <head>
  <title>Sistem Laporan</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    margin-top:50px;
    border:1px solid #ccc;
    position: center;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 aligned="center">Sistem Laporan Perbelanjaan</h3><br />

   @if(isset(Auth::user()->username))
    <script>window.location="login/successlogin";</script>
   @endif

   @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif

   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
     </ul>
    </div>
   @endif

   <form method="post" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="form-group">
        <label>Nama</label>
        <input type="username" name="username" class="form-control" />
        </div>
        <div class="form-group">
        <label>Kata Laluan</label>
        <input type="password" name="password" class="form-control" />
        </div>
        <div class="form-group">
        <input type="submit" name="login" class="btn btn-primary" value="Hantar" />
        </div>
        <div class="container signin">
            <p>Belum memiliki akaun? Daftar <a href="/register">di sini</a>.</p>
        </div>
   </form>
  </div>
 </body>
</html>
