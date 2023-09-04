<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yönetim Paneli</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('back')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('back')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('back')}}/dist/css/adminlte.min.css">

   <!-- Favicons -->
   <link rel="icon" type="image/png" href="{{ asset('dist') }}/img/SmurfWebLogo.png" sizes="32x32">
   <link rel="apple-touch-icon" href="{{ asset('dist') }}/img/SmurfWebLogo.png">

</head>
<!-- <body class="dark-mode bg-dark hold-transition login-page"> -->
<body class=" hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary elevation-4">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Yönetici Paneli</b></a>
    </div>
    <div class="card-body">
      @if($errors->any())
        <div class="alert alert-danger">
          {{$errors->first()}}
        </div>
      @endif

      <p class="login-box-msg">Yönetim paneline erişmek için giriş yap!</p>

      <form action="{{route('login.post')}}" method="POST" class="form__content">
        @csrf

        <div class="mb-3">
            <div class="input-group">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ Request::old('email', 'byrktr@gmail.com') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <span class="text-danger pl-1"></span>
        </div>
        <div class="mb-0"> 
            <div class="input-group">
                <input type="password" class="form-control" placeholder="Şifre" name="password" value="test123">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <span class="text-danger pl-1"></span>
        </div>  
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

 

    
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('back')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('back')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('back')}}/dist/js/adminlte.min.js"></script>

<script>
    
    /**
     * Oturum senkranizasyonu
     * Kullanıcı oturum açmışsa diğer açılan pencerelerde akışı eşitle.
     */
    const broadcast = new BroadcastChannel("oturum");
    
    broadcast.onmessage = (event) => {
      switch(event.data){
          case 'login':
                location.reload();
          break;
      }
    };
</script>


</body>
</html>