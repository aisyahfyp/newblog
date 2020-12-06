<?php 
//$con = mysqli_connect('sql129.main-hosting.eu', 'u971360684_root', '#Ayambakar654321', 'u971360684_roslidb') or die("Failed to connect with database!!!!");

//$s = "SELECT * FROM inventory";
//$s = "SELECT * FROM inventory INNER JOIN stock_category ON stock_category.category_id = inventory.stock_category";
//$s = "SELECT sales_totalamount FROM sales JOIN expenses_totalamount FROM expenses";
//$s = "SELECT category_name, stock_quantity FROM inventory, stock_category WHERE inventory.stock_category = stock_category.category_id
//GROUP BY inventory.stock_category;";
//$s = "SELECT sales.sales_totalamount join expenses.expenses_totalamount";

//$s = "SELECT stock_category.category_id, FROM stock_category join stock_name from Inventory";
//$query = "SELECT sum(sales_totalamount) as sales from sales cross join sum(expenses_totalamount) as expenses from expenses";
//$query = "SELECT * from sales cross join expenses";


//$result = mysqli_query($con, $query);
//$data_array = array();


//while($row = mysqli_fetch_assoc($result)){

    //$data_array[] = array_values($row);
    //$data_array[] = ($row);
    //}
    //$chart= json_encode($data_array);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Sistem Laporan</title>
    <link rel="stylesheet" type="text/css" href="css/style-dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">        

    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script> --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    {{-- hhhh --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    {{-- hhhh --}}


    {{-- Chart --}}

    <script type="text/javascript">
    var analytics = <?php echo $sales_totalamount; ?>
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable(analytics);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
      chart.draw(view, options);

        
    
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
        <a href="/expenses"><i class="fa fa-table"></i><span>Perbelanjaan</span></a>
        <a href="/sales"><i class="fa fa-table"></i><span>Jualan</span></a>
        <a href="/inventory"><i class="fa fa-table"></i><span>Inventori</span></a>
    </div>
    
    <div class="content">
        <div class="show-data">
            <h1 class="mt-5 text-center">Utama</h1>
            {{-- Bar Chart --}}
            <div id="columnchart" style="width: 900px; height: 400px;"></div>

            {{-- Pie Chart --}}
            {{-- <div id="pie_chart" style="width:650px; height:450px;"></div> --}}

        </div>
        
        

        
    </div>

</body>
    
</html>
