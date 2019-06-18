<!DOCTYPE html>
<html>
@include('layouts.part.head')

<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">

    @include('layouts.part.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.part.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
    @include('layouts.part.footer')
  </div>
  <!-- ./wrapper -->

  @include('layouts.part.script')
</body>

</html>