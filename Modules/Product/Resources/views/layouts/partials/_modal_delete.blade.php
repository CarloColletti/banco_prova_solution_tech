<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">
                    <span id="delete_name_modal"></span>
                </h5>
            </div>
            <div class="modal-body">
                <form id="form_delete_product" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('delete')
                    <p>una volta eliminato non sarà più accessibile</p><br>
                    <p>sieti sicuri?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="submit" class="btn btn-danger">Elimina</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
