<x-back-layout>
    <x-slot:title>
        Anasayfa
    </x-slot>

    
        <!-- Info boxes -->
        <div class="row">
          
            <div class="col-6 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-gift"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Toplam İşlem Sayısı</span>
                  <span class="info-box-number">
                   0
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
  
  
  
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
  
  
   
          </div>
          <!-- /.row -->
  
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Günlük Rapor</h5>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <p class="text-center">
                        <strong>title</strong>
                      </p>
  
                       <!-- AREA CHART -->
                        <div class="chart">
                              <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        
                      <!-- /.chart-responsive -->
                    </div>
                  
                  </div>
                  <!-- /.row -->
                </div>
                <!-- ./card-body -->
           
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
    
</x-back-layout>



