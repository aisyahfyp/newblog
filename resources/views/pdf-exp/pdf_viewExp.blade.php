{{-- DOWNLOAD PDF --}}
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perbelanjaan</title>
    {{-- <link rel="stylesheet" type="text/css" href="css/style-other.css"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
      <h1 style="font-size:30px; text-align:center">RSS Delek Frozen Food</h1>
      <hr>
      <p style="font-size:15px; text-align:center">Perbelanjaan</p>


<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="text-align:center">Tarikh</th>
      <th scope="col" style="text-align:center">Jumlah</th>
      <th scope="col" style="text-align:center">Kuantiti</th>
      <th scope="col" style="text-align:center">Jumlah Keseluruhan</th>
    </tr>
  </thead>
  <tbody>
  
      <div style="display: none">
          {{ $sum = 0 }}
      </div>

        @foreach ($expenses as $item)
    <tr>
      <td style="text-align:center">{{$item->expenses_date}}</td>
	    <td style="text-align:center">{{$item->expenses_amount}}</td>
      <td style="text-align:center">{{$item->expenses_quantity}}</td>
      <td style="text-align:center">{{$item->expenses_totalamount}}</td>
      <div style="display: none">{{$sum += $item->expenses_totalamount}}</div>
    </tr>
      @endforeach
    <tr>
      <th colspan="3" style="text-align:center">Jumlah Perbelanjaan</th>
      <td style="text-align:center">{{$sum}}</td>
    </tr>
	
  </tbody>
</table>
  </body>
</html>