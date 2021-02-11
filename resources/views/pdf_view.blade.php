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
      <h2 style="font-size:20px; text-align:center">Inventori</h2>

    <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        {{-- <td>Item ID</td> --}}
        <th scope="col" style="text-align:center">Item</th>
        {{-- <th scope="col" style="text-align:center">Item Kategori</th> --}}
        <th scope="col" style="text-align:center">Harga</th>
        <th scope="col" style="text-align:center">Kuantiti</th>
        <th scope="col" style="text-align:center">Jumlah Harga</th>
      </tr>
        <div style="display: none">
          {{ $sum = 0 }}
        </div>
      </thead>
      <tbody>

      {{-- @foreach($inventory as $category_id => $category_name)
        Category ID: {{ $category_id }}
        @foreach($category_name as $item)
          <tr>
            <td style="text-align:center">{{$item->stock_name}}</td>
            <td style="text-align:center">{{$item->stock_price}}</td>
            <td style="text-align:center">{{$item->stock_quantity}}</td>
            <td style="text-align:center">{{$item->total_stock}}</td>
            
        </tr>
        @endforeach
      @endforeach --}}
        @foreach ($inventory as $item)
        <tr>
            <td style="text-align:center">{{$item->stock_name}}</td>
            <td style="text-align:center">{{$item->stock_price}}</td>
            <td style="text-align:center">{{$item->stock_quantity}}</td>
            <td style="text-align:center">{{$item->total_stock}}</td>
            <div style="display: none">{{$sum += $item->total_stock}}</div>
        </tr>
        @endforeach
        <tr>
          <th colspan="3" style="text-align:center">Jumlah Harga</th>
          <td style="text-align:center">{{$sum}}</td>
        </tr>
      </tbody>
    </table>

    {{-- TABLE 2 --}}

    <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        {{-- <td>Item ID</td> --}}
        <th scope="col" style="text-align:center">Kategori</th>
        <th scope="col" style="text-align:center">Jumlah Harga</th>
      </tr>
        <div style="display: none">
          {{ $sum = 0 }}
        </div>
      </thead>
      <tbody>
        @foreach ($inventory2 as $item)
        <tr>
            <td style="text-align:center">{{$item->id}}</td>
            <td style="text-align:center">{{$item->total_amount}}</td>
            <div style="display: none">{{$sum += $item->total_amount}}</div>
        </tr>
        @endforeach
        <tr>
          <th colspan="1" style="text-align:center">Jumlah Harga</th>
          <td style="text-align:center">{{$sum}}</td>
        </tr>
      </tbody>
    </table>
      <p style="font-size:17px;">Jenis Kategori : </p>
      <dl>
        <dt>1 - Sayur</dt>
        <dt>2 - Daging</dt>
        <dt>3 - Rempah</dt>
        <dt>4 - Keringan</dt>
        <dt>5 - Lain-lain</dt>
      </dl>
      </body>
</html>