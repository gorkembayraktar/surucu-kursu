
 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="{{ route('dashboard.logout')}}" method="POST" class="form__content" id="logoutForm">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ayrılmak istiyor musunuz?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Oturum bilgilerini sonlandırmak için çıkış yap butonuna basınız.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Vazgeç</button>
                        <button type="submit" value="1" name="logout" class="btn btn-primary">Çıkış yap</button>
                    </div>
                </div>
            </div>
        </form>
</div>