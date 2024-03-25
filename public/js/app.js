console.log('ciao');

const openModalBtns = document.querySelectorAll('.btn-primary');

openModalBtns.forEach((btn) => {
  btn.addEventListener('click', () => {
    const productId = btn.dataset.productId;
    const productName = btn.dataset.productName;

    // Crea l'oggetto dati
    const productData = {
      id: productId,
      name: productName,
      // ... altri dati del prodotto ...
    };

    // Invia i dati alla modal
    const modal = new bootstrap.Modal('#modal');
    modal.show(productData);
  });
});





const modal = new bootstrap.Modal('#modal', {backdrop: 'true'});

openModalBtns.forEach((btn) => {
  btn.addEventListener('click', () => {
    const productId = btn.dataset.productId;
    const productName = btn.dataset.productName;
    
    // ... (Your code to fetch other product details) ...

    // Create product data object
    const productData = {
      id: productId,
      name: productName,
      // ... other product details ...
    };

    // Update modal content based on product data
    const modalProductId = document.querySelector('#modal-product-id');
    modalProductId.textContent = productData.id;

    const modalProductName = document.querySelector('#modal-product-name');
    modalProductName.textContent = productData.name;

    // ... Update other modal elements ...

    // Show the modal
    modal.show(productData);
  });
});