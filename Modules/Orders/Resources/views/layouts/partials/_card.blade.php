<div class="card card-for-cart" data-id="{{ $product->id }}" style="width: 18rem;">
    <img src="{{ asset('storage/' . $product->product_image) }}" class="card-img-top img-fluid"
        alt="product_photo_{{ $product->name }}">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Prezzo: {{ $product->price }}€</li>
        <li class="list-group-item">Tipo: {{ $product->type }}</li>
    </ul>
</div>
