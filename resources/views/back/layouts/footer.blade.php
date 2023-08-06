
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023.</strong>
    Tüm hakları saklıdır.       
    <div class="float-right d-none d-sm-inline-block">
      <b>App</b> 1.0.0, <b>Laravel</b> {{ app()->version() }}
    </div>
  </footer>
</div>
<!-- ./wrapper -->

@include('back.layouts.logoutModal')

@include('back.layouts.scripts')

{{ $script ?? null }}


</body>
</html>
