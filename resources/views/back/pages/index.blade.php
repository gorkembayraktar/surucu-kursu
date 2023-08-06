<x-back-layout>
    <x-slot:title>
      Yönetim paneli
    </x-slot>

    
    <!-- Info boxes -->
    <div class="row">
      
      <div class="col-md-6 col-12">
         <div class="card">
            <div class="card-header">
              Anasayfa Bölümleri
            </div>
            <div class="card-body">
              <ul class="list-group" id="orders">
                <li id="order_1" class="list-group-item handle">
                   <i class="fa fa-arrows-alt handle ui-sortable-handle" style="cursor:move;"></i>
                   Slider 
                   <span class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success cursor-pointer text-center d-inline-block float-right">
                    <input type="checkbox" class="custom-control-input" id="row-editable-30" >
                    <label class="custom-control-label" for="row-editable-30"></label>
                  </span>
                   <button class="btn btn-info btn-sm float-right mx-1" onclick="editItemElite(1)"><i class="fa fa-pen"></i></button>
                </li>
             </ul>
            </div>
            <div class="card-footer clearfix"></div>
         </div>
      </div>
      <div class="col-md-6 col-12">
        <div class="card">

          <div class="card-header">Birincil Menü</div>
          <div class="card-body">
        </div>

        </div>
      </div>


    </div>
      <!-- /.row -->
  
    
</x-back-layout>



