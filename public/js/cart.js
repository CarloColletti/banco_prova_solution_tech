// Array per memorizzare gli ID dei prodotti selezionati
const selectedProducts = [];

// Event listener per la selezione dei prodotti
document.querySelectorAll('.card-for-cart').forEach(card => {
  card.addEventListener('click', () => {
    
    const productId = card.getAttribute('data-id');

    // Controllo se il prodotto è già stato selezionato
    if (selectedProducts.includes(productId)) {
      selectedProducts.splice(selectedProducts.indexOf(productId),1);
      
      card.classList.remove('border', 'border-success','border-5');
      // console.log('****************************');
      // console.log(selectedProducts);
      // console.log('****************************');
      return
    }else{
      // Aggiunta del prodotto all'array
      selectedProducts.push(productId);
    }

    // console.log(selectedProducts);
   
    card.classList.add('border', 'border-success','border-5');

  });
});


// // Event listener per il pulsante "Aggiungi al carrello"
// document.querySelector('#btn-add-cart').addEventListener('click', () => {
//   const ids = selectedProducts;
//   // Invio dei dati dei prodotti al carrello
//   // axios.get(`/order/addCart`, {ids});
//   axios.get(`/order/show`, {ids});
//   // .then(response => {
//   //       const ids = response.data.data;
//   //   });

//   // Reindirizzamento alla pagina del carrello
//   window.location.href = '/order/show';

// });


$(document).ready(function(){
  $('#btn-add-cart').click(function(e){
    e.preventDefault();
    let ids = selectedProducts;
    // console.log(ids);
    $.ajax({
      url: 'order/order_create',
      method: "GET",
      data: {
        ids: ids, // Invia l'array di ID come parametro "ids"
        _token: $('meta[name="csrf-token"]').attr('content'),
      },
      success: function(response) {
        // console.log(response);
        // window.location.href = response.redirectUrl;
      },
    });
  });
});