<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifica dati</h5>
            </div>
            <div class="modal-body">
                <form id="form_edit_product" action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="name_edit_product" name="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- type --}}
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipologia:</label>
                        <input type="text" class="form-control" id="type_edit_product" name="type"
                            value="{{ old('type') }}">
                        @error('type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- weight --}}
                    <div class="mb-3">
                        <label for="weight" class="form-label">Peso:</label>
                        <input type="text" class="form-control" id="weight_edit_product" name="weight"
                            value="{{ old('weight') }}">
                        @error('weight')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- height --}}
                    <div class="mb-3">
                        <label for="height" class="form-label">Altezza:</label>
                        <input type="text" class="form-control" id="height_edit_product" name="height"
                            value="{{ old('height') }}">
                        @error('height')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- width --}}
                    <div class="mb-3">
                        <label for="width" class="form-label">Larghezza:</label>
                        <input type="text" class="form-control" id="width_edit_product" name="width"
                            value="{{ old('width') }}">
                        @error('width')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- depth --}}
                    <div class="mb-3">
                        <label for="depth" class="form-label">Profondità:</label>
                        <input type="text" class="form-control" id="depth_edit_product" name="depth"
                            value="{{ old('depth') }}">
                        @error('depth')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- stock_quntity --}}
                    <div class="mb-3">
                        <label for="stock_quntity" class="form-label">Quantità:</label>
                        <input type="number" class="form-control" id="stock_quntity_edit_product" name="stock_quntity"
                            value="{{ old('stock_quntity') }}">
                        @error('stock_quntity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- price --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo:</label>
                        <input type="number" step=".01" class="form-control" id="price_edit_product" name="price"
                            value="{{ old('price') }}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- IMAGES INPUT --}}
                    <div class="mb-4 row d-flex">
                        <div class="col-6 form-group py-3 d-flex flex-column">
                            <label for="product_image">Scegli foto:</label>
                            <input class="py-2" type="file" class="form-control" id="product_image"
                                name="product_image">
                        </div>
                        <div class="col-6">
                            <img id="existing_product_image" class="img-fluid" alt="photo-prew">
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="submit" class="btn btn-primary">Aggiorna</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
