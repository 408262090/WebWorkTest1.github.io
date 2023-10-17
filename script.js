let cart = [];
let total = 0;

function addToCart(item, price) {
    cart.push({ item, price });
    total += price;
    updateCartDisplay();
}

function updateCartDisplay() {
    const cartList = document.getElementById('cart');
    const totalElement = document.getElementById('total');
    
    cartList.innerHTML = '';
    cart.forEach((item) => {
        const li = document.createElement('li');
        li.innerText = `${item.item} - ${item.price}元`;
        cartList.appendChild(li);
    });
    
    totalElement.innerText = `總價: ${total}元`;
}
