<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html,
        .container {
            height: 100%;
        }

        body {
            font-family: "Poppins", sans-serif;
            display: flex;
            place-items: center;
            padding: auto;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .container {
            display: grid;
            padding: 20px;
            width: 30rem;
            height: 70vh;
            border-radius: 5%;
            border: 1px solid rgb(255, 255, 255);
            background-color: rgba(246, 146, 146, 0.22);
        }

        .txtfield input {
            border-radius: 10px;
            border: none;
            font-size: 1rem;
            background-color: aliceblue;
            width: 100%;
            height: 40px;
            margin: 20px 0px;
            padding: 0px 10px;
            outline: none;
        }

        .txtfield button {
            margin-top: 20px;
            font-size: 1rem;
            width: 90%;
            height: 40px;
            border: none;
            font-family: inherit;
            border-radius: 10px;
            color: rgb(255, 126, 147);
            font-weight: 600;
            border: 1px solid rgb(255, 126, 147);
            background-color: #ffffff;
            transition: all 0.2s ease-in;
        }

        .txtfield input:hover {
            border: 2px solid rgb(255, 126, 147);
        }

        .txtfield input:focus {
            border: 2px solid rgb(255, 126, 147) !important;
        }

        button:hover {
            cursor: pointer;
            background-color: pink;
            /* width: 100%; */
            transform: scale(1.1);
            color: white;
        }

        .txtfield .name {
            width: 48%;
        }

        .txtfield p {
            display: flex;
            justify-content: space-between;
        }

        .avatar img {
            max-width: 80px;
            background-color: rgb(255, 255, 255);
            border-radius: 100%;
        }


        .more {
            margin: 30px;
            color: white;
        }

        .su-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            padding: 0;
            margin: 0;
            z-index: -1;
            opacity: 0.8;
            filter: blur(10px);
        }

        .container label {
            font-size: 40px;
            font-weight: bold;
            margin: 20px;
            color: white;
            text-shadow: 2px 2px black;
        }

        .login {
            width: 100px;
            height: 40px;
            border: 1px solid rgb(255, 126, 147);
            background-color: white;
            text-decoration: none;
            color: rgb(255, 126, 147);
            font-size: 15px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: auto;
        }

        .login:hover {
            background-color: rgb(255, 126, 147);
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <label>
            Create an Account
        </label>
        <form class="txtfield" method="post" action="includes/register.php">
            <p>
                <input type="text" class="name" placeholder="Username" name="fname" />
            </p>
            <input type="text" class="email" placeholder="Enter your Email" name="email" />
            <input
                type="password"
                class="password"
                placeholder="Enter your password" name="password" />
            <input
                type="password"
                class="password"
                placeholder="ReEnter your password" />
            <button type="submit" class="tologin">Sign Up</button>
            <p class="more">
                Already Have an Account?. <a href="../logg.php" class="login">Login</a>
            </p>
        </form>
    </div>
</body>

</html>