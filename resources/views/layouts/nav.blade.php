<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">KOMADA</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="{{ route('utama') }}">Utama</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Keahlian <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('daftarAhli') }}">Daftar</a></li>
            <li><a href="{{ route('carianAhli') }}">Carian</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pinjaman <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('pwt') }}">Wang Tunai</a></li>
            <li><a href="#">*Buku Sekolah</a></li>
            <li><a href="#">*Kecemasan</a></li>
            <li><a href="#">*Tayar Bateri</a></li>
            <li><a href="#">*Cukai Jalan</a></li>
            <li><a href="#">*Insurans</a></li>
            <li><a href="#">*Pertaruhan</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bayaran <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('bayaran.yuran') }}">Yuran Bulanan</a></li>            
            <li><a href="{{ route('bayaran.tunai') }}">Bayaran Tunai</a></li>
            <li><a href="#">*Langsai</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Senarai <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">*Senarai Mengikut Jenis Pinjaman</a></li>
            <li><a href="{{ route('senarai.zongaji') }}">Senarai Mengikut Zon Gaji</a></li>
          </ul>
        </li>
        <li><a href="{{ route('perhatian') }}">Perhatian</a></li>
        
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings 1<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('settings.tka') }}">TKA</a></li>
            <li><a href="{{ route('settings.sumbangan') }}">Sumbangan</a></li>            
            <li><a href="#">*Tukar Password</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings 2<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('settings2.profile') }}">Migrate Profile</a></li>
            <li><a href="{{ route('settings2.perjawatan') }}">Migrate Perjawatan</a></li>
            <li><a href="{{ route('settings2.yuran') }}">Migrate Yuran</a></li>
            <li><a href="{{ route('settings2.yuran.terkumpul') }}">Migrate Yuran Terdahulu</a></li>
            <li><a href="{{ route('settings2.loan') }}">Migrate Loans</a></li>
            <li><a href="{{ route('settings2.removeNoPekerjaNull') }}">Remove No Pekerja Null</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Log Keluar
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>