// -----------------------------
// Carrito LocalStorage - cart.js
// -----------------------------

// Obtener el carrito
function getCart() {
    return JSON.parse(localStorage.getItem('cart')) || [];
}

// Guardar el carrito
function saveCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
}

// Actualizar contador del carrito en navbar
function updateCartCount() {
    const cart = getCart();
    const countElement = document.getElementById('cart-count');

    if (!countElement) return;

    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);

    if (totalItems > 0) {
        countElement.textContent = totalItems;
        countElement.classList.remove('hidden');
    } else {
        countElement.textContent = 0;
        countElement.classList.add('hidden');
    }
}

// Agregar producto al carrito
function addToCart(product) {
    let cart = getCart();

    const index = cart.findIndex(item => item.id === product.id && item.size === product.size);

    if (index !== -1) {
        cart[index].quantity += product.quantity;
    } else {
        cart.push(product);
    }

    saveCart(cart);
    alert("Producto agregado al carrito");
}

// Actualizar cantidad de un producto
function updateQuantity(productId, size, newQty) {
    let cart = getCart();
    const index = cart.findIndex(item => item.id === productId && item.size === size);

    if (index !== -1) {
        cart[index].quantity = newQty;
        if (cart[index].quantity <= 0) {
            cart.splice(index, 1);
        }
        saveCart(cart);
    }
}

// Eliminar un producto
function removeFromCart(productId, size) {
    let cart = getCart();
    cart = cart.filter(item => !(item.id === productId && item.size === size));
    saveCart(cart);
}

// Vaciar todo el carrito
function clearCart() {
    localStorage.removeItem('cart');
    updateCartCount();
}

// Sincronizar contador si el carrito cambia en otra pestaña
window.addEventListener("storage", (event) => {
    if (event.key === "cart") {
        updateCartCount();
    }
});

// Inicializar contador al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    updateCartCount();
});

// -----------------------------
// Exponer funciones al scope global
// -----------------------------
window.addToCart = addToCart;
window.updateQuantity = updateQuantity;
window.removeFromCart = removeFromCart;
window.clearCart = clearCart;
window.updateCartCount = updateCartCount;
window.getCart = getCart;
