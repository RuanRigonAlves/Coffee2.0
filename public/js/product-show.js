document.addEventListener('DOMContentLoaded', function(){
const totalPriceEl = document.querySelector('#total-price');
const quantityInput = document.querySelector('#quantity');
const price = document.querySelector('#product-price').innerHTML;

quantityInput.addEventListener('input', function(){
    const quantity = parseInt(quantityInput.value);
    const total = quantity * price;
    totalPriceEl.innerText = total
});

});