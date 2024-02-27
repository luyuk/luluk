<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TELLIBRARY</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #b32423;
        }

        header {
            background-color: #ffffff;
            color: rgb(255, 88, 88);
            text-align: center;
            padding: 4px;
            font-family: sans-serif;
            font-weight: bold;
            stroke: black;
            stroke-width: 5px;
            text-shadow:2px 2px 3px #333;
            font-size:30px;
            text-decoration:none;
            -webkit-text-stroke:3px #000000;
            border: 4px solid #C39E5C;
            font-weight: 1000;
        }

        #loginSignupContainer {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 60px;
        }

        #loginSignupButton {
            border: 2px solid black;
            padding: 10px 20px;
            font-size: 20px;
            cursor: pointer;
            border-radius: 10px; 
        }

        .form {
            display: none;
            margin-top: 20px;
            width: 500px;
            padding: 10px;
            box-sizing: border-box;
        }

        #loginForm {
            display: block;
        }

        main {
            padding: 1px;
            text-align: center;
            color: #ffffff;
            font-family: serif;
            font-size: 25px;
        }

        h2 {
            -webkit-text-stroke:2px #000000;
            color: #ffffff;
            font-size:30px;
        }

        img {
            padding-right: 20px;
            width: 50px;
        }

    </style>
</head>

<body>
    <header>
        <h1><img src="/ukk/img/logots.png">TELLIBRARY</h1>
    </header>
   
    <main>
        <p>A Perfect Place To Gain More Knowladge In Peace And Confort</p>
    </main>

    <div id="loginSignupContainer">
        <button id="loginSignupButton"><a href="login.php">LOG IN </a></button>
        <div id="loginForm" class="form">
            
        </div>
        <h2>
            OR
        </h2>
        <button id="loginSignupButton"><a href="signup.html">SIGN UP</a></button>
        <div id="signupForm" class="form">
        
        </div>
        
    </div>

</body>

</html>