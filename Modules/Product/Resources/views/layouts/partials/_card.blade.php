 <div class="card" style="width: 18rem;">
     <div style="width: 18rem; heigth: 18rem">
         <img src="{{ asset('storage/' . $product->product_image) }}" class="card-img-top img-fluid"
             alt="product_photo_{{ $product->product_name }}">
     </div>
     <div class="card-body">
         <h5 class="card-title">{{ $product->name }}</h5>
     </div>
     <ul class="list-group list-group-flush">
         <li class="list-group-item">Quantità: {{ $product->stock_quntity }}</li>
         <li class="list-group-item">Prezzo: {{ $product->price }}€</li>
         <li class="list-group-item">Tipo: {{ $product->type }}</li>
     </ul>
     <div class="card-body d-flex gap-4">
         <button type="button" class="btn btm-show text-primary p-0 m-0"
             data-product-stock="{{ $product->stock_quntity }}" data-product-price="{{ $product->price }}"
             data-product-name="{{ $product->name }}" data-product-type="{{ $product->type }}"
             data-product-weight="{{ $product->weight }}" data-product-height="{{ $product->height }}"
             data-product-width="{{ $product->width }}" data-product-depth="{{ $product->depth }}"
             data-product-image="{{ $product->product_image }}">
             <i class="fa-regular fa-eye"></i>
         </button>
         <div>
             <button type="button" class="btn edit-button text-primary p-0 m-0" data-id="{{ $product->id }}"
                 data-bs-toggle="modal" data-bs-target="#editModal">
                 <i class="fa-regular fa-pen-to-square"></i>
             </button>


         </div>
         <div>

             <i class="fa-regular fa-trash-can"></i>

         </div>
     </div>
 </div>
