 <div class="card" style="width: 18rem;">
     <img src="{{ asset('storage/' . $product->product_image) }}" class="card-img-top img-fluid"
         alt="product_photo_{{ $product->name }}">
     <div class="card-body">
         <h5 class="card-title">{{ $product->name }}</h5>
     </div>
     <ul class="list-group list-group-flush">
         <li class="list-group-item">Quantità: {{ $product->stock_quntity }}</li>
         <li class="list-group-item">Prezzo: {{ $product->price }}€</li>
         <li class="list-group-item">Tipo: {{ $product->type }}</li>
     </ul>
     <div class="card-body d-flex align-items-center gap-4">
         <button type="button" class="btn btm-show text-primary p-0 m-0"
             data-product-stock="{{ $product->stock_quntity }}" data-product-price="{{ $product->price }}"
             data-product-name="{{ $product->name }}" data-product-type="{{ $product->type }}"
             data-product-weight="{{ $product->weight }}" data-product-height="{{ $product->height }}"
             data-product-width="{{ $product->width }}" data-product-depth="{{ $product->depth }}"
             data-product-image="{{ $product->product_image }}">
             <i class="fa-regular fa-eye"></i>
         </button>

         @if ($product->deleted_at === null)
             <div>
                 <button type="button" class="btn edit-button text-success p-0 m-0" data-id="{{ $product->id }}"
                     data-bs-toggle="modal" data-bs-target="#editModal">
                     <i class="fa-regular fa-pen-to-square"></i>
                 </button>
             </div>
             <div>
                 <a href="{{ Route('product_magazine.edit', ['id' => $product->id]) }}">
                     <i class="fa-solid fa-plus"></i></a>
             </div>
         @else
             <form action="{{ route('product.restore', ['id' => $product->id]) }}" method="POST"
                 class="px-2 text-danger">
                 @csrf
                 @method('post')
                 <button type="submit" class="btn p-0 m-0 text-success"><i class="fa-solid fa-recycle"></i></button>
             </form>
         @endif

         @if ($product->deleted_at === null)
             <button type="button" class="btn delete-button text-danger p-0 m-0" data-id="{{ $product->id }}"
                 data-bs-toggle="modal" data-bs-target="#deleteModal">
                 <i class="fa-regular fa-trash-can"></i>
             </button>
         @else
             <button type="button" class="btn force-delete-button text-danger p-0 m-0" data-id="{{ $product->id }}"
                 data-bs-toggle="modal" data-bs-target="#forceDeleteModal">
                 <i class="fa-regular fa-trash-can"></i>
             </button>
         @endif

     </div>
 </div>
