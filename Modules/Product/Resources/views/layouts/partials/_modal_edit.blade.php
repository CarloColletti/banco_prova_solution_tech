<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifica dati</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.update', $product) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="text" name="name" id="name_edit" value="">
                    {{-- <input type="text" name="email" id="email" value="{{ $email }}">
                    <input type="text" name="email" id="email" value="{{ $email }}">
                    <input type="text" name="email" id="email" value="{{ $email }}">
                    <input type="text" name="email" id="email" value="{{ $email }}">
                    <input type="text" name="email" id="email" value="{{ $email }}">
                    <input type="text" name="email" id="email" value="{{ $email }}">
                    <input type="text" name="email" id="email" value="{{ $email }}">
                    <input type="text" name="email" id="email" value="{{ $email }}">
                    <input type="text" name="email" id="email" value="{{ $email }}">
                    <input type="text" name="email" id="email" value="{{ $email }}">
                    <input type="text" name="email" id="email" value="{{ $email }}">
                    <input type="text" name="email" id="email" value="{{ $email }}"> --}}


                    <button type="submit" class="btn btn-primary">Aggiorna</button>
                </form>
            </div>
        </div>
    </div>
</div>
