<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Sistem Laporan</title>
    <link rel="stylesheet" type="text/css" href="css/style-other.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
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
        <a href="/expmonth"><i class="fa fa-table"></i><span>Perbelanjaan</span></a>
        <a href="/salmonth"><i class="fa fa-table"></i><span>Jualan</span></a>
        <a href="/inventory"><i class="fa fa-table"></i><span>Inventori</span></a>
    </div>
    
    <div class="content">
        <div class="show-data">
            <h1 class="mt-5 text-center">Jualan</h1>
                
                <div class="btn-pdf">
                    <a class="btn btn-primary" href="/sales/pdf">Cetak Jualan</a>
                </div>
                
                <table id="sales">
                <tr>
                    <th>Tarikh</th>
                    <th>Jumlah</th>
                    {{-- <th>Jumlah Keseluruhan</th> --}}
                    {{-- <td>Harga</td>
                    <td>Kuantiti</td>
                    <td>Jumlah</td> --}}
                </tr>
                
                <div style="display: none">
                    {{ $sum = 0 }}
                </div>

            @foreach ($sales as $item)
                <tr>
                    <td>{{$item->sales_date}}</td>
                    <td>{{$item->sales_amount}}</td>
                    {{-- <td>{{$item->expenses_addstock}}</td> --}}
                    {{-- <td>{{$item->sales_totalamount}}</td> --}}
                    <div style="display: none">{{$sum += $item->sales_totalamount}}</div>
                    {{-- <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td> --}}
                </tr>                            
            @endforeach

            <tr>
                <th>Jumlah Jualan</th>
                    <th>
                        {{$sum}}
                    </th>
                </tr>

            </table>
                
                {{-- <div class="pagination">
                    {{$sales->links('pagination')}}
                </div> --}}
        </div>
    </div>
</body>
</html>
