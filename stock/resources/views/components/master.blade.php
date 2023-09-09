@props(['user'])

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<style>
  .show{
    /* display : none; */
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <link rel="stylesheet" href="{{asset('css/table.css')}}">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <meta name="csrf-token">
  
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

 <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
rel="stylesheet"
/>

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">StockMangaement</span>
      </a>
      <svg class="bi bi-list toggle-sidebar-btn" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="40px" height="40px"><path d="M 0 7.5 L 0 12.5 L 50 12.5 L 50 7.5 Z M 0 22.5 L 0 27.5 L 50 27.5 L 50 22.5 Z M 0 37.5 L 0 42.5 L 50 42.5 L 50 37.5 Z"/></svg>          

      
    </div>

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="#" action="#">
        @csrf
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search">
         
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="20px" height="20px"><path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"/></svg>
        </button>
      </form>
    </div><!-- End Search Bar -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

     {{-- notification --}}
     <li>
        <div class="dropdown me-1">
            <a
              class="btn btn-sm dropdown-toggle"
              href="#"
              role="button"
              id="dropdownMenuLink"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >

            <i class="fas fa-bell"></i>
        </a>
          
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li class="message"> <span class="white">Notification</span></li>
              <a class="dropdown-itemd " href="#"><p class="text-center text-info"><i class="fas fa-angles-right"></i> lire les notifications</p></a>
            </ul>
          </div>
      </li>
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="20px" height="20px"><path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"/></svg>
          </a>
        </li>  
        <li class="nav-item dropdown me-2">
            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
              id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
             @php
                    $user_id = Auth::id(); 
                  $user = \App\Models\Profile::find($user_id);
             @endphp
              <img src="{{asset("storage/$user->image")}}" class="rounded-circle" height="32" alt="Avatar"
                loading="lazy" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="{{route('profile')}}">My profile  </a></li>
              {{-- <li><a class="dropdown-item" href="#">Settings</a></li> --}}
              <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
            </ul>
          </li>   
      </ul>
    </nav><!-- End Icons Navigation -->
  </header>
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="{{route('home')}}">
      <span><i class="fas fa-chart-line"></i>Dashboard</span>
        </a>
      </li>
      @php
          $user = Auth::id(); // Get the authenticated user
          $user = \App\Models\Profile::find($user);

      @endphp
      @if ($user->isAdmin())
           <li class="nav-item">
        <a href="{{route('profiles.index')}}" class="nav-link collapsed"><i class="fas fa-image-portrait"></i>USERES</a>
      </li>
      <li><a class="nav-link collapsed " href="{{route('employées.index')}}"><i class="fas fa-image-portrait"></i>Employées</a></li>
     
      <li class="nav-item">
        <a href="{{route('departement.index')}}" class="nav-link collapsed"><i class="fas fa-chalkboard-user"></i>BEREAUX</a>
      </li>
 @endif
 @if ($user->isAdmin()||$user->isGestionnaire())

      <li class="nav-item">
        <div class="dropdown">
          <a
            class="btnn nav-link 
            collapsed
            dropdown-toggle"
            type="button"
            id="dropdownMenuButton"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
          <i class="fas fa-store"></i>PRODUCTS
          </a>
          <ul class="dropdown-menu" class="bg-danger" aria-labelledby="dropdownMenuButton">
            <li class="nav-item"><a class="nav-link collapsed" href="{{route('products.index')}}"> <i class="fas fa-cart-flatbed"></i>Products</a></li>
            <li><a class="nav-link collapsed" href="{{route('categories.index')}}"> <i class="fab fa-buffer"></i>Category</a></li>
            <li><a class="nav-link collapsed " href="{{route('stockslieu.index')}}"><i class="fas fa-cart-arrow-down"></i>LOCALISATIONS</a></li>

          </ul>
        </div>
      </li>
    @endif

      <li class="nav-item">
        {{-- <div class="dropdown">
          <a
            class="btnn nav-link 
            collapsed
            dropdown-toggle"
            type="button"
            id="dropdownMenuButton"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
          <i class="fas fa-cart-flatbed-suitcase"></i>STOCK
          </a> --}}
          {{-- <ul class="dropdown-menu" class="bg-danger" aria-labelledby="dropdownMenuButton"> --}}
            @if ($user->isAdmin() ||$user->isGestionnaire())

            <li><a class="nav-link collapsed" href="{{route('fornisseurs.index')}}"> <i class="fas fa-caravan"></i>FORNISSEURS</a></li>
           @endif
          {{-- </ul>
        </div> --}}
      </li>

      @if ($user->isAdmin()||$user->isGestionnaire())

      <li class="nav-item">
        
        <a href="{{route('stockenier.index')}}" class="nav-link collapsed"><i class="fas fa-down-long"></i>LES ENTREES</a>
      </li>
      @endif

  {{-- DropDawn --}}
      <li class="nav-item">
        <div class="dropdown">
          <a
            class="btnn nav-link 
            collapsed
            dropdown-toggle"
            type="button"
            id="dropdownMenuButton"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
          <i class="far fa-calendar-days"></i>OPERATIONS
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="nav-link collapsed" href="{{route('demandes.index')}}">NEW DEMANDE</a></li>
            @if ($user->isAdmin()||$user->isGestionnaire())

            <li><a class="dropdown-item nav-link collapsed" href="{{route('mesDemande')}}">DEMANDES</a></li>
         @endif
         <li><a class="dropdown-item nav-link collapsed" href="{{route('demandes.user')}}">Mes DEMANDES</a></li>
          </ul>
        </div>
      </li>
      @if ($user->isAdmin())
      <li class="nav-item">
        <a href="" class="nav-link collapsed"><i class="fas fa-handshake"></i>DROIT ACCEES</a>
      </li>
      @endif
      <!-- End Charts Nav -->







    </ul>
  </aside>
  <main id="main" class="main">
 {{$slot}}
</main><!-- End #main -->
  @include('partials.footer')
  <script src="{{asset('js/main.js')}}"></script>
  {{-- <script>
    onload = function () {
      dropdown.classList.remove('show');
    }
  </script> --}}
  <script>
   const close = document.getElementById('close')
   const opp = document.getElementById('opp')
  //  dropdown.style.display="none";
  close.addEventListener("click", function(){
     opp.style.display = 'none'
       });
  </script>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>


</body>

</html>