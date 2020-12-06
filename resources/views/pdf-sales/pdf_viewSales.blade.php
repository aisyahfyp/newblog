<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Jualan</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  
  <body>
      <h1 style="font-size:30px; text-align:center">RSS Delek Frozen Food</h1>
      <hr>
      <p style="font-size:15px; text-align:center">Jualan</p>

    <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="text-align:center">Tarikh</th>
        <th scope="col" style="text-align:center">Jumlah</th>
        {{-- <th scope="col" style="text-align:center">Jumlah Keseluruhan</th> --}}
      </tr>
    </thead>
      <tbody>

        <div style="display: none">
          {{ $sum = 0 }}
        </div>

        @foreach ($sales as $item)
        <tr>
            <td style="text-align:center">{{$item->sales_date}}</td>
            <td style="text-align:center">{{$item->sales_amount}}</td>
            {{-- <td style="text-align:center">{{$item->sales_totalamount}}</td> --}}
            <div style="display: none">{{$sum += $item->sales_totalamount}}</div>
        </tr>
        @endforeach

        <tr>
          <th colspan="1" style="text-align:center">Jumlah Jualan</th>
          <td style="text-align:center">{{$sum}}</td>
        </tr>

      </tbody>
    </table>
  </body>
</html>