

  <!-- Main Sidebar Container sidebar-dark-primary  -->
  <aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="" alt="SMURFWEB Logo" class="brand-image img-circle elevation-3 d-none" style="opacity: .8;background:#fff;">
      <span class="brand-text font-weight-light">SMURF WEB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src=" {{ asset('back')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info text-info">
          <a href="" class="d-block">
          TEST ACCOUNT
         </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Yönetim Paneli
              </p>
            </a>
          </li>
          <!-- is default open: menu-is-opening menu-open -->
          <li class="nav-item @if( in_array(Request::segment(2), ['slider', 'musteri-yorumlari', 'ekibimiz', 'sikca-sorulanlar'])) menu-is-opening menu-open @endif">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Kurumsal
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard.slider.index') }}" class="nav-link @if(Request::segment(2) == 'slider') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.customer-comments.index') }}" class="nav-link @if(Request::segment(2) == 'musteri-yorumlari') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Müşteri Yorumları</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.teams.index') }}" class="nav-link @if(Request::segment(2) == 'ekibimiz') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ekibimiz</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.faq.index') }}" class="nav-link @if(Request::segment(2) == 'sikca-sorulanlar') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sıkça Sorulanlar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fiyatlar</p>
                </a>
              </li>
              <hr>
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sayfalar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yeni Sayfa</p>
                </a>
              </li>
             
              </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Hizmetler
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hizmetler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yeni Hizmet</p>
                </a>
              </li>
             
             
            </ul>
          </li>
   
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yazılar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yeni Yazı</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategoriler</p>
                </a>
              </li>
             
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Multi Medya
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fotoğraf Galerisi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Video Galerisi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Site</li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Ayarlar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Genel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>İletişim</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Email</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bakım Modu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gelişmiş</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>