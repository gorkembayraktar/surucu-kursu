@include('back.layouts.header')

@include('back.layouts.navbar')

@include('back.layouts.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 justify-content-between">
          <div class="col-sm-6">
           
            <div class="">
              <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="">Anasayfa</a></li>
                <li class="breadcrumb-item active"> {{ $title }} </li>
              </ol>
            </div>
            <h1 class="m-0">{{ $title }}</h1>
          </div><!-- /.col -->
          <div class="col-auto">  
            <a href="" class="d-none d-sm-inline-block btn btn-sm btn-outline-secondary shadow-sm">
            <i class="fas fa-fw fa-cog fa-sm text-primary-50"></i> Ayarlar
            </a>
                <a href="/dashboard/ayarlar/bakim-modu" class="d-none d-sm-inline-block btn btn-sm btn-outline-info shadow-sm">
                 <i class="fas fa-fw fa-cog fa-sm text-primary-50"></i> Bakım Modu
            </a>
            <a href="{{ route('index') }}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><i class="fas fa-download fa-sm text-primary-50"></i> Web siteyi Görüntüle</a>
          </div>
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        {{ $slot }}

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

@include('back.layouts.footer')
  