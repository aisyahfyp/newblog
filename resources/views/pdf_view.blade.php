{{-- DOWNLOAD PDF --}}
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>

      <h1 style="font-size:30px; text-align:center">RSS Delek Frozen Food</h1>
      <hr>
      <p style="font-size:15px; text-align:center">Inventori</p>

    <table class="table table-bordered">

    <thead class="thead-dark">
      <tr>
        {{-- <td>Item ID</td> --}}
        <th scope="col" style="text-align:center">Item</th>
        {{-- <th scope="col" style="text-align:center">Item Kategori</th> --}}
        <th scope="col" style="text-align:center">Harga</th>
        <th scope="col" style="text-align:center">Kuantiti</th>
        {{-- <th scope="col" style="text-align:center">Jumlah</th> --}}
      </tr>
      </thead>
      <tbody>
        @foreach ($inventory as $item)
        <tr>
            {{-- <td>{{$item->stock_ID}}</td> --}}
            <td style="text-align:center">{{$item->stock_name}}</td>
            {{-- <td style="text-align:center">{{$item->stock_category}}</td> --}}
            <td style="text-align:center">{{$item->stock_price}}</td>
            <td style="text-align:center">{{$item->stock_quantity}}</td>
            {{-- <td style="text-align:center">{{$item->stock_totalamount}}</td> --}}
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>