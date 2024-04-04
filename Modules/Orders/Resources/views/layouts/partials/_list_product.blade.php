<div
    class="row border-bottom border-seccondary border-opacity-75 text-center py-3 align-items-center row-for-select-data">

    {{-- IMG --}}
    <div class="col-2">
        <img src="{{ asset('storage/' . $product->product_image) }}" class="card-img-top img-fluid"
            alt="product_photo_{{ $product->name }}">
    </div>

    {{-- DETAIL PRODUCT --}}
    <div class="col-1">
        <input type="hidden" name="id_products[]" value="{{ $product->id }}">
        {{ $product->name }}
    </div>

    <div class="col-2">{{ $product->type }}</div>
    <div class="col-1">{{ $product->weight }}</div>
    <div class="col-1">{{ $product->height }}</div>
    <div class="col-1">{{ $product->width }}</div>
    <div class="col-1">{{ $product->depth }}</div>

    {{-- QUANTITY AND BUTTONS --}}
    <div class="col-2">
        <input type="number" value="1" max="{{ $product->stock_quntity }}" min="1" class="input-num-up">
        <span class="btn text-success" id="btn-plus">+</span>
        <span class="btn text-danger" id="btn-min">-</span>
    </div>

    {{-- PRICE  --}}
    <div class="col-1">
        <span id="price-for-total-amount">
            {{ $product->price }}
        </span>
    </div>

</div>
