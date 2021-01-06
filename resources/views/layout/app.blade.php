{{-- TEST NEW DASHBOARD --}}
<!DOCTYPE html>
<html lang="en" dir="ltr">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

{{-- CHART --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>       
{{-- <script type="text/javascript" src="{{ URL::asset('js/app2.js') }}"></script> --}}

<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">	

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<link rel="stylesheet" type="text/css" href="css/app2.css">

 <div class="grid-container">
   <div class="menu-icon">
    <i class="fas fa-bars header__menu"></i>
  </div>
   
  <header class="header">
    <div class="header__search">SISTEM LAPORAN PERBELANJAAN</div>
    <div class="header__avatar">
      <a href="/logout">Log Keluar</a>
    </div>
  </header>

  <aside class="sidenav">
    <div class="sidenav__close-icon">
      <i class="fas fa-times sidenav__brand-close"></i>
    </div>

    <ul class="sidenav__list">
      <li class="sidenav__list-item"><a href="/dashboard">Utama</a></li>
      <li class="sidenav__list-item"><a href="/expmonth">Perbelanjaan</a></li>
      <li class="sidenav__list-item"><a href="/salmonth">Jualan</a></li>
      <li class="sidenav__list-item"><a href="/inventori">Inventori</a></li>
      {{-- <li class="sidenav__list-item"><a href="/testing">Tambahan</a></li> --}}
      
    </ul>
  </aside>

  <main class="main">
    {{-- <div class="main-header">
      <div class="main-header__heading">Hello User</div>
      <div class="main-header__updates">Recent Items</div>
    </div> --}}

    <div class="main-overview">
      <div class="overviewcard">
        <div class="overviewcard__icon">Perbelanjaan</div>
          
        <div class="overviewcard__info">
          @foreach($results as $result)
            {{$result}}
          @endforeach
        </div>
          

      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Jualan
        
        </div>
        <div class="overviewcard__info">Card</div>
      </div>
      
    </div>

    <div class="main-cards">
      <div class="card-dash">
        <h3>Perbelanjaan</h3>
          {{-- {!! $chart->container() !!}
          <script src="{{ $chart->cdn() }}"></script>
          {{ $chart->script() }} --}}
          {{-- <div class="chart has-fixed-height" id="bars_basic"></div> --}}
          {{-- <div id="barchart1" style="width: 80%; height: 450px; display: block; margin: 0 auto;"></div> --}}
          {{-- <div id="container"></div> --}}
          <div id="barchart" style="width: 80%; height: 450px; display: block; margin: auto;"></div>
      
      </div>
      <div class="card-dash">
        <h3>Jualan</h3>
        <div id="barchart2" style="width: 80%; height: 450px; display: block; margin: auto;"></div>
        </div>

    </div>
  </main>

  <footer class="footer">
    <div class="footer__copyright">&copy; 2018 MTH</div>
    {{-- <div class="footer__signature">Made with love by pure genius</div> --}}
</footer>
</div>


{{-- JAVASCRIPT --}}
<script>
        const menuIconEl = $('.menu-icon');
        const sidenavEl = $('.sidenav');
        const sidenavCloseEl = $('.sidenav__close-icon');

        // Add and remove provided class names
        function toggleClassName(el, className) {
        if (el.hasClass(className)) {
            el.removeClass(className);
        } else {
            el.addClass(className);
        }
        }

        // Open the side nav on click
        menuIconEl.on('click', function() {
        toggleClassName(sidenavEl, 'active');
        });

        // Close the side nav on click
        sidenavCloseEl.on('click', function() {
        toggleClassName(sidenavEl, 'active');
        });

      
      google.charts.load('current', {'packages':['bar']});  
        
        google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
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
            title: 'Bar Graph | Sales',
            subtitle: 'Perbelanjaan, dan Jumlah sejak: @php echo $expenses[0]->expenses_date @endphp',
            
            stroke: '#fff',
            strokeWidth: 1,
          },
          bars: 'vertical',
          backgroundColor: { fill:'transparent' }
        };
        var chart = new google.charts.Bar(document.getElementById('barchart'));
        chart.draw(data, options);
        //chart.draw(data, google.charts.Bar.convertOptions(options));
      }
      
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
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
        var chart = new google.charts.Bar(document.getElementById('barchart2'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

</script>


</html>