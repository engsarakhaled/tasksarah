
<!doctype html>
<html lang="en"> {{-- LAYOUT COMMON PARTS --}}
  <head>
    @include('includes.head')
  </head> 
    <body>
   
    
    <main>
    @include('includes.navbar')
    </main>
    @yield('content') {{-- Yield UNIQUE PARTS --}}
   
    @include('includes.footer')
    
    @yield('team') {{-- Yield UNIQUE PARTS --}}
    <!-- JAVASCRIPT FILES -->
    @include('includes.footerJs')
    </body>
</html>
