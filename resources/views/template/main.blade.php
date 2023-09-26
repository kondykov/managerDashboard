<!DOCTYPE html>
<html lang="en">
@include('includes/head')

<body class="g-sidenav-show bg-gray-200">
  @include('includes/aside')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('includes/navbar')
    <div class="container-fluid py-4">
      @yield('alert')
      @yield('mainContainer')

      @include('includes/footer')
    </div>
  </main>
  {{-- @if ($devmode)
    @include('devtools/devtool-sidebar')
  @endif --}}
  @include('includes/scripts')
</body>

</html>
