// ******************************************************************
const productCards = document.querySelectorAll('#card-for-cart');

document.querySelectorAll('.card-for-cart').forEach(card => {
  card.addEventListener('click', () => {
    const checkbox = card.querySelector('input[type="checkbox"]');
    checkbox.checked = !checkbox.checked;
    if (checkbox.checked) {
      card.classList.add('border', 'border-success','border-5');
    } else {
      card.classList.remove('border', 'border-success','border-5');
    }

  });
});

const checkboxes = document.querySelectorAll('input[type="checkbox"]');

checkboxes.forEach(checkbox => {
  checkbox.checked = false;
});
// ******************************************************************






// ******************************************************************
const priceElements = document.querySelectorAll('.price-for-total-amount');
let total = 0;

// console.log(priceElements);

for (const priceElement of priceElements) {
  const price = parseFloat(priceElement.textContent);
  // console.log(price);
  total += price;
}

let totalPriceElement = document.querySelector('.total_amount_show');

// console.log(totalPriceElement);

// console.log(total)
totalPriceElement.textContent = total;


/********* */


const products = document.querySelectorAll(".row-for-select-data");

let quantity= [];

for (const product of products) {
  const quantityInput = product.querySelector("input[type='number']");
  const increaseButton = product.querySelector(".btn-plus");

  increaseButton.addEventListener("click", () => {
    quantityInput.value = parseInt(quantityInput.value) + 1;
    miafunzione();
  });
}

for (const product of products) {
  const quantityInput = product.querySelector("input[type='number']");
  const decrease = product.querySelector(".btn-min");

  decrease.addEventListener("click", () => {
    quantityInput.value = parseInt(quantityInput.value) - 1;
    quantityInput.value = Math.max(quantityInput.value, 1);
    miafunzione();
  });
}







/******** */



function miafunzione() {
  const priceElements = document.querySelectorAll('.price-for-total-amount');
  // console.log(priceElements);

  let quantity_single = document.querySelectorAll('.input-num-up');
  console.log(quantity_single);

  let quantity_single_total = [];
  total = 0;
  i=0;


  for (const priceElement of priceElements) {
    let single_price = parseFloat(priceElement.textContent);
    // console.log(single_price);

    single_price = single_price * quantity_single[i].value;
    // console.log(quantity_single[i].value);


    quantity_single_total.push(single_price);
    i++;
  }

  for (const element of quantity_single_total) {
    total += element;
  }

  total = total.toFixed(2);


  return totalPriceElement.textContent = total;;
}




// ******************************************************************