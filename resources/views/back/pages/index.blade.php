<x-back-layout>
    <x-slot:title>
      Yönetim paneli
    </x-slot>

    <x-slot:style>
      <style>
        img.table-avatar,
        .table-avatar img {
          border-radius: 50%;
          display: inline;
          width: 4.5rem;
        }
        .avatar-item:not(:first-child) {
          margin-left: -30px;
        }

        
      </style>
    </x-slot> 
    
    <!-- Info boxes -->
    <div class="row">
      
      <div class="col-md-4 col-12">
         <div class="card">
            <div class="card-header">
              Son Yazılar
              <a href="{{ route('dashboard.blog.insert') }}" class="btn btn-outline-secondary btn-sm float-right">Yeni yazı</a>
            </div>
            <div class="card-body">
              @foreach($blogs as $blog)
              <div class="post">
                <div class="user-block">
                   <img class="img-circle img-bordered-sm" src="{{ asset( $blog->user->profile_photo_path ) }}" alt="user image">
                   <span class="username">
                   <a href="#">{{ $blog->user->name }}</a>
                   </span>
                   <span class="description">{{ 
                      match($blog->publish) {
                        \App\Enum\BlogEnum::PUBLISHED => 'herkese açık' ,
                        \App\Enum\BlogEnum::DRAFT => 'taslak',
                        default => $blog->publish,
                    } 
                }} paylaşım - {{ $blog->created_at }}</span>
                </div>
                <h5><a href="{{ route("blog-single", $blog->slug) }}" target="_blank">{{ $blog->title }}</a></h5>
                <p>
                  {{
                    substr(strip_tags($blog->content),0,150)
                  }}
                </p>
                <p class="text-right">
                   <a href="{{ route( 'dashboard.blog.edit', $blog->id) }}" class="link-black text-sm "><i class="fas fa-edit"></i> Düzenle</a>
                </p>
             </div>
             @endforeach
            </div>
            <div class="card-footer clearfix"></div>
         </div>
      </div>
      <div class="col-md-4 col-12">

        <div class="row">
          <div class="col-12">
             <div class="card">
              <table class="table table-bordered">
                <thead>
                  <tr>
                      <th>Kategori</th>
                      <th>Yazı Sayısı</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $categories as $category )
                  <tr>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->blog_count->count() }}</td>
                  </tr>
                 @endforeach
                </tbody>
            </table>
             </div>
          </div>
          <!-- COL 12 -->

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                Takım Üyeleri
              </div>
              <div class="card-body">
              <ul class="list-inline">
                @foreach($teams as $team)
                <li class="list-inline-item avatar-item">
                    <a href="{{ route('dashboard.teams.edit', $team->id) }}"><img alt="Avatar" class="table-avatar" src="{{ asset($team->image) }}" width="100"></a>
                </li>
                @endforeach
                
                </ul>
              </div>
              <div class="card-footer clearfix text-right">
                <a href="{{ route('dashboard.teams.index') }}" class="btn btn-outline-secondary btn-sm">Düzenle</a>
              </div>
          </div>
        </div>
        <!-- COL 12 -->
        </div>
        
     </div>
     
      <div class="col-md-4 col-12">
        <div class="card">

          <div class="card-header"> Son Hizmetler</div>
          <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                      <th style="width: 10px">ID</th>
                      <th>Başlık</th>
                      <th></th>
                  </tr>
                </thead>
                <tbody>
            
                    @foreach( $services as $service )
                    <tr>
                      <td>{{ $service->id }}</td>
                      <td><a href="{{ route('service-single', $service->slug) }}" target="_blank">{{ $service->title }}</a></td>
                      <td>
                        <a href="{{ route('dashboard.services.edit', $service->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a>
                     </td>
                    </tr>
                   @endforeach
                 
                </tbody>
            </table>
          </div>

        </div>
      </div>


    </div>
      <!-- /.row -->
  
    
</x-back-layout>



