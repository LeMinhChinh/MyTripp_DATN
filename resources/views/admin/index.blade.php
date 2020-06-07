<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ asset('') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Super Admin - @yield('title')</title>

    @include('admin/partials/link')

    {{-- @stack('stylesheet') --}}

</head>

<body id="page-top">

    {{-- nhúng header view --}}
    @include('admin.partials.header')

  <div id="wrapper">

    {{-- Sidebar --}}
    @include('admin.partials.navbar')

    <div id="content-wrapper">

        <div class="container-fluid">
            @yield('content')
        </div>

        {{-- @include('admin.partials.footer') --}}
    </div>

  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('admin.partials.actionmenu')
  </div>

  @include('admin/partials/script')
  <script>
      $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      });
    </script>
   @stack('scripts')
</body>

</html>
