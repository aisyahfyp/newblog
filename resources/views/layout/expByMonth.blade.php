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
    <div class="header__search">PERBELANJAAN BULANAN</div>
    
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
        <div class="overviewcard__icon">Januari</div>
        <div class="overviewcard__info">
            <a href="/exp-jan">Lihat</a>
            <a href="expdf1">Cetak</a>
        </div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Februari</div>
        <div class="overviewcard__info">
            <a href="/exp-feb">Lihat</a>
            <a href="expdf2">Cetak</a>
        </div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Mac</div>
        <div class="overviewcard__info">
            <a href="/exp-mar">Lihat</a>
            <a href="expdf3">Cetak</a>
        </div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">April</div>
        <div class="overviewcard__info">
            <a href="/exp-apr">Lihat</a>
            <a href="expdf4">Cetak</a>
        </div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Mei</div>
        <div class="overviewcard__info">
            <a href="/exp-may">Lihat</a>
            <a href="expdf5">Cetak</a>
        </div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Jun</div>
        <div class="overviewcard__info">
            <a href="/exp-june">Lihat</a>
            <a href="expdf6">Cetak</a>
        </div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Julai</div>
        <div class="overviewcard__info">
            <a href="/exp-july">Lihat</a>
            <a href="expdf7">Cetak</a>
        </div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Ogos</div>
        <div class="overviewcard__info">
            <a href="/exp-aug">Lihat</a>
            <a href="expdf8">Cetak</a>
        </div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">September</div>
        <div class="overviewcard__info">
            <a href="/exp-sept">Lihat</a>
            <a href="expdf9">Cetak</a>
        </div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Oktober</div>
        <div class="overviewcard__info">
            <a href="/exp-oct">Lihat</a>
            <a href="expdf10">Cetak</a>
        </div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">November</div>
        <div class="overviewcard__info">
            <a href="/exp-nov">Lihat</a>
            <a href="expdf11">Cetak</a>
        </div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Disember</div>
        <div class="overviewcard__info">
            <a href="/exp-dec">Lihat</a>
            <a href="expdf12">Cetak</a>
        </div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Tambah Perbelanjaan</div>
        <div class="overviewcard__info">
            <a href="/expmonth-add">Tambah</a>
        </div>
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