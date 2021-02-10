{{-- SHOW INVENTORY --}}
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Sistem Laporan</title>
    <link rel="stylesheet" type="text/css" href="css/style-other.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
</head>
<body>

    <input type="checkbox" id="check">
    <header>
        <label for="check">
            <i class="fa fa-bars" id="sidebar-btn"></i>
        </label>
        <div class="left-area">
            <h3>Sistem Laporan Perbelanjaan</h3>
        </div>
        <div class="right-area">
            {{-- <button type="submit" class="logout-btn" href="/logout">
            {{ __('Log Keluar') }}
            </button> --}}
            {{-- <a href="logout" type="submit" class="logout-btn">Log Keluar</a> --}}
        </div>
    </header>

    <div class="sidebar">
        <a href="/dashboard"><i class="fa fa-desktop"></i><span>Utama</span></a>
        {{-- <a href="#"><i class="fa fa-table"></i><span>Hasil</span></a> --}}
        <a href="/expmonth"><i class="fa fa-table"></i><span>Perbelanjaan</span></a>
        <a href="/salmonth"><i class="fa fa-table"></i><span>Jualan</span></a>
        <a href="/inventory"><i class="fa fa-table"></i><span>Inventori</span></a>
    </div>
    
    <div class="content">
        
        <div class="show-data">
            
            <h1 class="mt-5 text-center">Inventori</h1>

                <div class="btn-pdf">
                    <a class="btn btn-primary" href="/inventory/pdf">Cetak Inventori</a>
                </div>
                
                <table id="inventory">
                    <tr>
                        {{-- <td>Item ID</td> --}}
                        <th>Item</th>
                        <th>Harga</th>
                        {{-- <th>Kategori</th> --}}
                        <th>Kuantiti</th>
                        <th>Jumlah Harga</th>
                    </tr>
                
                @foreach ($inventory as $item)
                    <tr>
                        {{-- <td>{{$item->stock_ID}}</td> --}}
                        <td>{{$item->stock_name}}</td>
                        <td>{{$item->stock_price}}</td>
                        {{-- <td>{{$item->stock_category}}</td> --}}
                        <td>{{$item->stock_quantity}}</td>
                        <td>{{$item->total_stock}}</td>
                        {{-- <td>{{$item->quantity}}</td>
                        <td>{{$item->price}}</td> --}}
                    </tr>                            

                @endforeach
                </table>
                
                <div class="pagination">
                    {{$inventory->links('pagination')}}
                </div>
                
                

        </div>
    </div>


</body>
</html>