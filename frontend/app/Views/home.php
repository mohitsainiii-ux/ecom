<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EcomStore - Home</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family: Arial, Helvetica, sans-serif;

            background: #ffffff;

            color: #000000;

        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {

            height: 84px;

            background: #2864e6;

            border-bottom: 1px solid rgba(0, 0, 0, 0.15);

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 6%;

        }


        .logo {

            font-size: 30px;

            font-weight: 700;

            color: #000000;

            text-decoration: none;

        }


        .nav-links {

            display: flex;

            align-items: center;

            gap: 30px;

        }


        .nav-links a,
        .nav-links button {

            color: #000000;

            text-decoration: none;

            font-size: 20px;

            font-weight: 600;

            background: none;

            border: none;

            cursor: pointer;

            font-family: Arial, Helvetica, sans-serif;

        }


        .nav-links a:hover,
        .nav-links button:hover {

            opacity: 0.7;

        }


        /* =====================================================
           CART LINK
        ===================================================== */

        .cart-link {

            display: flex;

            align-items: center;

            gap: 7px;

        }


        .cart-count {

            min-width: 24px;

            height: 24px;

            padding: 2px 7px;

            background: #ffffff;

            color: #2864e6;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 14px;

            font-weight: 700;

        }


        /* =====================================================
           LOGGED IN
        ===================================================== */

        #loggedInLinks {

            display: none;

            align-items: center;

            gap: 25px;

        }


        .profile-link {

            display: flex;

            align-items: center;

            gap: 8px;

        }


        .profile-icon {

            width: 36px;

            height: 36px;

            border-radius: 50%;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;

        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {

            min-height: 495px;

            background: #2864e6;

            padding: 90px 6%;

        }


        .hero-content {

            max-width: 1000px;

        }


        .hero h1 {

            font-size: 68px;

            line-height: 1.1;

            margin-bottom: 35px;

            color: #000000;

        }


        .hero p {

            font-size: 28px;

            line-height: 1.5;

            margin-bottom: 42px;

            max-width: 1000px;

        }


        .shop-btn {

            display: inline-block;

            background: #ffffff;

            color: #000000;

            padding: 18px 38px;

            border: 2px solid #000000;

            border-radius: 8px;

            text-decoration: none;

            font-size: 22px;

            font-weight: 700;

            cursor: pointer;

        }


        .shop-btn:hover {

            background: #eeeeee;

        }


        /* =====================================================
           PRODUCTS SECTION
        ===================================================== */

        .products-section {

            padding: 70px 4%;

            min-height: 500px;

        }


        .products-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 45px;

        }


        .products-header h2 {

            font-size: 42px;

        }


        .products-header p {

            font-size: 20px;

        }


        /* =====================================================
           PRODUCTS GRID
        ===================================================== */

        .products-grid {

            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 38px;

        }


        /* =====================================================
           PRODUCT CARD
        ===================================================== */

        .product-card {

            border: 1px solid #2864e6;

            border-radius: 14px;

            overflow: hidden;

            background: #ffffff;

            min-height: 570px;

            transition: transform 0.2s ease,
                        box-shadow 0.2s ease;

        }


        .product-card:hover {

            transform: translateY(-5px);

            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);

        }


        /* =====================================================
           PRODUCT IMAGE
        ===================================================== */

        .product-image-container {

            height: 275px;

            background: #eef5ff;

            display: flex;

            align-items: center;

            justify-content: center;

        }


        .product-image {

            max-width: 90%;

            max-height: 240px;

            object-fit: contain;

        }


        .default-product-icon {

            font-size: 80px;

        }


        /* =====================================================
           PRODUCT INFO
        ===================================================== */

        .product-info {

            padding: 28px;

        }


        .product-name {

            font-size: 25px;

            font-weight: 700;

            margin-bottom: 18px;

        }


        .product-price {

            font-size: 23px;

            font-weight: 700;

            margin-bottom: 12px;

        }


        .product-stock {

            font-size: 18px;

            color: #555555;

            margin-bottom: 28px;

        }


        /* =====================================================
           PRODUCT BUTTONS
        ===================================================== */

        .product-buttons {

            display: flex;

            gap: 12px;

        }


        .add-cart-btn,
        .buy-now-btn {

            flex: 1;

            min-height: 56px;

            padding: 12px 10px;

            border-radius: 8px;

            font-size: 17px;

            font-weight: 700;

            cursor: pointer;

            transition: 0.2s ease;

        }


        .add-cart-btn {

            background: #ffffff;

            color: #2864e6;

            border: 2px solid #2864e6;

        }


        .add-cart-btn:hover {

            background: #2864e6;

            color: #ffffff;

        }


        .buy-now-btn {

            background: #2864e6;

            color: #ffffff;

            border: 2px solid #2864e6;

        }


        .buy-now-btn:hover {

            background: #1d50c4;

        }


        .add-cart-btn:disabled,
        .buy-now-btn:disabled {

            opacity: 0.5;

            cursor: not-allowed;

        }


        /* =====================================================
           LOADING
        ===================================================== */

        .loading {

            text-align: center;

            font-size: 20px;

            padding: 50px;

            grid-column: 1 / -1;

        }


        /* =====================================================
           ERROR
        ===================================================== */

        .error-box {

            background: #ffe8e8;

            border: 1px solid #ff5555;

            border-radius: 10px;

            padding: 20px;

            font-size: 18px;

            color: #b00000;

            margin-bottom: 30px;

        }


        /* =====================================================
           TOAST
        ===================================================== */

        .toast {

            position: fixed;

            top: 110px;

            right: 40px;

            background: #28a745;

            color: #ffffff;

            padding: 16px 28px;

            border-radius: 10px;

            font-size: 18px;

            font-weight: 700;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);

            z-index: 9999;

            opacity: 0;

            transform: translateY(-20px);

            pointer-events: none;

            transition: all 0.3s ease;

        }


        .toast.show {

            opacity: 1;

            transform: translateY(0);

        }


        /* =====================================================
           FOOTER
        ===================================================== */

        footer {

            background: #2864e6;

            text-align: center;

            padding: 28px;

            font-size: 17px;

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1200px) {

            .products-grid {

                grid-template-columns: repeat(3, 1fr);

            }

        }


        @media (max-width: 900px) {

            .products-grid {

                grid-template-columns: repeat(2, 1fr);

            }


            .hero h1 {

                font-size: 50px;

            }


            .hero p {

                font-size: 22px;

            }

        }


        @media (max-width: 650px) {

            .navbar {

                height: auto;

                padding: 20px;

                flex-direction: column;

                gap: 20px;

            }


            .nav-links {

                gap: 15px;

                flex-wrap: wrap;

                justify-content: center;

            }


            .nav-links a,
            .nav-links button {

                font-size: 17px;

            }


            .hero {

                padding: 60px 25px;

            }


            .hero h1 {

                font-size: 40px;

            }


            .hero p {

                font-size: 20px;

            }


            .products-section {

                padding: 50px 25px;

            }


            .products-header {

                flex-direction: column;

                align-items: flex-start;

                gap: 15px;

            }


            .products-grid {

                grid-template-columns: 1fr;

            }


            .product-buttons {

                flex-direction: column;

            }


            .toast {

                right: 20px;

                left: 20px;

                text-align: center;

            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     NAVBAR
===================================================== -->

<nav class="navbar">


    <!-- LOGO -->

    <a href="<?= base_url('/') ?>" class="logo">

        EcomStore

    </a>


    <div class="nav-links">


        <!-- HOME -->

        <a href="<?= base_url('/') ?>">

            Home

        </a>


        <!-- CART -->

        <a href="<?= base_url('/cart') ?>"
           id="cartLink"
           class="cart-link">

            🛒 Cart

            <span id="cartCount" class="cart-count">

                0

            </span>

        </a>


        <!-- LOGGED OUT -->

        <div id="loggedOutLinks"
             style="display: flex; gap: 30px; align-items: center;">


            <a href="<?= base_url('/login') ?>">

                Login

            </a>


            <a href="<?= base_url('/register') ?>">

                Register

            </a>


        </div>


        <!-- LOGGED IN -->

        <div id="loggedInLinks">


            <!-- PROFILE -->

            <a href="<?= base_url('/profile') ?>"
               class="profile-link"
               id="profileLink">


                <span class="profile-icon">

                    👤

                </span>


                <span id="profileName">

                    Profile

                </span>


            </a>


            <!-- LOGOUT -->

            <button type="button"
                    id="logoutButton">

                Logout

            </button>


        </div>


    </div>

</nav>



<!-- =====================================================
     HERO
===================================================== -->

<section class="hero">


    <div class="hero-content">


        <h1>

            Welcome to EcomStore

        </h1>


        <p>

            Discover quality products at great prices.
            Browse our latest products and find what you need.

        </p>


        <a href="#products"
           class="shop-btn">

            Shop Now

        </a>


    </div>


</section>



<!-- =====================================================
     PRODUCTS
===================================================== -->

<section class="products-section"
         id="products">


    <div class="products-header">


        <h2>

            Our Products

        </h2>


        <p>

            Latest products from our store

        </p>


    </div>


    <!-- ERROR -->

    <div id="productError"></div>


    <!-- PRODUCT GRID -->

    <div class="products-grid"
         id="productsGrid">


        <div class="loading">

            Loading products...

        </div>


    </div>


</section>



<!-- =====================================================
     TOAST
===================================================== -->

<div id="toast"
     class="toast">

    Product added to cart!

</div>



<!-- =====================================================
     FOOTER
===================================================== -->

<footer>

    © 2026 EcomStore. All rights reserved.

</footer>



<script>


/*
=========================================================
CONFIGURATION
=========================================================
*/

const API_BASE_URL =
    "http://127.0.0.1:8001";



/*
=========================================================
GET AUTH TOKEN
=========================================================
*/

function getAuthToken() {


    const possibleTokenNames = [

        "token",

        "access_token",

        "authToken",

        "jwt_token"

    ];


    for (const name of possibleTokenNames) {


        const value =
            localStorage.getItem(name);


        if (
            value &&
            value !== "null" &&
            value !== "undefined"
        ) {

            return value;

        }

    }


    return null;

}



/*
=========================================================
GET USER DATA
=========================================================
*/

function getUserData() {


    const possibleUserNames = [

        "user",

        "user_data",

        "currentUser"

    ];


    for (const name of possibleUserNames) {


        const value =
            localStorage.getItem(name);


        if (value) {


            try {

                return JSON.parse(value);

            }


            catch (error) {

                return null;

            }

        }

    }


    return null;

}



/*
=========================================================
UPDATE NAVBAR
=========================================================
*/

function updateNavbar() {


    const token =
        getAuthToken();


    const loggedOutLinks =
        document.getElementById(
            "loggedOutLinks"
        );


    const loggedInLinks =
        document.getElementById(
            "loggedInLinks"
        );


    const profileName =
        document.getElementById(
            "profileName"
        );


    /*
    ---------------------------------------------
    USER LOGGED IN
    ---------------------------------------------
    */

    if (token) {


        loggedOutLinks.style.display =
            "none";


        loggedInLinks.style.display =
            "flex";


        const user =
            getUserData();


        if (user) {


            if (user.name) {

                profileName.textContent =
                    user.name;

            }

            else if (user.email) {

                profileName.textContent =
                    user.email;

            }

        }

    }


    /*
    ---------------------------------------------
    USER LOGGED OUT
    ---------------------------------------------
    */

    else {


        loggedOutLinks.style.display =
            "flex";


        loggedInLinks.style.display =
            "none";

    }

}



/*
=========================================================
LOGOUT
=========================================================
*/

function logout() {


    localStorage.removeItem(
        "token"
    );


    localStorage.removeItem(
        "access_token"
    );


    localStorage.removeItem(
        "authToken"
    );


    localStorage.removeItem(
        "jwt_token"
    );


    localStorage.removeItem(
        "user"
    );


    localStorage.removeItem(
        "user_data"
    );


    localStorage.removeItem(
        "currentUser"
    );


    updateNavbar();


    window.location.href =
        "<?= base_url('/') ?>";

}



/*
=========================================================
LOGOUT BUTTON
=========================================================
*/

document
    .getElementById("logoutButton")
    .addEventListener(
        "click",
        function () {

            logout();

        }
    );



/*
=========================================================
GET CART
=========================================================
*/

function getCart() {


    try {


        const cart =
            JSON.parse(
                localStorage.getItem(
                    "cart"
                ) || "[]"
            );


        if (Array.isArray(cart)) {

            return cart;

        }


        return [];

    }


    catch (error) {

        console.error(
            "Cart error:",
            error
        );

        return [];

    }

}



/*
=========================================================
SAVE CART
=========================================================
*/

function saveCart(cart) {


    localStorage.setItem(

        "cart",

        JSON.stringify(cart)

    );

}



/*
=========================================================
UPDATE CART COUNT
=========================================================
*/

function updateCartCount() {


    const cartCount =
        document.getElementById(
            "cartCount"
        );


    if (!cartCount) {

        return;

    }


    const cart =
        getCart();


    let totalItems = 0;


    cart.forEach(
        function (item) {


            totalItems +=
                Number(
                    item.quantity || 1
                );


        }
    );


    cartCount.textContent =
        totalItems;

}



/*
=========================================================
SHOW TOAST
=========================================================
*/

function showToast(message) {


    const toast =
        document.getElementById(
            "toast"
        );


    toast.textContent =
        message;


    toast.classList.add(
        "show"
    );


    setTimeout(
        function () {

            toast.classList.remove(
                "show"
            );

        },
        2500
    );

}



/*
=========================================================
ADD PRODUCT TO CART
=========================================================
*/

function addToCart(product) {


    /*
    Get existing cart
    */

    const cart =
        getCart();


    /*
    Find product
    */

    const existingProduct =
        cart.find(
            function (item) {

                return String(item.id) ===
                       String(product.id);

            }
        );


    /*
    Product already exists
    */

    if (existingProduct) {


        existingProduct.quantity =
            Number(
                existingProduct.quantity || 1
            ) + 1;

    }


    /*
    New product
    */

    else {


        cart.push({

            id: product.id,

            name:
                product.name ||
                product.title ||
                "Product",

            price:
                product.price || 0,

            image:
                product.image || "",

            quantity: 1

        });

    }


    /*
    Save cart
    */

    saveCart(cart);


    /*
    Update header
    */

    updateCartCount();


    /*
    Show message
    */

    showToast(
        "Product added to cart!"
    );

}



/*
=========================================================
BUY NOW
=========================================================
*/

function buyNow(product) {


    /*
    First add product
    */

    addToCart(product);


    /*
    Go to cart
    */

    setTimeout(
        function () {

            window.location.href =
                "<?= base_url('/cart') ?>";

        },
        300
    );

}



/*
=========================================================
LOAD PRODUCTS
=========================================================
*/

async function loadProducts() {


    const productsGrid =
        document.getElementById(
            "productsGrid"
        );


    const productError =
        document.getElementById(
            "productError"
        );


    try {


        /*
        API REQUEST
        */

        const response =
            await fetch(

                API_BASE_URL +
                "/api/products",

                {

                    method: "GET",

                    headers: {

                        "Accept":
                            "application/json"

                    }

                }

            );


        /*
        HTTP ERROR
        */

        if (!response.ok) {


            throw new Error(

                "HTTP " +
                response.status

            );

        }


        /*
        JSON RESPONSE
        */

        const data =
            await response.json();


        console.log(
            "Products API response:",
            data
        );


        /*
        Clear loading
        */

        productsGrid.innerHTML = "";


        /*
        PRODUCTS ARRAY
        */

        let products = [];


        if (Array.isArray(data)) {


            products =
                data;

        }


        else if (
            Array.isArray(
                data.products
            )
        ) {


            products =
                data.products;

        }


        else if (
            Array.isArray(
                data.data
            )
        ) {


            products =
                data.data;

        }


        /*
        NO PRODUCTS
        */

        if (
            products.length === 0
        ) {


            productsGrid.innerHTML = `

                <div class="loading">

                    No products available.

                </div>

            `;


            return;

        }



        /*
        =================================================
        CREATE PRODUCT CARDS
        =================================================
        */

        products.forEach(
            function (product) {


                /*
                CARD
                */

                const card =
                    document.createElement(
                        "div"
                    );


                card.className =
                    "product-card";


                /*
                PRODUCT IMAGE
                */

                let imageHTML = `

                    <div class="default-product-icon">

                        🛍️

                    </div>

                `;


                if (product.image) {


                    let imageURL =
                        product.image;


                    /*
                    Relative URL
                    */

                    if (

                        !imageURL.startsWith(
                            "http://"
                        )

                        &&

                        !imageURL.startsWith(
                            "https://"
                        )

                    ) {


                        imageURL =
                            API_BASE_URL +
                            "/" +
                            imageURL.replace(
                                /^\/+/,
                                ""
                            );

                    }


                    imageHTML = `

                        <img

                            src="${escapeHTML(imageURL)}"

                            class="product-image"

                            alt="${escapeHTML(
                                product.name ||
                                "Product"
                            )}"

                            onerror="
                                this.style.display='none';
                                this.parentElement.innerHTML=
                                '<div class=&quot;default-product-icon&quot;>🛍️</div>';
                            "

                        >

                    `;

                }



                /*
                PRODUCT NAME
                */

                const productName =
                    escapeHTML(

                        product.name ||

                        product.title ||

                        "Product"

                    );



                /*
                PRODUCT PRICE
                */

                const price =

                    product.price !==
                    undefined

                    &&

                    product.price !==
                    null

                    ?

                    "₹" +
                    product.price

                    :

                    "Price unavailable";



                /*
                PRODUCT STOCK
                */

                const stock =

                    product.stock !==
                    undefined

                    &&

                    product.stock !==
                    null

                    ?

                    "Stock: " +
                    product.stock

                    :

                    "Stock unavailable";



                /*
                PRODUCT ID
                */

                const productID =
                    product.id ||
                    product.product_id ||
                    "";



                /*
                OUT OF STOCK
                */

                const outOfStock =

                    product.stock !==
                    undefined

                    &&

                    Number(product.stock) <= 0;



                /*
                CARD HTML
                */

                card.innerHTML = `

                    <div class="product-image-container">

                        ${imageHTML}

                    </div>


                    <div class="product-info">


                        <div class="product-name">

                            ${productName}

                        </div>


                        <div class="product-price">

                            ${price}

                        </div>


                        <div class="product-stock">

                            ${stock}

                        </div>


                        <div class="product-buttons">


                            <button

                                type="button"

                                class="add-cart-btn"

                                ${outOfStock ? "disabled" : ""}

                            >

                                Add to Cart

                            </button>


                            <button

                                type="button"

                                class="buy-now-btn"

                                ${outOfStock ? "disabled" : ""}

                            >

                                Buy Now

                            </button>


                        </div>


                    </div>

                `;



                /*
                =================================================
                ADD TO CART BUTTON
                =================================================
                */

                const addButton =
                    card.querySelector(
                        ".add-cart-btn"
                    );


                addButton.addEventListener(

                    "click",

                    function () {


                        addToCart(product);

                    }

                );



                /*
                =================================================
                BUY NOW BUTTON
                =================================================
                */

                const buyButton =
                    card.querySelector(
                        ".buy-now-btn"
                    );


                buyButton.addEventListener(

                    "click",

                    function () {


                        buyNow(product);

                    }

                );



                /*
                ADD CARD TO GRID
                */

                productsGrid.appendChild(
                    card
                );


            }
        );


    }


    /*
    =================================================
    ERROR
    =================================================
    */

    catch (error) {


        console.error(

            "Products API error:",

            error

        );


        productsGrid.innerHTML =
            "";


        productError.innerHTML = `

            <div class="error-box">


                <strong>

                    Unable to load products.

                </strong>


                <br><br>


                Please check whether the
                FastAPI server is running.


                <br><br>


                Error:

                ${escapeHTML(
                    error.message
                )}


            </div>

        `;

    }

}



/*
=========================================================
ESCAPE HTML
=========================================================
*/

function escapeHTML(value) {


    const div =
        document.createElement(
            "div"
        );


    div.textContent =
        String(value);


    return div.innerHTML;

}



/*
=========================================================
PAGE LOAD
=========================================================
*/

document.addEventListener(

    "DOMContentLoaded",

    function () {


        /*
        Update login status
        */

        updateNavbar();


        /*
        Update cart count
        */

        updateCartCount();


        /*
        Load products
        */

        loadProducts();

    }

);



/*
=========================================================
UPDATE CART WHEN STORAGE CHANGES
=========================================================
*/

window.addEventListener(

    "storage",

    function () {


        updateNavbar();


        updateCartCount();

    }

);

</script>


</body>

</html>