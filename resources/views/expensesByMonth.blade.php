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

            <h1 class="mt-5 text-center">Perbelanjaan Bulanan</h1>
            <div class="exp-month" style="text-align:center">        
                <a href="/exp-jan">Januari</a>
                <a href="/exp-feb">Februari</a>
                <a href="/exp-mar">Mac</a>
                <a href="/exp-apr">April</a>
                <a href="/exp-may">Mei</a>
                <a href="/exp-june">Jun</a>
                <a href="/exp-july">Julai</a>
                <a href="/exp-aug"><span>Ogos</span></a>
                <a href="/exp-sept">September</a>
                <a href="/exp-oct">Oktober</a>
                <a href="/exp-nov">November</a>
                <a href="/exp-dec">Disember</a>
            </div>

        </div>
    </div>
</body>
</html>
