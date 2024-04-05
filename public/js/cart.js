/*
  function for select a product for send to controller
*/
const checkboxes = document.querySelectorAll('input[type="checkbox"]');

checkboxes.forEach(checkbox => {
  checkbox.checked = false;
});


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


/*
  function for reset value on reload page
 */
  

  const valueOfImput = document.querySelectorAll('input[type="number"]');

  valueOfImput.forEach(input => {
  input.value = 1;

  showUpgradePrice();
  });




/*
  function for add and reduce product quantity and upgrade the price

  you can add and reduce in the limit of product
 */
const products = document.querySelectorAll(".row-for-select-data");

let quantity= [];

for (const product of products) {
  const quantityInput = product.querySelector("input[type='number']");
  const maxValue = product.querySelector("input[type='number']");
  const increaseButton = product.querySelector(".btn-plus");

  increaseButton.addEventListener("click", () => {
    // console.log(quantityInput.value);
    if(quantityInput.value < maxValue.max){
      quantityInput.value = parseInt(quantityInput.value) + 1;
    }
    showUpgradePrice();
  });
}

for (const product of products) {
  const quantityInput = product.querySelector("input[type='number']");
  const decrease = product.querySelector(".btn-min");

  decrease.addEventListener("click", () => {
    quantityInput.value = parseInt(quantityInput.value) - 1;
    quantityInput.value = Math.max(quantityInput.value, 1);
    showUpgradePrice();
  });
}



/*
  my function for Upgrade the total price
*/

function showUpgradePrice() {
  const priceElements = document.querySelectorAll('.price-for-total-amount');
  // console.log(priceElements);

  let quantity_single = document.querySelectorAll('.input-num-up');
  // console.log(quantity_single);
  let totalPriceElement = document.querySelector('.total_amount_show');

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

  const inserTotal = document.querySelector(".total_amount_selector");
  inserTotal.value = total;


  return totalPriceElement.textContent = total;
}


/*
  function for create a discount and applicate at total
*/


