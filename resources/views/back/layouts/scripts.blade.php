
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('back') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('back') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('back') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('back') }}/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('back') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{ asset('back') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('back') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{ asset('back') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>



<script src="{{ asset('back') }}/plugins/toastr/toastr.min.js"></script>
<script src="{{ asset('back') }}/plugins/toastr/toastr_config.js"></script>

<!-- BİLDİRİM GÖSTERMEK --> 


<script>

function ajax_api(props){
    return new Promise((resolve, reject) => {
      $.ajax({
        ...props,
        success:function(response, status, xhr){
           const r = {
              body: response,
              status: xhr.status
           };
           resolve(r);
        },
        error:function(e){
          if(!e.responseJSON ){
            e.responseJSON = {};
          }
  
          if( !e.responseJSON.message)
            e.responseJSON.message ='Bir sorun oluştu';

          resolve({
            body:e.responseJSON,
            status:e.status
          });
        }
    })
    });
    
  }


 function toastError(error){

    if(error && error.message){
      toastr.error( error.message, '', []);
      return;
    }

    toastr.error(`Bir sorun oluştu.`, '', []);
 }


 
/* OTURUM SENKRONIZASYONU */

const broadcast = new BroadcastChannel("oturum");

$("#logoutForm").submit(function(evt){
 
    broadcast.postMessage("logout");
    
    return true;
});

broadcast.onmessage = (event) => {
  switch(event.data){
      case 'logout':
          // işlem süresi olduğundan gecikme ekleniyor
          setTimeout(function(){
            location.reload();
          },500);
      break;
  }
};


</script>
