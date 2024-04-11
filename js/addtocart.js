// Assuming you have a cart object to store the added items
let cart = [];

// Get references to relevant HTML elements
const addToCartButton = document.getElementById('addToCartButton');
const productSelect = document.getElementById('productSelect1');
const quantitySelect = document.getElementById('quantitySelect1');

addToCartButton.addEventListener('click', function () {
    // Get selected product size and quantity
    const selectedSize = productSelect.value;
    const selectedQuantity = parseInt(quantitySelect.value);

    // Validate the selected quantity (e.g., ensure it's not negative)

    // Add the item to the cart
    cart.push({
        size: selectedSize,
        quantity: selectedQuantity,
        // You can also include the product ID, name, and other details here
    });

    // You can also update the cart display or send this data to the server
    // For example: updateCartDisplay() or sendToServer(cart)

    console.log('Product added to cart:', selectedSize, 'Quantity:', selectedQuantity);
});
