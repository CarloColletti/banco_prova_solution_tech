// Array per memorizzare gli ID dei prodotti selezionati
const selectedProducts = [];

// Event listener per la selezione dei prodotti
document.querySelectorAll('.card-for-cart').forEach(card => {
  card.addEventListener('click', () => {
    
    const productId = card.getAttribute('data-id');
    const checkbox = card.querySelector('input[type="checkbox"]');
    checkbox.checked = !checkbox.checked;

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

