@if ($product->deleted_at === null)
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
    @else
        <div class="modal fade" id="forceDeleteModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
@endif

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">
                <span id="delete_name_modal"></span>
            </h5>
        </div>
        <div class="modal-body">
            @if ($product->deleted_at === null)
                <form id="form_delete_product" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('delete')
                    <p>una volta eliminato non sarà più accessibile</p><br>
                @else
                    <form id="form_force_delete_product" action="" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('delete')
                        <p>L'elemento verrà eliminato definitivamnte, e non sarà più recuperabile</p><br>
            @endif

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
