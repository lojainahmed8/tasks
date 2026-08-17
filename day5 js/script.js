
fetch("https://dummyjson.com/products")
  .then((response) => {
    if (!response.ok) {
      throw new Error(`HTTP Error Status: ${response.status}`);
    }
    return response.json(); 
  })
  .then((result) => {
    console.log(typeof result);
    console.log(result);
  })
  .catch((error) => {
    console.log("Error with fetching data:", error);
  });







// ==================== Variables ====================
let cart = []; 

const container = document.getElementById("products-container");
const cartBtn = document.getElementById("cart-btn");
const cartModal = document.getElementById("cart-modal");
const cartCountElement = document.getElementById("cart-count");
const cartItemsList = document.getElementById("cart-items-list");
const totalPriceElement = document.getElementById("total-price");

// ==================== 1. Fetch Data (Async / Await) ====================
async function getProducts() {
    try {
        let response = await fetch("https://dummyjson.com/products");
        let data = await response.json();
        
        data.products.forEach((product) => {
            createProductCard(product);
        });
    } catch (error) {
        console.log("Error fetching data:", error);
    }
}

// ==================== 2. Render Single Product ====================
function createProductCard(product) {
    let card = document.createElement("div");
    card.classList.add("card");

    let cardImage = document.createElement("img");
    cardImage.src = product.thumbnail;

    let name = document.createElement("p");
    name.innerText = product.title;

    let price = document.createElement("p");
    price.innerText = `$${product.price}`;

    let cardButton = document.createElement("button");
    cardButton.classList.add("add-btn");
    cardButton.innerText = "Add To Cart";

    
    cardButton.addEventListener("click", () => {
        addToCart(product);
    });

    card.append(cardImage, name, price, cardButton);
    container.appendChild(card);
}

// ==================== 3. Add to Cart Logic ====================
function addToCart(product) {
    cart.push(product);
    

    cartCountElement.innerText = cart.length;

    
    updateCartUI();
}

// ==================== 4. Update Cart UI & Calculate Total ====================
function updateCartUI() {
    
    cartItemsList.innerHTML = "";

    if (cart.length === 0) {
        cartItemsList.innerHTML = "<p>Cart is empty!</p>";
        totalPriceElement.innerText = "0.00";
        return;
    }

    let total = 0;


    cart.forEach((item) => {
        let itemRow = document.createElement("div");
        itemRow.classList.add("cart-item");

        itemRow.innerHTML = `
            <span>${item.title}</span>
            <span><b>$${item.price}</b></span>
        `;

        cartItemsList.appendChild(itemRow);

        total += item.price;
    });

    
    totalPriceElement.innerText = total.toFixed(2);
}

// ==================== 5. Toggle Cart Modal on Click ====================

cartBtn.addEventListener("click", () => {
    if (cartModal.style.display === "block") {
        cartModal.style.display = "none";
    } else {
        cartModal.style.display = "block";
    }
});


getProducts();