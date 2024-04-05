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
  let totalPriceElement;

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
    // console.log(maxValue.max);
    if(parseInt(quantityInput.value) < maxValue.max){
      quantityInput.value = parseInt(quantityInput.value) + 1;
      console.log(maxValue.max);
      console.log(quantityInput.value);
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
  totalPriceElement = document.querySelector('.total_amount_show');

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


document.querySelector('#creasy-deal').addEventListener('click', () => {
  const valueToSub = document.querySelector('#discount').value;
  let valueToTotal = document.querySelector('#total_amount').value;
  const typeDiscount = document.querySelector('#discount_type').value;
  let valueToDiscount;
  // console.log(typeDiscount);
  // typeDiscount.value.includes("fisso")
  // if(typeDiscount.value == "fisso"){
  if(typeDiscount == "fisso"){

    if(valueToSub>valueToTotal){
      valueToTotal -= valueToSub;
      valueToTotal = valueToTotal.toFixed(2);
      totalPriceElement.textContent = valueToTotal;
    }else{
      return
    } 
  }else{
    if(valueToSub>100){
      // console.log('troppo');
      return
    }else{
      // console.log('ok');
      
      valueToDiscount = (valueToTotal * valueToSub) / 100;
      valueToTotal = valueToTotal - valueToDiscount;

      valueToTotal = valueToTotal.toFixed(2);
      totalPriceElement.textContent = valueToTotal;
    } 
  }
});






