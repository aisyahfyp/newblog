<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
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
            
            <h1 class="mt-5 text-center">Jualan Bulanan</h1>
            <div class="sales-month" style="text-align:center">                
                <a href="/sales-jan">Januari</a>
                <a href="/sales-feb">Februari</a>
                <a href="/sales-mar">Mac</a>
                <a href="/sales-apr">April</a>
                <a href="/sales-may">Mei</a>
                <a href="/sales-june">Jun</a>
                <a href="/sales-july">Julai</a>
                <a href="/sales-aug"><span>Ogos</span></a>
                <a href="/sales-sept">September</a>
                <a href="/sales-oct">Oktober</a>
                <a href="/sales-nov">November</a>
                <a href="/sales-dec">Disember</a>
            </div>

        </div>
    </div>
</body>
</html>
