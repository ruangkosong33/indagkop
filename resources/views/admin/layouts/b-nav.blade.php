<nav class="main-header navbar navbar-expand navbar-primary navbar-dark border-bottom-0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="document.querySelector('#form-logout').submit()">
          <i class="fas fa-sign-out-alt">Keluar</i>
        </a>
        <form action="{{route('logout')}}" method="post" id="form-logout">
          @csrf
        </form>
      </li>
    </ul>
</nav>
