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

        /* =========================
           NAVBAR
        ========================= */

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
            gap: 35px;
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

        /* =========================
           PROFILE
        ========================= */

        .profile-link {
            display: none;
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

        /* =========================
           HERO
        ========================= */

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

        /* =========================
           PRODUCTS
        ========================= */

        .products-section {
            padding: 70px 6%;
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

        .products-grid {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 30px;
        }

        .product-card {
            border: 1px solid #2864e6;
            border-radius: 14px;

            overflow: hidden;

            background: #ffffff;

            min-height: 400px;

            transition: transform 0.2s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image-container {
            height: 220px;

            background: #eef5ff;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image {
            max-width: 100%;
            max-height: 200px;
            object-fit: contain;
        }

        .default-product-icon {
            font-size: 70px;
        }

        .product-info {
            padding: 22px;
        }

        .product-name {
            font-size: 21px;
            font-weight: 700;

            margin-bottom: 12px;
        }

        .product-price {
            font-size: 20px;
            font-weight: 700;

            margin-bottom: 10px;
        }

        .product-stock {
            font-size: 16px;
            color: #555555;
        }

        /* =========================
           LOADING
        ========================= */

        .loading {
            text-align: center;

            font-size: 20px;

            padding: 50px;

            grid-column: 1 / -1;
        }

        /* =========================
           ERROR
        ========================= */

        .error-box {
            background: #ffe8e8;

            border: 1px solid #ff5555;

            border-radius: 10px;

            padding: 20px;

            font-size: 18px;

            color: #b00000;

            margin-bottom: 30px;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #2864e6;

            text-align: center;

            padding: 28px;

            font-size: 17px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {

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
                gap: 18px;
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
        }
    </style>
</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">

    <a href="<?= base_url('/') ?>" class="logo">
        EcomStore
    </a>

    <div class="nav-links">

        <!-- Always visible -->
        <a href="<?= base_url('/') ?>">
            Home
        </a>

        <!-- Logged OUT -->
        <div id="loggedOutLinks" style="display: flex; gap: 35px; align-items: center;">

            <a href="<?= base_url('/login') ?>">
                Login
            </a>

            <a href="<?= base_url('/register') ?>">
                Register
            </a>

        </div>

        <!-- Logged IN -->
        <div id="loggedInLinks" style="display: none; gap: 25px; align-items: center;">

            <a href="<?= base_url('/profile') ?>" class="profile-link" id="profileLink">

                <span class="profile-icon">
                    👤
                </span>

                <span>
                    Profile
                </span>

            </a>

            <button type="button" id="logoutButton">
                Logout
            </button>

        </div>

    </div>

</nav>


<!-- =========================
     HERO
========================= -->

<section class="hero">

    <div class="hero-content">

        <h1>
            Welcome to EcomStore
        </h1>

        <p>
            Discover quality products at great prices.
            Browse our latest products and find what you need.
        </p>

        <a href="#products" class="shop-btn">
            Shop Now
        </a>

    </div>

</section>


<!-- =========================
     PRODUCTS
========================= -->

<section class="products-section" id="products">

    <div class="products-header">

        <h2>
            Our Products
        </h2>

        <p>
            Latest products from our store
        </p>

    </div>

    <div id="productError"></div>

    <div class="products-grid" id="productsGrid">

        <div class="loading">
            Loading products...
        </div>

    </div>

</section>


<!-- =========================
     FOOTER
========================= -->

<footer>

    © 2026 EcomStore. All rights reserved.

</footer>


<script>

    /*
    =====================================================
    CONFIGURATION
    =====================================================
    */

    const API_BASE_URL = "http://127.0.0.1:8001";


    /*
    =====================================================
    CHECK LOGIN STATUS
    =====================================================
    */

    function getAuthToken() {

        const possibleTokenNames = [
            "token",
            "access_token",
            "authToken",
            "jwt_token"
        ];

        for (const name of possibleTokenNames) {

            const value = localStorage.getItem(name);

            if (value && value !== "null" && value !== "undefined") {
                return value;
            }

        }

        return null;
    }


    /*
    =====================================================
    CHECK USER DATA
    =====================================================
    */

    function getUserData() {

        const possibleUserNames = [
            "user",
            "user_data",
            "currentUser"
        ];

        for (const name of possibleUserNames) {

            const value = localStorage.getItem(name);

            if (value) {

                try {

                    return JSON.parse(value);

                } catch (error) {

                    return null;

                }

            }

        }

        return null;
    }


    /*
    =====================================================
    UPDATE NAVBAR
    =====================================================
    */

    function updateNavbar() {

        const token = getAuthToken();

        const loggedOutLinks =
            document.getElementById("loggedOutLinks");

        const loggedInLinks =
            document.getElementById("loggedInLinks");

        const profileLink =
            document.getElementById("profileLink");


        /*
        -------------------------
        USER LOGGED IN
        -------------------------
        */

        if (token) {

            loggedOutLinks.style.display = "none";

            loggedInLinks.style.display = "flex";

            profileLink.style.display = "flex";


            /*
            Show user name if available
            */

            const user = getUserData();

            if (user) {

                const profileText =
                    profileLink.querySelector("span:last-child");

                if (profileText) {

                    if (user.name) {

                        profileText.textContent =
                            user.name;

                    }

                }

            }

        }


        /*
        -------------------------
        USER LOGGED OUT
        -------------------------
        */

        else {

            loggedOutLinks.style.display = "flex";

            loggedInLinks.style.display = "none";

            profileLink.style.display = "none";

        }

    }


    /*
    =====================================================
    LOGOUT
    =====================================================
    */

    function logout() {

        /*
        Remove all possible authentication
        values from localStorage.
        */

        localStorage.removeItem("token");

        localStorage.removeItem("access_token");

        localStorage.removeItem("authToken");

        localStorage.removeItem("jwt_token");

        localStorage.removeItem("user");

        localStorage.removeItem("user_data");

        localStorage.removeItem("currentUser");


        /*
        Update navbar immediately
        */

        updateNavbar();


        /*
        Go to home page
        */

        window.location.href = "<?= base_url('/') ?>";

    }


    /*
    =====================================================
    LOGOUT BUTTON EVENT
    =====================================================
    */

    document
        .getElementById("logoutButton")
        .addEventListener("click", function () {

            logout();

        });


    /*
    =====================================================
    LOAD PRODUCTS
    =====================================================
    */

    async function loadProducts() {

        const productsGrid =
            document.getElementById("productsGrid");

        const productError =
            document.getElementById("productError");


        try {

            /*
            IMPORTANT:
            No trailing slash here.

            Correct:
            /api/products

            Not:
            /api/products/
            */

            const response = await fetch(
                API_BASE_URL + "/api/products",
                {
                    method: "GET",

                    headers: {
                        "Accept": "application/json"
                    }
                }
            );


            /*
            HTTP ERROR
            */

            if (!response.ok) {

                throw new Error(
                    "HTTP " + response.status
                );

            }


            /*
            Convert response to JSON
            */

            const data =
                await response.json();


            console.log("Products API response:", data);


            /*
            Clear loading
            */

            productsGrid.innerHTML = "";


            /*
            Handle different response formats
            */

            let products = [];


            if (Array.isArray(data)) {

                products = data;

            }

            else if (Array.isArray(data.products)) {

                products = data.products;

            }

            else if (Array.isArray(data.data)) {

                products = data.data;

            }


            /*
            No products
            */

            if (products.length === 0) {

                productsGrid.innerHTML = `
                    <div class="loading">
                        No products available.
                    </div>
                `;

                return;

            }


            /*
            Create product cards
            */

            products.forEach(function (product) {

                const card =
                    document.createElement("div");

                card.className =
                    "product-card";


                /*
                Product image
                */

                let imageHTML =
                    `<div class="default-product-icon">🛍️</div>`;


                if (product.image) {

                    let imageURL =
                        product.image;


                    /*
                    If backend returns only
                    a relative image path
                    */

                    if (
                        !imageURL.startsWith("http://") &&
                        !imageURL.startsWith("https://")
                    ) {

                        imageURL =
                            API_BASE_URL +
                            "/" +
                            imageURL.replace(/^\/+/, "");

                    }


                    imageHTML = `
                        <img
                            src="${imageURL}"
                            class="product-image"
                            alt="${escapeHTML(product.name || "Product")}"
                            onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\\'default-product-icon\\'>🛍️</div>';"
                        >
                    `;

                }


                /*
                Product name
                */

                const productName =
                    escapeHTML(
                        product.name ||
                        product.title ||
                        "Product"
                    );


                /*
                Price
                */

                const price =
                    product.price !== undefined &&
                    product.price !== null
                        ? "₹" + product.price
                        : "Price unavailable";


                /*
                Stock
                */

                const stock =
                    product.stock !== undefined &&
                    product.stock !== null
                        ? "Stock: " + product.stock
                        : "";


                /*
                Create card
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

                    </div>

                `;


                productsGrid.appendChild(card);

            });

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


            productsGrid.innerHTML = "";


            productError.innerHTML = `

                <div class="error-box">

                    <strong>
                        Unable to load products.
                    </strong>

                    <br><br>

                    Please check whether the FastAPI
                    server is running.

                    <br><br>

                    Error:
                    ${escapeHTML(error.message)}

                </div>

            `;

        }

    }


    /*
    =====================================================
    ESCAPE HTML
    =====================================================
    */

    function escapeHTML(value) {

        const div =
            document.createElement("div");

        div.textContent =
            String(value);

        return div.innerHTML;

    }


    /*
    =====================================================
    PAGE LOAD
    =====================================================
    */

    document.addEventListener(
        "DOMContentLoaded",
        function () {

            /*
            First update login/logout
            */

            updateNavbar();


            /*
            Then load products
            */

            loadProducts();

        }
    );


    /*
    =====================================================
    ALSO CHECK LOGIN STATE WHEN PAGE BECOMES VISIBLE
    =====================================================
    */

    window.addEventListener(
        "storage",
        function () {

            updateNavbar();

        }
    );

</script>

</body>
</html>