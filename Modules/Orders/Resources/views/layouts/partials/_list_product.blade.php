<div class="row border-bottom border-seccondary border-opacity-75 text-center py-3 align-items-center">

    {{-- IMG --}}
    <div class="col-2">
        <img src="{{ asset('storage/' . $product->product_image) }}" class="card-img-top img-fluid"
            alt="product_photo_{{ $product->name }}">
    </div>

    {{-- DETAIL PRODUCT --}}
    <div class="col-1">{{ $product->name }}</div>
    <div class="col-2">{{ $product->type }}</div>
    <div class="col-1">{{ $product->weight }}</div>
    <div class="col-1">{{ $product->height }}</div>
    <div class="col-1">{{ $product->width }}</div>
    <div class="col-1">{{ $product->depth }}</div>

    {{-- QUANTITY AND BUTTONS --}}
    <div class="col-2">
        <input type="number" value="1" max="{{ $product->stock_quntity }}" min="1" class="input-num-up">
    </div>

    {{-- PRICE  --}}
    <div class="col-1">
        {{ $product->price }}
    </div>

</div>
