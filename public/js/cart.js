
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

