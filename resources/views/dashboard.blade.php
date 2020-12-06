<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Sistem Laporan</title>
    <link rel="stylesheet" type="text/css" href="css/style-dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">        

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    
    <script type="text/javascript">
    
        google.charts.load('current', {'packages':['bar']});
        //google.charts.load('44', {callback: drawChart, packages: ['bar']});
        
        google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Tarikh', 'Jumlah'],

            @php
              foreach($sales as $sale) {
                  echo "['".$sale->sales_date."', ".$sale->sales_amount."],";
              }
            @endphp
        ]);

        var options = {
          chart: {
            title: 'Graf | Jualan',
            subtitle: 'Tarikh, dan Jumlah sejak: @php echo $sales[0]->sales_date @endphp',
          },
          bars: 'vertical',
        };
        var chart = new google.charts.Bar(document.getElementById('barchart1'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
      
        google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
            ['Tarikh', 'Jumlah'],

            @php
              foreach($expenses as $expense) {
                  echo "['".$expense->expenses_date."', ".$expense->expenses_totalamount."],";
              }
            @endphp
        ]);

        var options = {
          chart: {
            title: 'Graf | Perbelanjaan',
            subtitle: 'Tarikh, dan Jumlah sejak: @php echo $expenses[0]->expenses_date @endphp',
            //backgroundColor: "00000000",
            stroke: '#fff',
            strokeWidth: 1,  
          },

          
          bars: 'vertical',
          //backgroundColor: { fill:'transparent' }
        };
        var chart = new google.charts.Bar(document.getElementById('barchart2'));
        chart.draw(data, options);
        //chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    
    </script>



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
            {{-- <button type="submit" class="logout-btn" href="/logout" type="submit" method="get">
            {{ __('Log Keluar') }}
            </button> --}}
            {{-- <a href="{{ URL::to('logout') }}">Logout</a> --}}
            
            <a method="post" href="/logout" type="submit" class="logout-btn">Log Keluar</a>
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
            <h1 class="mt-5 text-center">Utama</h1>
                <div id="barchart1" style="width: 80%; height: 450px; display: block; margin: 0 auto;"></div>
                <div id="barchart2" style="width: 80%; height: 450px; display: block; margin: 0 auto;"></div>
        </div> 
    </div>
</body>
</html>