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
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   {{-- <h3 aligned="center">Sistem Laporan Perbelanjaan</h3><br /> --}}

    <form action="{{ route('register.add') }}" method="POST">
         @csrf
        
          @if(count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          @endif

            @if(\Session::has('success'))
            <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
            </div>
            @endif

            <h3>Pendaftaran</h3>
            <p>Sila lengkapkan butiran di bawah untuk membuat akaun baru.</p>
            <hr>

            <div class="form-group">
                <label>Nama</label>
                <input type="username" name="username" class="form-control" />
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label>Kata Laluan</label>
                <input type="password" name="password" class="form-control" />
            </div>
            
            <div class="form-group">
                <input type="submit" name="login" class="btn btn-primary" value="Daftar" />
            </div>
            <div class="container signin">
                <p>Sudah memiliki akaun? <a href="/">Log Masuk</a>.</p>
            </div>
        
    </form>
  </div>
 </body>
</html>



