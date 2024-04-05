
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



// const quantity = document.querySelectorAll('.price-for-total-amount');
// console.log(quantity);
// document.querySelectorAll('row-for-select-data').forEach(card => {
//   card.addEventListener('click', () => {
    

//   });
// });

const priceElements = document.querySelectorAll('.price-for-total-amount');
let total = 0;

console.log(priceElements);

for (const priceElement of priceElements) {
  const price = parseFloat(priceElement.textContent);
  console.log(price);
  total += price;
}

const totalPriceElement = document.getElementById('label[for="total_amount"]');
console.log(total)
totalPriceElement.textContent = total;

