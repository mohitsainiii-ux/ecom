<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - EcomStore</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f7ff;
            color: #000;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .register-card {
            background: #ffffff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.10);
        }

        .logo {
            text-align: center;
            color: #1769d1;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .title {
            text-align: center;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #555;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            color: #000;
            outline: none;
        }

        input:focus {
            border-color: #1769d1;
            box-shadow: 0 0 0 2px rgba(23, 105, 209, 0.12);
        }

        .register-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #1769d1;
            color: #fff;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 5px;
        }

        .register-btn:hover {
            background: #0f57b5;
        }

        .message {
            display: none;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 14px;
        }

        .success {
            background: #e8f7ee;
            color: #146c35;
            border: 1px solid #9ed7b3;
        }

        .error {
            background: #fdecec;
            color: #b42318;
            border: 1px solid #f1aaaa;
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            font-size: 15px;
        }

        .login-link a {
            color: #1769d1;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="register-container">

    <div class="register-card">

        <div class="logo">
            EcomStore
        </div>

        <h1 class="title">
            Create Account
        </h1>

        <p class="subtitle">
            Register to continue shopping
        </p>

        <div id="message" class="message"></div>

        <form id="registerForm">

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter your name"
                    required
                >
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                >
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >
            </div>

            <button
                type="submit"
                class="register-btn"
                id="registerBtn"
            >
                Register
            </button>

        </form>

        <div class="login-link">
            Already have an account?
            <a href="<?= base_url('login') ?>">
                Login
            </a>
        </div>

    </div>

</div>


<script>

const registerForm = document.getElementById("registerForm");
const registerBtn = document.getElementById("registerBtn");
const message = document.getElementById("message");

registerForm.addEventListener("submit", async function(event) {

    event.preventDefault();

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;

    message.style.display = "none";
    message.className = "message";

    registerBtn.disabled = true;
    registerBtn.innerText = "Registering...";

    try {

        const response = await fetch(
            "http://127.0.0.1:8001/api/auth/register",
            {
                method: "POST",

                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },

                body: JSON.stringify({
                    name: name,
                    email: email,
                    password: password
                })
            }
        );

        const data = await response.json();

        if (response.ok) {

            message.className = "message success";
            message.innerText =
                data.message || "Registration successful.";

            message.style.display = "block";

            registerForm.reset();

            /*
             * Important:
             * Do NOT automatically go to Home.
             *
             * After successful registration,
             * user must login manually.
             */

            setTimeout(function() {

                window.location.href = "<?= base_url('login') ?>";

            }, 1500);

        } else {

            message.className = "message error";

            if (data.detail) {

                if (Array.isArray(data.detail)) {

                    message.innerText =
                        data.detail
                            .map(error => error.msg)
                            .join(", ");

                } else {

                    message.innerText = data.detail;
                }

            } else {

                message.innerText =
                    data.message || "Registration failed.";

            }

            message.style.display = "block";
        }

    } catch (error) {

        console.error(error);

        message.className = "message error";

        message.innerText =
            "Unable to connect to the server.";

        message.style.display = "block";

    } finally {

        registerBtn.disabled = false;
        registerBtn.innerText = "Register";
    }

});

</script>

</body>
</html>