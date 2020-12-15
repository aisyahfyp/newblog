<!DOCTYPE html>
<html lang="en" dir="ltr">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">  
{{-- DATEPICKER --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>      --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" type="text/css" />

{{-- TOTAL AMOUNT --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
{{-- <script type="text/javascript" src="{{ URL::asset('js/app2.js') }}"></script> --}}

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
      {{-- <li class="sidenav__list-item"><a href="#">Tambahan</a></li> --}}
      
    </ul>
  </aside>

  <main class="main">
    {{-- <div class="main-header">
      <div class="main-header__heading">Hello User</div>
      <div class="main-header__updates">Recent Items</div>
    </div> --}}

    {{-- <div class="main-overview">
      <div class="overviewcard">
        <div class="overviewcard__icon">Perbelanjaan</div>
        
        <div class="overviewcard__info">Card</div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Jualan</div>
        <div class="overviewcard__info">Card</div>
      </div>
      
    </div> --}}

    <div class="main-cards">
      <div class="card-exp-sales">
        <h3>Tambah Jualan</h3>
        <form action="{{ route('sal.add') }}" method="POST">
         @csrf
            <ul class="flex-outer">

            @if(count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          @endif

            @if(\Session::has('success'))
            <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
            </div>
            @endif

            <li>
                <label for="exp-date">Tarikh</label>
                {{-- <input type="exp-date" name="expenses_date" id="add-exp-date" placeholder="Tarikh"> --}}
                <input type="date" name="sales_date" id="datepicker" class="from-control" placeholder="Tarikh">
            </li>
            <li>
                <label for="add-sales">Jualan</label>
                <input type="int" name="sales_amount" id="add-sales" placeholder="Jumlah Jualan">
            </li>
            <li>
                <button type="submit" name="submit">Tambah</button>
            </li>
          </ul>
        </form>
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

});

</script>

      

</html>