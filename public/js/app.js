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
        // Precompila i campi del form con i dati ricevuti
        
        console.log(data.success.product.name);

        let product = data.success.product;
        console.log(product.name);

        // console.log(product.name)
        $('#name_edit').val(product.name);
        

        

        // Mostra la modale
        $('#editModal').modal('show');
      }
    });
  });
});


// $(document).ready(function() {
//   $('#editModal').on('submit', 'form', function(e) {
//     e.preventDefault();

//     var id = $(this).data('id');
//     var formData = $(this).serialize();

//     $.ajax({
//       url: '/controller/update/' + id,
//       method: 'PUT',
//       data: formData,
//       success: function(data) {
//         // Aggiorna la pagina o la tabella con i dati aggiornati
//         // ...

//         // Chiudi la modale
//         $('#editModal').modal('hide');
//       }
//     });
//   });
// });