<!DOCTYPE html>
<html lang="en">
@include('includes/head')

<body class="g-sidenav-show @if ($themes == 'dark') {{ $theme_body }} @endif bg-gray-200">
  @include('includes/aside')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('includes/navbar')
    <div class="container-fluid py-4">
      @yield('mainContainer')

      @include('includes/footer')
    </div>
  </main>
  @include('devtools/devtool-sidebar')
  @include('includes/scripts')
</body>

</html>
