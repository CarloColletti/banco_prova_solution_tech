// console.log('ciao');

const openModalBtns = document.querySelectorAll('.btm-show');
const modal = new bootstrap.Modal('#modal', { backdrop: 'true' });

openModalBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        // Accedi agli attributi "data-" all'interno del ciclo
        const productStock = btn.dataset.productStock;
        const productPrice = btn.dataset.productPrice;
        const productName = btn.dataset.productName;
        const productType = btn.dataset.productType;
        const productWeight = btn.dataset.productWeight;
        const productHeight = btn.dataset.productHeight;
        const productWidth = btn.dataset.productWidth;
        const productDepth = btn.dataset.productDepth;
        const productImage = btn.dataset.productImage;

        // Crea l'oggetto prodotto per inserire i dati
        const productData = {
            stock: productStock,
            price: productPrice,
            name: productName,
            type: productType,
            weight: productWeight,
            height: productHeight,
            width: productWidth,
            depth: productDepth,
            image: productImage,
        };


        //check per i dati
        console.log(productData); 

        // aggiorno il contenuto della modale
        const modalProductStock = document.querySelector('#modal-product-stock');
        modalProductStock.textContent = productData.stock;

        const modalProductPrice = document.querySelector('#modal-product-price');
        modalProductPrice.textContent = productData.price;

        const modalProductName = document.querySelector('#modal-product-name');
        modalProductName.textContent = productData.name;

        const modalProductType = document.querySelector('#modal-product-type');
        modalProductType.textContent = productData.type;

        const modalProductWeight = document.querySelector('#modal-product-weight');
        modalProductWeight.textContent = productData.weight;

        const modalProductHeight = document.querySelector('#modal-product-height');
        modalProductHeight.textContent = productData.height;

        const modalProductWidth = document.querySelector('#modal-product-width');
        modalProductWidth.textContent = productData.width;

        const modalProductDepth = document.querySelector('#modal-product-depth');
        modalProductDepth.textContent = productData.depth;


        // Mostra la modale
        modal.show(); 
    });
});

$(document).ready(function() {
  $('.edit-button').click(function(e) {
    e.preventDefault();

    let id = $(this).data('id');

    $.ajax({
      url: 'product/'+id+'/edit',
      method: 'GET',
      success: function(data) {
        console.log(data);
        // console.log(data.success.product.name);

        // assegna a product l'array dei dati da modificare
        let product = data.success.product;
        let id_for_update_link = data.success.id_for_update_link;
        let url_image = data.success.url_image;
        // console.log(id_for_update_link);
        // console.log(product.name);

        //precompila i dati nel form
        $('#form_edit_product').attr('action', id_for_update_link)
        $('#name_edit_product').val(product.name);
        $('#type_edit_product').val(product.type);
        $('#weight_edit_product').val(product.weight);
        $('#height_edit_product').val(product.height);
        $('#width_edit_product').val(product.width);
        $('#depth_edit_product').val(product.depth);
        $('#stock_quntity_edit_product').val(product.stock_quntity);
        $('#price_edit_product').val(product.price);
        // $('#product_image_edit_product').val(product.product_image);

        console.log(product.product_image);

        if (product.product_image) {
            $('#existing_product_image').attr('src', "http://127.0.0.1:8000/storage/public/" + product.product_image).show();
            // $('#existing_product_image').attr('src', url_image).show();
        } else {
            $('#existing_product_image').hide();
        }


        // Mostra la modale
        $('#editModal').modal('show');
      }
    });
  });
  
});



$(document).ready(function() {
  $('.delete-button').click(function(e) {
    e.preventDefault();

    let id = $(this).data('id');

    $.ajax({
      url: 'product/'+id+'/edit',
      method: 'GET',
      success: function(data) {
        console.log(data);
        // console.log(data.success.product.name);

        // assegna a product l'array dei dati da modificare
        let product = data.success.product;
        let id_for_delete_link = data.success.id_for_delete_link;

        // console.log(id_for_update_link);
        // console.log(product.name);

        //precompila i dati nel form
        const textDeleteModal = document.querySelector('#delete_name_modal');
        textDeleteModal.textContent = 'Stai per eliminare il prodotto: '+ product.name;
        $('#form_delete_product').attr('action', id_for_delete_link)



        // Mostra la modale
        $('#deleteModal').modal('show');
      }
    });
  });
  
});



$(document).ready(function() {
  $('.force-delete-button').click(function(e) {
    e.preventDefault();

    let id = $(this).data('id');

    console.log(id);

    $.ajax({
      url: ''+id+'/returnIdForForceDelete',
      method: 'GET',
      success: function(data) {
        console.log(data);
        // console.log(data.success.product.name);

        // assegna a product l'array dei dati da modificare
          
        let id_for_force_delete_link = data.success.id_for_force_delete_link;

        console.log(id_for_force_delete_link);
        // console.log(product.name);

        //precompila i dati nel form

        $('#form_force_delete_product').attr('action', id_for_force_delete_link)



        // Mostra la modale
        $('#forceDeleteModal').modal('show');
      }
    });
  });
  
});




