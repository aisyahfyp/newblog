<!DOCTYPE html>
<html lang="en" dir="ltr">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">       
{{-- <script type="text/javascript" src="{{ URL::asset('js/app2.js') }}"></script> --}}

<link rel="stylesheet" type="text/css" href="css/app2.css">

 <div class="grid-container">
   <div class="menu-icon">
    <i class="fas fa-bars header__menu"></i>
  </div>
   
  <header class="header">
    <div class="header__search">SISTEM LAPORAN PERBELANJAAN</div>
    
  </header>

  <aside class="sidenav">
    <div class="sidenav__close-icon">
      <i class="fas fa-times sidenav__brand-close"></i>
    </div>

    <ul class="sidenav__list">
      <li class="sidenav__list-item"><a href="/dashboard">Utama</a></li>
      <li class="sidenav__list-item"><a href="/expmonth">Perbelanjaan</a></li>
      <li class="sidenav__list-item"><a href="/salmonth">Jualan</a></li>
      <li class="sidenav__list-item"><a href="/inventory">Inventori</a></li>
      
    </ul>
  </aside>

  <main class="main">
    {{-- <div class="main-header">
      <div class="main-header__heading">Hello User</div>
      <div class="main-header__updates">Recent Items</div>
    </div> --}}

    <div class="main-overview">
      <div class="overviewcard">
        <div class="overviewcard__icon">Jualan</div>
        
        <div class="overviewcard__info">
          @foreach($sumSales as $result)
            {{$result}}
          @endforeach
        </div>
      </div>
    </div>

    <div class="main-cards-exp">
      <div class="card-exp">
        <h3>Jualan</h3>
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
                        <div style="display: none">{{$sum += $item->sales_amount}}</div>
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
                    {{$expenses->links('pagination')}}
                </div> --}}
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
</script>


</html>
