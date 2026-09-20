<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - EcomStore</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #eef5ff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 530px;
            background: white;
            padding: 50px;
            border-radius: 18px;
            box-shadow: 0 10px 35px rgba(0,0,0,0.10);
        }

        .logo {
            text-align: center;
            color: #1768d1;
            font-size: 42px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        h1 {
            text-align: center;
            font-size: 36px;
            margin: 0 0 10px;
        }

        .subtitle {
            text-align: center;
            color: #444;
            font-size: 20px;
            margin-bottom: 38px;
        }

        .error {
            background: #ffe7e7;
            border: 1px solid #ff9999;
            color: #d00000;
            padding: 15px;
            border-radius: 9px;
            text-align: center;
            margin-bottom: 25px;
            font-size: 18px;
        }

        .success {
            background: #e5f8e8;
            border: 1px solid #79c982;
            color: #16852a;
            padding: 15px;
            border-radius: 9px;
            text-align: center;
            margin-bottom: 25px;
            font-size: 18px;
        }

        label {
            display: block;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            height: 65px;
            padding: 0 18px;
            border: 1px solid #ccc;
            border-radius: 9px;
            font-size: 20px;
            margin-bottom: 25px;
        }

        input:focus {
            outline: none;
            border: 2px solid #1768d1;
        }

        .login-btn {
            width: 100%;
            height: 65px;
            background: #176bc7;
            color: white;
            border: none;
            border-radius: 9px;
            font-size: 21px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-btn:hover {
            background: #1259a8;
        }

        .login-btn:disabled {
            background: #999;
            cursor: not-allowed;
        }

        .register-text {
            text-align: center;
            margin-top: 30px;
            font-size: 20px;
        }

        .register-text a {
            color: #1768d1;
            font-weight: bold;
            text-decoration: none;
        }

        .register-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="login-box">

    <div class="logo">
        EcomStore
    </div>

    <h1>Login</h1>

    <div class="subtitle">
        Login to your EcomStore account
    </div>

    <div id="message"></div>

    <form id="loginForm">

        <label for="email">
            Email
        </label>

        <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter your email"
            required
        >

        <label for="password">
            Password
        </label>

        <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            required
        >

        <button
            type="submit"
            class="login-btn"
            id="loginButton"
        >
            Login
        </button>

    </form>

    <div class="register-text">
        Don't have an account?

        <a href="<?= base_url('register') ?>">
            Register
        </a>
    </div>

</div>


<script>

const API_URL = "http://127.0.0.1:8001";

const loginForm = document.getElementById("loginForm");
const loginButton = document.getElementById("loginButton");
const message = document.getElementById("message");


loginForm.addEventListener("submit", async function(event) {

    event.preventDefault();

    const email =
        document.getElementById("email").value.trim();

    const password =
        document.getElementById("password").value;


    message.innerHTML = "";

    loginButton.disabled = true;
    loginButton.innerText = "Logging in...";


    try {

        /*
        =====================================================
        SEND LOGIN REQUEST
        =====================================================
        */

        const response = await fetch(
            API_URL + "/api/auth/login",
            {
                method: "POST",

                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },

                body: JSON.stringify({
                    email: email,
                    password: password
                })
            }
        );


        const data = await response.json();

        console.log("LOGIN STATUS:", response.status);

        console.log("LOGIN RESPONSE:", data);


        /*
        =====================================================
        LOGIN FAILED
        =====================================================
        */

        if (!response.ok) {

            let errorMessage = "Invalid email or password.";

            if (data.detail) {

                if (typeof data.detail === "string") {
                    errorMessage = data.detail;
                }

                else if (Array.isArray(data.detail)) {
                    errorMessage = data.detail
                        .map(item => item.msg)
                        .join(", ");
                }

            }

            message.innerHTML = `
                <div class="error">
                    ${escapeHtml(errorMessage)}
                </div>
            `;

            loginButton.disabled = false;
            loginButton.innerText = "Login";

            return;
        }


        /*
        =====================================================
        GET ACCESS TOKEN
        =====================================================
        */

        const token =
            data.access_token ||
            data.accessToken ||
            data.token ||
            data.jwt;


        console.log("TOKEN FOUND:", token);


        if (!token) {

            console.error(
                "Login successful but no access token found.",
                data
            );

            message.innerHTML = `
                <div class="error">
                    Login response did not contain an access token.
                </div>
            `;

            loginButton.disabled = false;
            loginButton.innerText = "Login";

            return;
        }


        /*
        =====================================================
        SAVE TOKEN
        =====================================================
        */

        localStorage.setItem(
            "access_token",
            token
        );


        /*
        =====================================================
        SAVE USER
        =====================================================
        */

        const user =
            data.user ||
            data.user_data ||
            data.data ||
            null;


        if (user) {

            localStorage.setItem(
                "user",
                JSON.stringify(user)
            );

        }


        /*
        =====================================================
        ALSO SAVE LOGIN STATUS
        =====================================================
        */

        localStorage.setItem(
            "isLoggedIn",
            "true"
        );


        /*
        =====================================================
        DEBUG
        =====================================================
        */

        console.log(
            "Saved access_token:",
            localStorage.getItem("access_token")
        );

        console.log(
            "Saved user:",
            localStorage.getItem("user")
        );


        /*
        =====================================================
        SUCCESS
        =====================================================
        */

        message.innerHTML = `
            <div class="success">
                Login successful! Redirecting...
            </div>
        `;


        /*
        =====================================================
        REDIRECT HOME
        =====================================================
        */

        setTimeout(function() {

            window.location.href =
                "<?= base_url('/') ?>";

        }, 500);


    }

    catch (error) {

        console.error(
            "LOGIN ERROR:",
            error
        );

        message.innerHTML = `
            <div class="error">
                Unable to connect to the FastAPI server.
                <br><br>
                ${escapeHtml(error.message)}
            </div>
        `;

        loginButton.disabled = false;
        loginButton.innerText = "Login";

    }

});


/*
=====================================================
ESCAPE HTML
=====================================================
*/

function escapeHtml(value) {

    const div = document.createElement("div");

    div.textContent = value;

    return div.innerHTML;

}

</script>

</body>
</html>