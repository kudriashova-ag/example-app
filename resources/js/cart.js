const addToCartForm = document.forms.addToCartForm;


addToCartForm.addEventListener('submit', async (e) => { 
  e.preventDefault();
  let result = await axios.post('/cart/add', new FormData(addToCartForm));
  updateCart(result.data);
})

function updateCart(content) { 
  document.getElementById('cart').innerHTML = content;
}

const removeProduct = async (id) => {
  let result = await axios.post('/cart/delete', { id: id });
  updateCart(result.data);
}

document.getElementById('cart').addEventListener('click', (e) => { 
  if (e.target.classList.contains('remove')) { 
    removeProduct(e.target.closest('tr').dataset.id);
  }

  if (e.target.classList.contains('plus')) {
    changeQty(e.target.closest('tr').dataset.id, e.target.previousElementSibling.value);
  }

  if (e.target.classList.contains('minus')) {
    changeQty(e.target.closest('tr').dataset.id, e.target.nextElementSibling.value);
  }

})

document.querySelector('.clear-cart').addEventListener('click', async () => { 
  let result = await axios.delete('/cart/clear');
  updateCart(result.data);
})