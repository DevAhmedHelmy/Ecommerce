  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand border-bottom navbar-light bg-warning">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
              <i class="fa fa-language"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right text-dark">

                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item text-dark">
                        <i class="fa fa-flag"></i> {{ $properties['native'] }}
                    </a>
                @endforeach
                <div class="dropdown-divider"></div>


            </div>


        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

