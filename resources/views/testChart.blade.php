<!doctype html>
<html lang="en">
  <head>
    <title>Google Bar Chart | Programming Fields</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
  <body>
      <div class="container-fluid p-5">
        <div id="barchart1" style="width: 100%; height: 500px;"></div>
        <div id="barchart2" style="width: 100%; height: 500px;"></div>
      </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Amount'],

            @php
              foreach($sales as $sale) {
                  echo "['".$sale->sales_date."', ".$sale->sales_amount."],";
              }
            @endphp
        ]);

        var options = {
          chart: {
            title: 'Bar Graph | Sales',
            subtitle: 'Date, and Amount: @php echo $sales[0]->sales_date @endphp',
          },
          bars: 'vertical'
        };
        var chart = new google.charts.Bar(document.getElementById('barchart1'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
      
        google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Amount'],

            @php
              foreach($expenses as $expense) {
                  echo "['".$expense->expenses_date."', ".$expense->expenses_amount."],";
              }
            @endphp
        ]);

        var options = {
          chart: {
            title: 'Bar Graph | Sales',
            subtitle: 'Date, and Amount: @php echo $expenses[0]->expenses_date @endphp',
          },
          bars: 'vertical'
        };
        var chart = new google.charts.Bar(document.getElementById('barchart2'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }


    </script>

</body>
</html>