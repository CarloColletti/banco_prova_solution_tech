{{-- <div class="card card-for-cart" data-id="{{ $product->id }}" style="width: 18rem;">
    <img src="{{ asset('storage/' . $product->product_image) }}" class="card-img-top img-fluid"
        alt="product_photo_{{ $product->name }}">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Prezzo: {{ $product->price }}€</li>
        <li class="list-group-item">Tipo: {{ $product->type }}</li>
    </ul>
</div> --}}




@foreach ($products as $product)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 g-4 d-flex justify-content-center">
        <div class="product-card card-for-cart" data-id="{{ $product->id }}" id="product-{{ $product->id }}">
            <div class="form-check">
                <input type="checkbox" name="products[]" value="{{ $product->id }}" class="form-check-input">
                <label for="product-{{ $product->id }}" class="form-check-label">{{ $product->name }}</label>
            </div>
        </div>
    </div>
@endforeach
