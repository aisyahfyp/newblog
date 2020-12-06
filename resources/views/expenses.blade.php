{{-- SHOW REVENUE --}}
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
            <h1 class="mt-5 text-center">Perbelanjaan</h1>
                <div class="btn-pdf">
                    <a class="btn btn-primary" href="/expenses/pdf">Cetak Perbelanjaan</a>  
                </div>
            
            <div class="dropdown">
                <button class="dropbtn">Kategori</button>
                
                {{-- <?php //$category=DB::table('stock_category')->get(); ?>
                    @foreach($expenses as $expense)
                        <a class="dropdown-item" href="{{url('category',$expense->category_id)}}">{{category($expense->category_name)}}</a>
                    @endforeach --}}
            </div>
            
            <table id="expenses">
                <tr>
                    {{-- <td>Bulan</td> --}}
                    <th>Tarikh</th>
                    <th>Jumlah</th>
                    <th>Kuantiti</th>
                    <th>Jumlah Keseluruhan</th>
                    {{-- <td>Harga</td>
                    <td>Kuantiti</td>
                    <td>Jumlah</td> --}}
                </tr>
                
                <div style="display: none">
                    {{ $sum = 0 }}
                </div>

            @foreach ($expenses as $item)
                <tr>

                <?php //$monthNum = $data->month;
                    //$dateObj = DateTime::createFromFormat('!m', $monthNum);
                    //$monthName = $dateObj->format('F');
                ?>
                    {{-- <td>{{ $monthName }}</td> --}}
                    <td>{{$item->expenses_date}}</td>
                    {{-- <td>{{ Carbon\Carbon::parse($item->expenses_date)->format('d-m-Y') }}</td> --}}
                    <td>{{$item->expenses_amount}}</td>
                    <td>{{$item->expenses_quantity}}</td>
                    {{-- <td>{{$item->expenses_addstock}}</td> --}}
                    <td>{{$item->expenses_totalamount}}</td>
                    {{-- <tr>{{$sum += $item->expenses_totalamount}}</tr> --}}
                    {{-- <div style="display: none">{{$sum += $item->expenses_totalamount}}</div> --}}
                    
                    {{-- <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td> --}}
                </tr>                            
            @endforeach
               
                <p></p>
                {{-- <p>Jumlah Perbelanjaan : RM {{$sum}}</p> --}}
                
                {{-- <tr>
                    <th>Jumlah Perbelanjaan</th>
                    <th>
                        <th>
                            <th>{{$sum}}</th>
                        </th>
                    </th>
                </tr> --}}

            </table>

                <div class="pagination">
                    {{$expenses->links('pagination')}}
                </div>

                
        </div>
    </div>
</body>
</html>
