

  <!-- Main Sidebar Container sidebar-dark-primary  -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center">
      @if( $settings->get('favicon') )
      <img src="{{ asset( $settings->get('favicon') ) }}" alt="SMURFWEB Logo" class="brand-image elevation-3" style="filter: invert(80%)">
      @endif
      <span class="brand-text font-weight-light">SMURF THEME</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @if( Auth::user()->profile_photo_path )
        <div class="image">
            <img src=" {{ asset( Auth::user()->profile_photo_path )}} " class="img-circle elevation-2" alt="User Image">
        </div>
        @endif
        <div class="info text-info">
          <a href="{{ route('dashboard.profile.index') }}" class="d-block">
            {{ Auth::user()->name }}
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
            <a href="#" class="nav-link">
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
  
              </ul>
          </li>
          <li class="nav-item @if( in_array(Request::segment(2), ['sayfalar'])) menu-is-opening menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Sayfa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard.page.index') }}" class="nav-link @if(Request::segment(2) == 'sayfalar' && Request::segment(3) == null) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sayfalar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.page.insert') }}" class="nav-link @if(Request::segment(2) == 'sayfalar' && Request::segment(3) == 'ekle' ) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yeni Sayfa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @if( in_array(Request::segment(2), ['hizmetler'])) menu-is-opening menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Hizmetler
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard.services.index') }}" class="nav-link @if(Request::segment(2) == 'hizmetler' && Request::segment(3) == null) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hizmetler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.services.insert') }}" class="nav-link  @if(Request::segment(2) == 'hizmetler' && Request::segment(3) == 'ekle') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yeni Hizmet</p>
                </a>
              </li>
             
             
            </ul>
          </li>
   
          <li class="nav-item @if( Request::segment(2) == 'blog' ) menu-is-opening menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard.blog.index') }}" class="nav-link @if( Request::segment(2) == 'blog' && Request::segment(3) == null) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yazılar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.blog.insert') }}" class="nav-link @if( Request::segment(2) == 'blog' && Request::segment(3) == 'ekle') active @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yeni Yazı</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.blog.category') }}" class="nav-link @if(Request::segment(3) == 'kategoriler') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategoriler</p>
                </a>
              </li>
             
             
            </ul>
          </li>
          <li class="nav-item @if( Request::segment(2) == 'media' ) menu-is-opening menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Multi Medya
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard.media.photo') }}" class="nav-link @if(Request::segment(3) == 'foto-galeri') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fotoğraf Galerisi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.media.video') }}" class="nav-link @if(Request::segment(3) == 'video-galeri') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Video Galerisi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Site</li>
          <li class="nav-item @if( Request::segment(2) == 'ayarlar' ) menu-is-opening menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Ayarlar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard.settings.general') }}" class="nav-link @if(Request::segment(3) == 'genel') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Genel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.settings.contact') }}" class="nav-link @if(Request::segment(3) == 'iletisim-bilgileri') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>İletişim</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.settings.email') }}" class="nav-link @if(Request::segment(3) == 'email') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Email</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.settings.maintenance') }}" class="nav-link @if(Request::segment(3) == 'bakim-modu') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bakım Modu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.settings.advanced') }}" class="nav-link @if(Request::segment(3) == 'gelismis') active @endif ">
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